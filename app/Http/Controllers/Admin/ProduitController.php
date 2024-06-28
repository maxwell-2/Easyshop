<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(){
        return $this->authorizeResource(Produit::class,'property');
    }

    public function index()
    {

           return view('admin.produits.index',[
            'produits'=>Produit::orderBy('created_at','desc')->Paginate(10)
           ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {    
        $produit=new Produit();
        return view('admin.produits.form',[
            'produit'=> $produit,
            'categories'=>Categorie::select('Nom','id')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation=Validator::make([
            'Nom'=>$request->input('nom'),
            'Prix'=>$request->input('prix'),
            'image'=>$request->file('image'),
            'categorie_id'=>$request->input('categorie'),
            'Stock_disponible'=>$request->input('Stock_disponible'),
            'Description'=>$request->input('Description'),
        ],[
            'Nom'=>['required','min:4'],
            'Prix'=>['required'],
            'image'=>['max:2000','image'],
            'categorie_id'=>['required','exists:categories,id'],
            'Stock_disponible'=>['integer','required'],
            'Description'=>['required'],
        ]);
       $data=$validation->validated();
       /** image @var UploadedFile|null $image */
       $image=$data['image'];
       if ($image !== null && !$image->getError()) {
        $data['image']=$image->store('blog','public');
       }   
       $produit=Produit::create($data);
       $produit->categorie()->associate($data['categorie_id']);
       $produit->save();
        return to_route('admin.property.index')->with('success','Votre produit a bien été creer');
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
    public function edit(Produit $property)
    {   
        //sdd(Auth::user()->can('delete',$property));
        return view('admin.produits.form',[
            'produit'=>$property,
            'categories'=>Categorie::select('Nom','id')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Produit $property)
    {
        $validation=Validator::make([
            'Nom'=>$request->input('nom'),
            'Prix'=>$request->input('prix'),
            'image'=>$request->file('image'),
            'categorie_id'=>$request->input('categorie'),
            'Stock_disponible'=>$request->input('Stock_disponible'),
            'Description'=>$request->input('Description'),
        ],[
            'Nom'=>['required','min:4'],
            'Prix'=>['required'],
            'image'=>['max:2000','image'],
            'categorie_id'=>['required','exists:categories,id'],
            'Stock_disponible'=>['integer','required'],
            'Description'=>['required'],
        ]);
        $data=$validation->validated();
        /** image @var UploadedFile|null $image */
        $image=$data['image'];
        if ($image !== null && !$image->getError()) {
         $data['image']=$image->store('blog','public');
        }
       $property->update($data);
       $property->categorie()->associate($data['categorie_id']);
       $property->save();
        return to_route('admin.property.index')->with('success','Votre produit a bien été modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $property)
    {
        $property->delete();
        return to_route('admin.property.index')->with('success','Votre produit a bien été supprimer');  
    }
}
