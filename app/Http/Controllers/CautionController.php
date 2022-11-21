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


        return view('caution.index', [
            'user' => auth()->user(),
            'document' => 'https://v2.fintech.ovh/'.$document_pdf->url_folder
        ]);
    }
}
