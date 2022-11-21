<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __invoke()
    {
        $user = \Auth::user();
        dd($user);
    }
}
