<?php

namespace App\Http\Controllers;

use App\Http\Requests\EDI\StoreEdiFileRequest;
use App\Services\File;

class EDIController extends Controller
{
    public function index()
    {
        $file = File::read('z7ncZvw0oqTvTchTvRRQcS5iibq6aeehbZVrw0uS.txt');
        dd($file);
        return view('pages.list');
    }

    public function upload(StoreEdiFileRequest $storeEdiFileRequest)
    {
        $file = (new File)->upload($storeEdiFileRequest->file('edi_file'));

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
}