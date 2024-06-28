@extends("homeafter")
@section("title",$produit->Nom)
@section("content")
<div class="container">
 <p style="font-size:20px;font-weight:bold" class="text-center"><em style="font-size:22px;">EasyShop</em> votre boutique en ligne ou vous trouvez des produits de qualité </br>
  pour vos besoins de tous les jours.Votre satisfaction notre priorité.
</p>
</div>
<div class="container mt-4 d-flex justify-content-between">
    <div class="mr-5">
        <img style="width:500px;height:500px" src="/storage/{{$produit->image}}" alt="">
    </div>
    <div class="mt-5 pt-4">
        <h2 class="mb-3">Caractéristiques du bien</h2>
        <table class="table-striped">
        <tr>
            <div class="col-3">
                <td>
                <h3>Nom</h3>
                </td>
            </div>
            <div class="col-4">
                <td>
                <span style="font-size:30px;" class="ml-5">{{$produit->Nom}}</span>
                </td>
            </div>
        </tr>    
        <tr>
            <div class="col-3">
                <td>
                <h3>Description</h3>
                </td>
            </div>
            <div class="col-4 ml-3">
                <td>
                <div style="font-size:20px;" class="ml-5">{{$produit->Description}}</div>
                </td>
            </div>
        </tr>
        <tr>
            <div class="col-3">
                <td>
                <h3>Prix</h3>
                </td>
            </div>
            <div class="col-4 ml-5">
                <td>
                <h3 class="ml-5">{{number_format($produit->Prix,thousands_separator:' ')}} <strong class="text-primary" style="font-size:30px;">FCFA</strong></h3>
                </td>
            </div>
        </tr>
        </table>
    </div>
</div>
<div class="container mt-3">
    <div>
    <p style="font-size:20px;font-weight:bold">Ce bien vous interesse t-il ? Ajouter le a votre panier! </br> 
    Mais avant veuillez preciser quelques détails.</p>
    <form class="d-flex flex-column justify-content-between" action="{{route('user.ajouterpanier',['slug'=>$produit->getSlug(),'produit'=>$produit])}}" method="get">
     @csrf
     <select class="mt-3"  style="width:300px;" name="couleur">
     <option value="">Choisissez votre couleur</option>
     <option value="Blanc">Blanc</option>
     <option value="Noire">Noire</option>
     <option value="Vert">Vert</option>
     <option value="Rouge">Rouge</option>
     <option value="Bleue">Bleue</option>
     <option value="Maron">Maron</option>
     <option value="Jaune">Jaune</option>
     <option value="Berge">Berge</option>
     <option value="Gris">Gris</option>
     <option value="N'importe">N'importe</option>
     </select>
    @error('couleur')
    {{$message}}
    @enderror
     @if ( strcasecmp($produit->categorie->Nom,'Chaussures') == 0 )
     <label for="">Entrer votre pointure</label>
     <input class="" style="width:300px;" name="taille" type="number">
     @endif
     @if ( strcasecmp($produit->categorie->Nom,'Vetements') == 0 )
     <select class="mt-3"  style="width:300px;" name="taille">
     <option value="">Choisissez votre taille</option>
     <option value="S">S</option>
     <option value="M">M</option>
     <option value="L">L</option>
     <option value="XL">XL</option>
     <option value="XXL">XXL</option>
     </select>
     @endif
     @if ( strcasecmp($produit->categorie->Nom,'Outils_Informatiques') == 0 )
     <select class="mt-3"  style="width:300px;" name="taille">
        <option value="">Choisissez votre taille</option>
        <option value="12pouces">12pouces</option>
        <option value="14pouces">14pouces</option>
        <option value="15,6pouces">15,6pouces</option>
        <option value="Pas besoin">Pas besoin</option>
     </select>
     @endif
    @error('taille')
    {{$message}}
    @enderror
    <button style="width:300px;"  type="submit" class="btn btn-primary mt-3 ml-5">Ajouter au panier</button>
    </form>
    </div>
</div>
@endsection