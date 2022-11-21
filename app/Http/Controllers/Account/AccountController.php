<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return view('account.index', ["user" => auth()->user()]);
    }

    public function password(Request $request)
    {
        auth()->user()->update([
            'password' => \Hash::make($request->get('password'))
        ]);

        return redirect()->back()->with('success', "Le mot de passe à bien été définie");
    }
}
