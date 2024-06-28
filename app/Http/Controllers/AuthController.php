<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function inscription(){
       return view('utilisateurs.inscription',[
        'produit'=> Produit::find('first')
       ]);
    }

    public function connexion(){
        return view('utilisateurs.connexion',[
            'produit'=> Produit::find('first')
        ]);
     }

     public function deconnecter(){
        Auth::logout();
        return to_route('user.connexion');
     }

     public function valider_inscription(Request $request){
        $validation=Validator::make([
            'name'=>$request->input('name'),
            'secondname'=>$request->input('secondname'),
            'email'=>$request->input('email'),
            'password'=>$request->input('password'),
        ],[
            'name'=>['required','string','min:3'],
            'secondname'=>['required','string','min:3'],
            'email'=>['required','email','unique:users,email','min:3'],
            'password'=>['required','min:6'],
        ]);
        $data=$validation->validated();
        $data['password']=Hash::make($data['password']);
        $user=User::create($data);
        return to_route('user.connexion')->with('success','Inscription reussie veuillez vous connecter à présent');
     }

     public function valider_connexion(Request $request){
        $validation=Validator::make([
            'email'=>$request->input('email'),
            'password'=>$request->input('password'),
        ],[
            'email'=>['required','email','min:3'],
            'password'=>['required','min:6'],
        ]);
        $identifiants=$validation->validated();
        //$identifiants['password']=Hash::make($identifiants['password']);
        if (Auth::attempt($identifiants)) {
            $request->session()->regenerate();
            return redirect()->intended(route('user.accueil'))->with('success','Connexion reussie!');
        }
        return to_route('user.connexion')->withErrors([
            'email'=>'Mail ou mot de passe invalide.'
        ])->onlyInput('email');
     }
}

