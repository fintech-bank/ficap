<?php

namespace App\Services;

class Fintech
{
    public function listLoan()
    {
        return \Http::get('https://v2.fintech.ovh/api/loan/list')->object();
    }
}
