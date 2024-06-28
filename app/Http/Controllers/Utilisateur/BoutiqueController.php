<?php

namespace App\Http\Controllers\Utilisateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Support\Facades\Validator;

class BoutiqueController extends Controller
{

    public function rechercher(Request $request){

       $validation=Validator::make([ 
            'Prix'=> $request->input('Prix'),
            'categorie_id'=>$request->input('categorie_id')
         ],[
            'Prix'=> ['numeric','gte:0','nullable'],
            'categorie_id'=> ['nullable','integer']
        ]);
        $query=Produit::query();
        $data=$validation->validated();
        $prixmax=$data['Prix'];
        $categorievoulu=$data['categorie_id'];
        session(['prix_max'=>$prixmax]);
        session(['categorie_voulu'=> $categorievoulu]);
        if ($prixmax) {
            $query=$query->where('Prix','<=',$prixmax);
         }
         if ($categorievoulu) {
            $query=$query->where('categorie_id','=',$categorievoulu);
         }

        return view('utilisateurs.boutique',[
            'touslesproduits'=> $query->paginate(9),
            'input'=>$prixmax,
            'categories'=>Categorie::select('Nom','id')->get(),
            'categorievoulu'=>$categorievoulu
        ]);
    }

        public function boutique(){

            $prixmax=session('prix_max',null);
            $categorievoulu=session('categorie_voulu',null);
            $query=Produit::query();
             if ($prixmax) {
                 $query=$query->where('Prix','<=',$prixmax);
              }
              if ($categorievoulu) {
                $query=$query->where('categorie_id','=',$categorievoulu);
             }
             return view('utilisateurs.boutique',[
                 'touslesproduits'=> $query->paginate(9),
                 'input'=>$prixmax,
                 'categories'=>Categorie::select('Nom','id')->get(),
                 'categorievoulu'=>$categorievoulu
             ]);
    }
}
