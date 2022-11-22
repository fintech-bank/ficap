<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Fintech;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function request_code(Request $request)
    {
        $fintech = new Fintech();

        dd($fintech->requestCode(
            $request->get('ref_doc'),
            $request->get('num_phone'),
            $request->get('sector')
        ));
    }
}
