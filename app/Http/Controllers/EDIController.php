<?php

namespace App\Http\Controllers;

use App\Http\Requests\EDI\StoreEdiFileRequest;
use App\Models\Payment;
use App\Services\File;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;

class EDIController extends Controller
{
    /**
     * Affiche la liste de tous les virments
     *
     * @return Illuminate\Http\response
     */
    public function index()
    {
        $payments = Payment::with('issuer')->paginate();
        return view('pages.list', compact('payments'));
    }

    /**
     * Affiche un virement et ses informations
     *
     * @param Payment $payment
     *
     * @return Illuminate\Http\response
     */
    public function show(Payment $payment)
    {
        $payment->load(['receivers', 'issuer']);
        return view('pages.single', compact('payment'));
    }

    /**
     * Imprime un virement et ses informations
     *
     * @param Payment $payment
     *
     * @return Illuminate\Http\response
     */
    public function print(Payment $payment)
    {
        // return view('pages.print', compact('payment'));
        return Pdf::loadView('pages.print', compact('payment'))->setPaper('a4')->stream();
    }

    /**
     * Upload et Enregistre dans la base de données les informations du fichier EDI
     *
     * @param StoreEdiFileRequest $storeEdiFileRequest
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upload(StoreEdiFileRequest $storeEdiFileRequest)
    {
        $file = (new File)->upload($storeEdiFileRequest->file('edi_file'));
        File::read($file->check());
        if ($file->check()) {
            return back()->withSuccess(['messages' => [
                "Le fichier edi a été importer avec succés"
            ]]);
        }

        return back()->with('error', [
            'messages' => [
                "Une erreur s'est produite lors de la tentative d'importation du fichier edi"
            ]
        ]);
    }

    /**
     * Supprime une ligne de virment
     *
     * @param Request $request
     * @param Payment $payment
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Payment $payment)
    {
        if ($payment->delete()) {
            return redirect(route('edi.index'))->withSuccess(['messages' => [
                "L'enregistrement n° {$payment->id} a été supprimer avec succés"
            ]]);
        }

        return back()->with('error', [
            'messages' => [
                "Une erreur s'est produite lors de la tentative de suppression de l'enregistrement n° {$payment->id}"
            ]
        ]);
    }
}