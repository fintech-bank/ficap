<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {

    }

    public function logout()
    {
        \Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->back();
    }
}
