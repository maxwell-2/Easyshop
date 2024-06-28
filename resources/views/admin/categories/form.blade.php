@extends("homeadmin")
@section("title",$categorie->exists ? "Modifier la categorie":"Creer la categorie")
@section("content")
<div class="container my-3">
    <h2>@yield('title')</h2>
    <form  class="vstack gap-5" method="post" action="{{route($categorie->exists? 'admin.categorie.update':'admin.categorie.store',$categorie)}}">
        @csrf
        @method($categorie->exists? 'put':'post')
        <div class="row">
            <div class="col-8">
            <label for="">Nom de la categorie</label>
            <input type="text" placeholder="" value="{{old('nomcat',$categorie->Nom)}}" class="form-control" name="nomcat">
            @error('nomcat')
            {{$message}}
            @enderror
            </div>
        </div>
        <button class="btn btn-primary mt-3">
        @if($categorie->exists)
            Modifier
            @else
            Creer
            @endif
        </button>
    </form>

</div>

@endsection