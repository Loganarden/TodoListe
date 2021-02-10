<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function formulaireconnexion()
    {
        return view ('connexion');
    }

    public function traitementconnexion()
    {
        request()->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $login = auth()->attempt([
            'email' => request('email'),
            'password' => request('password'),
        ]);

        if ($login)
        {
            return redirect ('/');
        }

        return back() ->withInput()->whitErrors
        ([
            'email' => 'Vos identifiant sont incorrects.',
        ]);
    }

    public function formulaireinscription()
    {
        return view('/inscription');
    }

    public function traitementinscription()
    {
        request()-> validate([

            'name' => ['required'],
            'email' => ['required','email'],
            'password' => ['required','confirmed','min:5'],
            'password_confirmation' => ['required'],
        ], [
            'password.min' => 'Pour des raison de sécurité, votre mot de passe doit contenir au moin :min caratères'
        ]);

        $user = new \App\Models\User;
        $user->name = request ('name');
        $user->email = request ('email');
        $user->password = bcrypt (request ('password'));
        $user->save();

        $inscription = auth()->attempt([
            'email' => request('email'),
            'password' => request('password'),
            'password_confirmation' =>request('password_confirmation'),
        ]);

        if ($inscription)
        {
            return redirect ('/');
        }
    }

    public function deconnexion()
    {
        auth()->logout();

        return redirect ('/connexion');
    }

}
