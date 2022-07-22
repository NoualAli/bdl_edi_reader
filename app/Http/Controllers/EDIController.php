<?php

namespace App\Http\Controllers;

use App\Http\Requests\EDI\StoreEdiFileRequest;
use App\Models\Payment;
use App\Models\Receiver;
use App\Services\File;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class EDIController extends Controller
{
    /**
     * Affiche la liste de tous les virments
     *
     * @return Illuminate\Http\response
     */
    public function index(Request $request)
    {
        $payments = Payment::paginate();
        if ($request->has('search')) {
            $payments = Payment::search($request->search)->paginate();
        }
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
        $payment->load(['receivers']);
        return view('pages.single', compact('payment'));
    }

    /**
     * Imprime un virement et ses informations
     *
     * @param Payment $payment
     *
     * @return Illuminate\Http\response
     */
    public function print(Receiver $receiver)
    {
        return Pdf::loadView('pages.print', compact('receiver'))->setPaper('a4')->stream('remise-' . $receiver->payment->discount_reference . '.pdf');
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
        $file_name = File::upload($storeEdiFileRequest->file('edi_file'));
        if ($file_name) {
            $file = File::storeDB($file_name);
            return $file;
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
                "La remise n° {$payment->discount_reference} a été supprimer avec succés"
            ]]);
        }

        return back()->with('error', [
            'messages' => [
                "Une erreur s'est produite lors de la tentative de suppression de la remise n° {$payment->discount_reference}"
            ]
        ]);
    }
}