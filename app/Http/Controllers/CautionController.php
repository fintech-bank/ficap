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

        $name_caution = $document_pdf->name.'.pdf';

        $tmp_file = file_put_contents(
            public_path('/tmp/'.$name_caution),
            \Storage::disk('gdd')->get($document_pdf->url_folder),
        );

        return view('caution.index', [
            'user' => auth()->user(),
            'document' => '/tmp/'.$name_caution,
            'ref_doc' => $document_pdf->reference
        ]);
    }
}
