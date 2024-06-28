<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('home');
});*/

Route::get('/',[\App\Http\Controllers\Utilisateur\AcueilController::class,'accueil'])->name('user.accueil');
Route::get('/Contact',[\App\Http\Controllers\Utilisateur\AcueilController::class,'contact'])->name('user.contact');
Route::get('/Boutique',[\App\Http\Controllers\Utilisateur\BoutiqueController::class,'boutique'])->name('user.boutique');
Route::get('/Boutique/Rechercher-un-bien',[\App\Http\Controllers\Utilisateur\BoutiqueController::class,'rechercher'])->name('user.rechercher');
Route::get('/InfosBien/{slug}-{produit}',[\App\Http\Controllers\Utilisateur\MontrerUnBienController::class,'show'])->name('user.montrerunbien')->where([
    'produit'=>'[0-9]+',
    'slug'=>'[0-9a-z\-]+'
]);
Route::get('/AjouterPanier/{slug}-{produit}',[\App\Http\Controllers\Utilisateur\PanierController::class,'ajouter_panier'])->name('user.ajouterpanier')->where([
    'produit'=>'[0-9]+',
    'slug'=>'[0-9a-z\-]+'
]);
Route::get('/Panier',[\App\Http\Controllers\Utilisateur\PanierController::class,'voire_panier'])->name('user.voirepanier');

Route::delete('/RetirerPanier/{clef}',[\App\Http\Controllers\Utilisateur\PanierController::class,'retirer'])->name('user.retirerpanier')->where([
    'id'=>'[0-9]+',
]);

Route::GET('/paiement/succes', [PaymentController::class, 'handlePaymentSuccess'])->name('paiement.succes');



Route::get('/Inscription',[\App\Http\Controllers\AuthController::class,'inscription'])->name('user.inscription');
Route::post('/Valider_Inscription',[\App\Http\Controllers\AuthController::class,'valider_inscription'])->name('user.validerinscription');
Route::get('/Connexion',[\App\Http\Controllers\AuthController::class,'connexion'])->name('user.connexion');
Route::post('/Valider_Connexion',[\App\Http\Controllers\AuthController::class,'valider_connexion'])->name('user.validerconnexion');
Route::delete('/Déconnexion',[\App\Http\Controllers\AuthController::class,'deconnecter'])->name('user.deconnexion');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route::resource('property',\App\Http\Controllers\Admin\ProduitController::class)->except(['show']);
    Route::resource('categorie',\App\Http\Controllers\Admin\CategorieController::class)->except(['show']);
    Route::get('/Gestion_Achats',[\App\Http\Controllers\Admin\AchatController::class,'index'])->name('achat');
});
