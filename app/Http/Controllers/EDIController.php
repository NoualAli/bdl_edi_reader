<?php

namespace App\Http\Controllers;

use App\Http\Requests\EDI\StoreEdiFileRequest;
use App\Models\Payment;
use App\Services\File;
use Illuminate\Http\Request;

class EDIController extends Controller
{
    public function index()
    {
        $payments = Payment::with('issuer')->paginate();
        return view('pages.list', compact('payments'));
    }

    public function show(Payment $payment)
    {
        $payment->load(['receivers', 'issuer']);
        return view('pages.single', compact('payment'));
    }

    public function print(Payment $payment)
    {
        dd('impression en cours');
    }

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