<?php

namespace App\Http\Controllers\Utilisateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class PanierController extends Controller
{
    public function ajouter_panier( Request $request,string $slug, Produit $produit){
     $validation=Validator::make([
        'couleur'=>$request->input('couleur'),
        'taille'=>$request->input('taille')
     ],[
        'couleur'=>['required'],
        'taille'=>['required']
     ]);
     $datas=$validation->validated();
       $panier=session()->get('panier',[]);
       $clef=$produit->id .'-' . $datas['couleur'] . '-' . $datas['taille'];
       if ( isset($panier[$clef]) ) {
        $panier[$clef]['quantité']++;
       }else {
        $panier[$clef]=[
            'nom'=> $produit->Nom,
            'prix'=>$produit->Prix,
            'image'=>$produit->image,
            'couleur'=>$datas['couleur'],
            'taille'=>$datas['taille'],
            'quantité'=>1
        ];
       }
       session()->put('panier',$panier);
       return to_route('user.boutique')->with('success',"Le produit a bien été ajouter à votre panier!
       Cliquer sur l'onglet panier en haut à droite de la page pour consulter votre panier!");
    }

    public function voire_panier(){
      $panier=session('panier',null);
      $total=0;
      return view('utilisateurs.panier',[
      'panier'=>$panier,
      'total'=>$total,
      'produit'=> Produit::find('first')
      ]);
    }

    public function retirer(Request $request,$clef){
      $panier=session('panier',null);
      if(isset($panier[$clef])) {
        unset($panier[$clef]);
        session()->put('panier', $panier);
    }

      $total=0;
      return view('utilisateurs.panier',[
      'panier'=>$panier,
      'total'=>$total, 
      'produit'=> Produit::find('first')   
 ])->with('success', 'Produit supprimé du panier!');
    } 
}
