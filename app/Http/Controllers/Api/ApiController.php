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

        try {
            $fintech->requestCode(
                $request->get('ref_doc'),
                $request->get('num_phone'),
                $request->get('sector')
            );
        }catch (\Exception $exception) {
            return response()->json(null, 500);
        }

        return response()->json();
    }

    public function verify_code(Request $request)
    {
        $fintech = new Fintech();

        try {
            $call = $fintech->verifyCode(
                $request->get('ref_doc'),
                $request->get('num_phone'),
                $request->get('sector'),
                $request->get('code')
            )->status();
        }catch (\Exception) {
            return response()->json(null, 500);
        }
        return response()->json($call);
    }
}
