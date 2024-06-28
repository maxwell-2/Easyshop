<?php

namespace App\Http\Controllers\Utilisateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Support\Facades\Validator;

class MontrerUnBienController extends Controller
{
   public function show(string $slug,Produit $produit){
   $slug=$produit->getSlug();
   return view('utilisateurs.montrerunbien',[
    'produit'=>$produit,
   ]);
   } 
}
