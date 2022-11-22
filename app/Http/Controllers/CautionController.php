<?php

namespace App\Http\Controllers;

class CautionController extends Controller
{
    public function index()
    {
        $document_pdf = auth()->user()->loan->customer->documents()
            ->where('reference', auth()->user()->loan->reference)
            ->where('name', 'LIKE', '%Caution%')
            ->first();

        dd(\Storage::disk('gdd')->allFiles('3/documents/contrats'));



        return view('caution.index', [
            'user' => auth()->user(),
            'document' => \Storage::disk('gdd')->get($document_pdf->url_folder)
        ]);
    }
}
