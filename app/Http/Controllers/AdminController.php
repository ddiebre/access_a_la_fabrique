<?php

namespace App\Http\Controllers;

use App\utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class connexionController extends Controller
{
    use AuthenticatesUsers;

    public function formulaire(){
        return view('pages/connexion');
    }

    public function traitement(Request $request){

       request()->validate([
            'email'=> ['required','email'],
            'password'=> ['required','min:3','max:6'],
            'statut'=> ['required','statut'],
        ]);
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    
       $credentials = $request->only('email','statut','password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/dashboard');
        }
        
       
    }
    protected function authenticated(Request $request,$utilisateur)
    {
        if ($utilisateur->isAdmin()){
            return redirect(route('/pages/dashboard'));
            
        }
        else if ($utilisateur->isApprenant()){
            return redirect(route('/pages/acceuil'));
        }
    }
       
}
