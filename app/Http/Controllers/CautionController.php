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

        $tmp_file = file_put_contents(
            '/public/tmp/document.pdf',
            \Storage::disk('gdd')->get($document_pdf->url_folder),
        );

        dd($tmp_file);

        return view('caution.index', [
            'user' => auth()->user(),
            'document' => \Storage::disk('gdd')->url($document_pdf->url_folder)
        ]);
    }
}
