@extends("homeadmin")
@section('title','EasyShop- Gestion des biens')
@section("content")

<div class="container mt-3">
        <div class="text-center py-5">
        <h1 >Bienvenue dans l'espace d'administration de EasyShop<h1>
        </div>
        
        <div class="d-flex justify-content-between">
            <h3>Voici la liste de vos produits</h3>
            <a class="btn btn-primary" href="{{route('admin.property.create')}}">Ajouter un produit</a>
        </div>
        <div>
        <table class="table table-striped ">
            <thead>
                <tr>
                <th class="col-3">Nom</th>
                <th class="col-3">Prix</th>
                <th class="col-3">Categorie</th>
                <th class="col-3">Stock disponible</th>
                <th class="col-3">Actions</th>
                </tr>    
            </thead>
            <tbody>
                @foreach($produits as $produit)
                <tr>
                <td>{{$produit->Nom}}</td>
                <td>{{number_format($produit->Prix,thousands_separator:' ')}}FCFA</td>
                <td>{{$produit->categorie?->Nom}}</td>
                <td>{{$produit->Stock_disponible}}</td>
                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <a class="btn btn-primary" href="{{route('admin.property.edit',$produit)}}">Editer</a>
                        <form action="{{route('admin.property.destroy',$produit)}}" method="post">
                            @csrf
                            @method("delete")
                        <button class="btn btn-danger ml-2">Supprimer</button>
                        </form>  
                    </div>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
</div>
        {{$produits->links()}}
@endsection
