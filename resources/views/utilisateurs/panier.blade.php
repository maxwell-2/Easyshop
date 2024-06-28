
@extends("homeafterP")
@section("title",'Bienvenue dans votre panier !')
@section("content")
<div class="container">
<div>
<p style="font-size:20px;font-weight:bold" class="text-center"><em style="font-size:22px;">EasyShop</em> votre boutique en ligne ou vous trouvez des produits de qualité </br>
  pour vos besoins de tous les jours.Votre satisfaction notre priorité.
</p>
</div>
 @if($panier)
 <div>
 <p style="font-size:20px;font-weight:bold" class="mt-5">Listes de vos produits sélectionnés</p>
 </div>
 <div  class="mt-3">
 <table class="table table-striped">
    <thead>
        <tr>
            <th style="font-weight:bold;font-size:18px" class="col-2">Nom</th>
            <th style="font-weight:bold;font-size:18px" class="col-2">Prix</th> 
            <th style="font-weight:bold;font-size:18px" class="col-2">Image</th> 
            <th style="font-weight:bold;font-size:18px" class="col-1">Couleur</th> 
            <th style="font-weight:bold;font-size:18px" class="col-2">Taille ou </br>détails</th> 
            <th style="font-weight:bold;font-size:18px" class="col-1  pl-1">Quantité</th>
            <th style="font-weight:bold;font-size:18px" class="col-3">Total</th>
            <th style="font-weight:bold;font-size:18px" class="col-1">Actions</th>                  
        </tr>
    </thead>
    <tbody>
        @foreach($panier as $clef=>$details)
        @php
        $total+=$details['prix']*$details['quantité']
        @endphp
        <tr>
            <td>{{$details['nom']}}</td>
            <td>{{number_format($details['prix'],thousands_separator:' ')}} FCFA</td>
            <td><img class="w-100" src="/storage/{{ $details['image'] }}" alt="" style="width:auto;height:90px;"></td>
            <td>{{$details['couleur']}}</td>
            <td>{{$details['taille']}}</td>
            <td>{{$details['quantité']}}</td>
            <td>{{number_format($details['prix']*$details['quantité'],thousands_separator:' ')}} FCFA</td>
            <td>
                <form class="d-flex justify-content-end" action="{{route('user.retirerpanier',$clef)}}" method="post">
                 @csrf
                 @method("delete")
                 <button style="font-weight:bold;font-size:10px;border-radius:15px" class="btn btn-danger">X</button>
                </form>
            </td>
        </tr> 
         @endforeach
         <tr>
            <td class=""><span style="font-weight:bold; color:#343a40;font-size:20px;">Total des achats</span></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td  style="font-weight:bold; color:#ffc107;font-size:20px" >{{number_format($total,thousands_separator:' ')}} <em>FCFA</em></td>
         </tr>
    </tbody>
 </table>
 </div>
 @auth
 <div>
    <form action="{{route('paiement.succes')}}" method="GET">  <input type="hidden" name="total" value="{{$total}}">
        <input type="hidden" name="field" value="test">
        <script
        src="https://cdn.fedapay.com/checkout.js?v=1.1.7"
        data-public-key="pk_sandbox_oWqqosp5qpN9OBC5OrVx2ZR5"
        data-button-text="Payer"
        data-button-class="button-class"
        data-transaction-amount="{{$total}}"
        data-transaction-description="Regler le panier"
        data-currency-iso="XOF">
        </script>
</form>
</div>
@endauth
@guest
<div style="color:black;font-weight:bold;width:500px;" class="bg-light mt-2">
    Pour payer veuillez vous connecter d'abord.
    Vous aurez alors accès au bouton de paiement pour valider votre commande.
</div>
@endguest
 @else
<h4>Votre panier est pour vide pour le moment.Ajouter des produits qui vous interessent !!!</h4>
@endif
</div>
@endsection
