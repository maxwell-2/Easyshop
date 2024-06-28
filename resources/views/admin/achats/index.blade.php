@extends("homeadmin")
@section('title','EasyShop- Gestion des achats')
@section("content")

<div class="container mt-3">
        <div class="text-center py-5">
        <h1 >Bienvenue dans l'espace d'administration de EasyShop<h1>
        </div>
        
        <div class="d-flex justify-content-between">
            <h3>Voici la liste des achats client</h3>
        </div>
        <div>
        <table class="table table-striped ">
            <thead>
                <tr>
                <th class="col-3">Client</th>
                <th class="col-3">Produit</th>
                <th class="col-3">Details_Commandes</th>
                <th class="col-3">Quantité</th>
                <th class="col-3">Transactions_Ref</th>
                <th class="col-3">Actions</th>
                </tr>    
            </thead>
            <tbody>
                @foreach($achats as $achat)
                <tr>
                <td>{{\App\Models\User::select('name')->where('id','=',$achat->user_id)->value('name')}} <br>
                    {{\App\Models\User::select('email')->where('id','=',$achat->user_id)->value('email')}}
                </td>
                <td>{{$achat->produit}}</td>
                <td>{{$achat->taille}} <br>
                    {{$achat->couleur}} 
                </td>
                <td>{{$achat->quantité}} ({{number_format($achat->total,thousands_separator:' ')}}FCFA)</td>
                <td>{{$achat->Transaction_Ref}} 
                </td>
                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <form action="" method="post">
                        @csrf
                        <button class="btn btn-primary ml-2">Valider</button>
                        </form>  
                    </div>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
</div>
        {{$achats->links()}}
@endsection
