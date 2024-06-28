<?php

namespace App\Http\Controllers\Utilisateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Support\Facades\Validator;

class AcueilController extends Controller
{
    public function accueil(){
        return view('utilisateurs.accueil',[
            'produitrecents'=> Produit::orderBy('created_at','desc')->limit(8)->get()
        ]);
    }

    public function contact(){
        return view('utilisateurs.contact',[
            'produit'=> Produit::find('first')
        ]);   
    }
}
