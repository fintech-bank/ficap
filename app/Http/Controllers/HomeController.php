<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __invoke()
    {
        $user = \Auth::user();
        if($user->created_at == $user->updated_at) {
            $user->update(['password' => null]);
            return redirect()->route('account')->with('info', "Veuillez changer votre mot de passe par default");
        }

        return view('dashboard', compact('user'));
    }
}
