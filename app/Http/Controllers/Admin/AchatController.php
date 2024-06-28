<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Achat;
use App\Models\Categorie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;

class AchatController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(){
        return $this->authorizeResource(Produit::class,'property');
    }

    public function index()
    {

           return view('admin.achats.index',[
            'achats'=>Achat::orderBy('created_at','asc')->Paginate(10),
            'produit'=>Produit::find('first')
           ]);
    }
}
          
