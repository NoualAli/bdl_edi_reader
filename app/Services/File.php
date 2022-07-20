<?php

namespace App\Services;

use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;

class File
{
    /**
     * Le chemin par défaut ou sera enregistrer le fichier EDI
     *
     * @var string
     */
    protected static $default_folder = 'upload/edi';

    /**
     * Upload le fichier EDI
     *
     * @param UploadedFile $file
     *
     * @return string
     */
    public static function upload(UploadedFile $file): string
    {
        $name = $file->hashName();
        $file->move(self::$default_folder, $name);
        return $name;
    }

    /**
     * Récupère les informations du fichier EDI sous forme de tableau
     *
     * @param string $file_name
     *
     * @return array
     */
    private static function read(string $file_name): array
    {
        return explode('FVIR', file_get_contents(self::$default_folder . "/{$file_name}"));
    }

    /**
     * Parse et enregistre les données dans la base de données
     *
     * @param string $file_name
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function storeDB(string $file_name): RedirectResponse
    {
        $data = self::read($file_name);
        $references = [];

        foreach ($data as $item) {
            $lines = explode(PHP_EOL, $item);
            $newLines = array_filter($lines, fn ($line) => !empty($line));
            $payment = Payment::latest()->get()->first();

            foreach ($newLines as $line) {
                if (!empty($line)) {
                    if (preg_match('#^VIRM#', $line)) {
                        $item = File::ee($line);
                        if (Payment::where('discount_reference', $item['discount_reference'])->get()->count()) {
                            return back()->withErrors("Une remise avec la référence {$item['discount_reference']} existe déjà");
                        } else {
                            $payment = Payment::create($item);
                            array_push($references, $payment->discount_reference);
                        }
                    } else {
                        $item = File::ec($line);
                        if (isset($item['ontto']) && !empty($item['ontto'])) {
                            $payment->receivers()->create($item);
                        }
                    }
                }
            }
        }
        if (count($references) > 1) {
            $references = implode(", ", $references);
            $message = "les remises [{$references}] ont été ajouté avec succés";
        } else {
            $references = implode("", $references);
            $message = "la remise {$references} a été ajouté avec succés";
        }
        return back()->withSuccess(['messages' => [$message]]);
    }

    /**
     * Lecture Entête (EE)
     *
     * @param string $line
     *
     * @return array
     */
    private static function ee(?string $line = null): array
    {
        if (!empty($line) && !is_null($line)) {
            $discount_header = utf8_encode(trim(mb_substr($line, 0, 4, 'UTF-8'))); // Entête de la remise
            $iob = utf8_encode(trim(mb_substr($line, 4, 3, 'UTF-8'))); // Identifiant de la banque du donneur d’ordre
            $nto = utf8_encode(trim(mb_substr($line, 7, 3, 'UTF-8'))); // Nature et type d’opération
            $nb = utf8_encode(trim(mb_substr($line, 10, 1, 'UTF-8'))); // Nature des fonds
            $pi = utf8_encode(trim(mb_substr($line, 11, 1, 'UTF-8'))); // Indicateur de présence RIB/BAN
            $rib = utf8_encode(trim(mb_substr($line, 12, 20, 'UTF-8'))); // RIB
            $ip = utf8_encode(trim(mb_substr($line, 32, 4, 'UTF-8'))); // Préfix IBAN
            $name = utf8_encode(trim(mb_substr($line, 36, 50, 'UTF-8'))); // Nom, prénom ou raison sociale du donneur d’ordre
            $address = utf8_encode(trim(mb_substr($line, 86, 70, 'UTF-8'))); // Adresse du donneur d’ordre
            $date = Carbon::parse(utf8_encode(trim(mb_substr($line, 156, 8, 'UTF-8'))))->format('Y-m-d'); // Date de la remise de l’ordre
            $discount_reference = utf8_encode(trim(mb_substr($line, 164, 3, 'UTF-8'))); // Référence de la remise
            $discount_on = utf8_encode(trim(mb_substr($line, 167, 6, 'UTF-8'))); // Nombre d’opération dans la remise
            $totalAmount = utf8_encode(trim(mb_substr($line, 173, 16, 'UTF-8'))); // Montant total
            $filler = utf8_encode(trim(mb_substr($line, 189, 31, 'UTF-8'))); // Filler

            return compact('discount_header', 'iob', 'nto', 'nb', 'pi', 'rib', 'ip', 'name', 'address', 'date', 'discount_reference', 'discount_on', 'totalAmount', 'filler');
        }
    }

    /**
     * Lecture Corps de la remise (EC)
     *
     * @param string|null $line
     *
     * @return array
     */
    private static function ec(?string $line = null, ?int $payment_id = null): array
    {
        if (!empty($line) && !is_null($line)) {
            $ontto = utf8_encode(trim(mb_substr($line, 0, 10, 'UTF-8'))); // Numéro d'ordre de l'opération de virement
            $ontto2 = utf8_encode(trim(mb_substr($line, 10, 1, 'UTF-8'))); // Numéro d'ordre de l'opération de virement
            $rib = utf8_encode(trim(mb_substr($line, 11, 20, 'UTF-8'))); // RIB
            $ip = utf8_encode(trim(mb_substr($line, 31, 4, 'UTF-8'))); // Préfix IBAN
            $name = utf8_encode(trim(mb_substr($line, 35, 50, 'UTF-8'))); // Nom, prénom ou raison sociale du client bénéficiaire
            $address = utf8_encode(trim(mb_substr($line, 85, 70, 'UTF-8'))); // Adresse du client  bénéficiaire
            $amount = utf8_encode(trim(mb_substr($line, 155, 15, 'UTF-8'))); // Montant de l’opération de virement
            $label = utf8_encode(trim(mb_substr($line, 170, 70, 'UTF-8'))); // Libellé
            $filler = utf8_encode(trim(mb_substr($line, 240, 80, 'UTF-8'))); // Filler

            return compact('ontto', 'ontto2', 'rib', 'ip', 'name', 'address', 'amount', 'label', 'filler');
        }
    }
}