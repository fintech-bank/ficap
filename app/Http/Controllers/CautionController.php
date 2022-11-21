<?php

namespace App\Http\Controllers;

class CautionController extends Controller
{
    public function index()
    {
        return view('caution.index', [
            'user' => auth()->user()
        ]);
    }
}
