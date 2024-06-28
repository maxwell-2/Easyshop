@extends("homeadmin")
@section("title",$produit->exists ? "Modifier le bien":"Creer le bien")
@section("content")
<div class="container my-3">
    <h2>@yield('title')</h2>
    <form  class="vstack gap-5" method="post" action="{{route($produit->exists? 'admin.property.update':
    'admin.property.store',$produit)}}" enctype="multipart/form-data">
        @csrf
        @method($produit->exists? 'put':'post')
        <table class="table-striped">
            <tbody>
            <tr>
                <th class="col-4">
                    <div class="row d-flex flex-column ml-2">
                        <div class="col">
                        <label for="">Nom du produit</label>
                        <input type="text" placeholder="" value="{{old('nom',$produit->Nom)}}" class="form-control" name="nom">
                        @error('nom')
                        {{$message}}
                        @enderror
                        </div>
                        <div class="col">
                        <label for="">Prix du produit</label>
                        <input type="text" placeholder="" value="{{old('prix',$produit->Prix)}}" name="prix" class="form-control">
                        @error('prix')
                        {{$message}}
                        @enderror
                        </div>
                        <div class="col">
                        <label for="">Image du produit</label>
                        <input type="file" placeholder="" class="form-control" name="image">
                        @error('image')
                        {{$message}}
                        @enderror
                        </div>
                        <label for="">Categorie du produit</label>
                        <select name="categorie" >
                            <option value="">Sélectionner une categorie</option>
                            @foreach($categories as $categorie)
                            <option @selected(old('categorie',$categorie->id)==$produit->categorie_id) value="{{$categorie->id}}">{{$categorie->Nom}}</option>
                            @endforeach
                        </select>
                        @error('categorie')
                        {{$message}}
                        @enderror
                        <label for="">Stock disponible</label>
                        <input name="Stock_disponible" placeholder="" value="{{old('Stock_disponible',$produit->Stock_disponible)}}" type="number" class="form-control">
                        @error('Stock_disponible')
                        {{$message}}
                        @enderror
                        <label for="">Description du bien</label>
                        <textarea name="Description" id="">{{old('Description',$produit->Description)}}</textarea>
                        </div>
                    </div>
            </th>
            <th class="col-4">
                <div class="row my-3 d-flex flex-column">
                    <div class="col">
                    @if($produit->image)
                    <img style="width:400px;height:300px;" src="\storage\{{$produit->image}}" alt="">
                    @endif
                    </div>
                    <div class="col">
                    <button style="width:300px" class="btn btn-primary mt-3 ml-5">
                    @if($produit->exists)
                    Modifier
                    @else
                    Creer
                    @endif
                    </button> 
                    </div>
                </div>    
            </th>
            </tr>
            </tbody>
        </table>  
    </form>
</div>

@endsection