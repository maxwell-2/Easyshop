@extends("homeadmin")
@section('title','EasyShop- Gestion Categorie')
@section("content")
    <div class="container">
        <div class="text-center py-5">
        <h1 >Bienvenue dans l'espace d'administration de EasyShop<h1>
        </div>
        
        <div class="d-flex justify-content-between">
            <h3>Voici la liste de vos categories</h3>
            <a class="btn btn-primary" href="{{route('admin.categorie.create')}}">Ajouter une categorie</a>
        </div>
        <div>
        <table class="table table-striped ">
            <thead>
                <tr>
                <th class="col-9">Nom categorie</th>
                <th class="col-6">Actions</th>
                </tr>    
            </thead>
            <tbody>
                @foreach($categories as $categorie)
                <tr>
                <td>{{$categorie->Nom}}</td>
                <td></td>
                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <a class="btn btn-primary" href="{{route('admin.categorie.edit',$categorie)}}">Editer</a>
                        <form action="{{route('admin.categorie.destroy',$categorie)}}" method="post">
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
        {{$categories->links()}}
    </div>
@endsection
