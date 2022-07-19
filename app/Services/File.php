<?php

namespace App\Services;

use App\Models\Issuer;
use App\Models\Payment;
use App\Models\Receiver;
use Illuminate\Http\UploadedFile;

class File
{
    protected $file;

    protected $name;

    public function upload(UploadedFile $file)
    {
        $this->name = $file->hashName();
        $this->file = $file->move('upload/edi', $this->name);
        return $this;
    }

    public function check()
    {
        return fopen('upload/edi/' . $this->name, 'r');
    }

    public static function read($file)
    {
        while (!feof($file)) {
            $line = trim(fgets($file));
            $payment = [];
            if ($line != "FVIR") {
                if (preg_match("#^VIRM#", $line)) {
                    $payment = Payment::create();
                    $item = Issuer::create(self::ee($line, $payment->id));
                } else {
                    $item = self::ec($line);
                    $payment = Payment::latest()->get()->first();
                    if (count($item)) {
                        $item = Receiver::create(self::ec($line, $payment->id));
                    }
                }
            }
        }
    }

    /**
     * Lecture Entête (EE)
     *
     * @param string $line
     *
     * @return array
     */
    private static function ee(?string $line = null, ?int $payment_id = null): array
    {
        if ($line) {
            $discount_header = utf8_encode(trim(mb_substr($line, 0, 4, 'UTF-8'))); // Entête de la remise
            $iob = utf8_encode(trim(mb_substr($line, 4, 3, 'UTF-8'))); // Identifiant de la banque du donneur d’ordre
            $nto = utf8_encode(trim(mb_substr($line, 7, 3, 'UTF-8'))); // Nature et type d’opération
            $nb = utf8_encode(trim(mb_substr($line, 10, 1, 'UTF-8'))); // Nature des fonds
            $pi = utf8_encode(trim(mb_substr($line, 11, 1, 'UTF-8'))); // Indicateur de présence RIB/BAN
            $rib = utf8_encode(trim(mb_substr($line, 12, 20, 'UTF-8'))); // RIB
            $ip = utf8_encode(trim(mb_substr($line, 32, 4, 'UTF-8'))); // Préfix IBAN
            $name = utf8_encode(trim(mb_substr($line, 36, 50, 'UTF-8'))); // Nom, prénom ou raison sociale du donneur d’ordre
            $address = utf8_encode(trim(mb_substr($line, 86, 70, 'UTF-8'))); // Adresse du donneur d’ordre
            $date = utf8_encode(trim(mb_substr($line, 156, 8, 'UTF-8'))); // Date de la remise de l’ordre
            $discount_reference = utf8_encode(trim(mb_substr($line, 164, 3, 'UTF-8'))); // Référence de la remise
            $discount_on = utf8_encode(trim(mb_substr($line, 167, 6, 'UTF-8'))); // Nombre d’opération dans la remise
            $totalAmount = utf8_encode(trim(mb_substr($line, 173, 16, 'UTF-8'))); // Montant total
            $filler = utf8_encode(trim(mb_substr($line, 189, 31, 'UTF-8'))); // Filler

            return compact('discount_header', 'iob', 'nto', 'nb', 'pi', 'rib', 'ip', 'name', 'address', 'date', 'discount_reference', 'discount_on', 'totalAmount', 'filler', 'payment_id');
        }
        return [];
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
        if ($line) {
            $ontto = utf8_encode(trim(mb_substr($line, 0, 10, 'UTF-8'))); // Numéro d'ordre de l'opération de virement
            $ontto2 = utf8_encode(trim(mb_substr($line, 10, 1, 'UTF-8'))); // Numéro d'ordre de l'opération de virement
            $rib = utf8_encode(trim(mb_substr($line, 11, 20, 'UTF-8'))); // RIB
            $ip = utf8_encode(trim(mb_substr($line, 31, 4, 'UTF-8'))); // Préfix IBAN
            $name = utf8_encode(trim(mb_substr($line, 35, 50, 'UTF-8'))); // Nom, prénom ou raison sociale du client bénéficiaire
            $address = utf8_encode(trim(mb_substr($line, 85, 70, 'UTF-8'))); // Adresse du client  bénéficiaire
            $amount = utf8_encode(trim(mb_substr($line, 155, 15, 'UTF-8'))); // Montant de l’opération de virement
            $label = utf8_encode(trim(mb_substr($line, 170, 70, 'UTF-8'))); // Libellé
            $filler = utf8_encode(trim(mb_substr($line, 240, 80, 'UTF-8'))); // Filler

            return compact('ontto', 'ontto2', 'rib', 'ip', 'name', 'address', 'amount', 'label', 'filler', 'payment_id');
        }
        return [];
    }
}