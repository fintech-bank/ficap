<?php

namespace App\Services;

class Fintech
{
    public function listLoan()
    {
        return \Http::get('https://v2.fintech.ovh/api/loan/list')->object();
    }

    public function requestCode($ref_doc,$num_phone,$sector)
    {
        $string = $ref_doc.'/'.$num_phone.'/'.$sector;
        return \Http::post('https://v2.fintech.ovh/api/document/request-code', [
            "token" => base64_encode($string)
        ]);
    }

    public function verifyCode($ref_doc,$num_phone,$sector,$code)
    {
        $string = $ref_doc.'/'.$num_phone.'/'.$sector.'/'.$code;

        return \Http::post('https://v2.fintech.ovh/api/document/verify-code', [
            "token" => base64_encode($string)
        ]);
    }
}
