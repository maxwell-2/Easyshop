<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Achat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function handlePaymentSuccess(Request $request)
{
    // Récupérer les informations du paiement transmises par KkiaPays
    $paymentData = $request->all();
    $panier = session()->get('panier', []);
    $user = Auth::user();

    DB::transaction(function() use ($panier, $user, $paymentData) {
            foreach ($panier as $item) {
                Achat::create([
                    'user_id' => $user->id,
                    'produit' => $item['nom'],
                    'quantité' => $item['quantité'],
                    'couleur' => $item['couleur'],
                    'taille' => $item['taille'],
                    'total' => $item['prix'],
                    'Transaction_Ref'=>$paymentData['transaction-id'],
                    'produit_id'=> Produit::select('id')->where('Nom','like',"%{$item['nom']}%")->value('id')
                ]);
            }
        });
        //session()->forget('panier')
    // Enregistrer les informations dans la table "achats"
   /* $achat = new Achat();
    $achat->montant = $paymentData['amount'];
    $achat->reference = $paymentData['reference'];
    $achat->description = $paymentData['description'];
    $achat->save();*/

    // Retourner une réponse au client
    return redirect()->route('user.voirepanier')->with("success","Votre paiement a bien été reussit.Votre commande est donc valider et en cours de traitement!");
}
}
