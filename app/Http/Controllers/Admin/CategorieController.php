<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Support\Facades\Validator;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(){
        return $this->authorizeResource(Categorie::class,'categorie');
    }

    public function index()
    {
           return view('admin.categories.index',[
            'categories'=>categorie::orderBy('created_at','desc')->Paginate(25)
           ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $categorie=new categorie();
        return view('admin.categories.form',[
            'categorie'=> $categorie
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation=Validator::make([
            'Nom'=>$request->input('nomcat')
        ],[
            'Nom'=>['required','min:4'],
        ]);

       $categorie=Categorie::create($validation->validated());
        return to_route('admin.categorie.index')->with('success','Votre categorie a bien été creer');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
        return view('admin.categories.form',[
            'categorie'=>$categorie
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Categorie $categorie)
    {
        $validation=Validator::make([
           'Nom'=>$request->input('nomcat')
        ],[
           'Nom'=>['required','min:4'],
        ]);

       $categorie->update($validation->validated());
        return to_route('admin.categorie.index')->with('success','Votre categorie a bien été modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        return to_route('admin.categorie.index')->with('success','Votre categorie a bien été supprimer');  
    }
}
