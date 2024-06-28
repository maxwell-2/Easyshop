@extends('homeafter')
@section('title','Inscription')
@section('content')
<div class="container">
    <div class="mb-2">
        <p style="font-size:25px;font-weight:bold">EasyShop votre boutique en ligne.</p>
    </div>
    <div style="border:solid,1px;border-radius:10px;width:500px;margin:auto" class="p-3 bg-light">
        <form style=""   class="d-flex flex-column " action="{{route('user.validerinscription')}}" method="post">
            @csrf
            <p style="font-size:20px;font-weight:bold" class="text-center">Inscrivez vous!</p>
            <label class="ml-4" for="">Nom</label>
            <input class="ml-4" value="{{old('name','')}}" style="width:400px;" type="text" name="name">
            @error('name')
            {{$message}}
            @enderror
            <label class="ml-4" for="">Prénom</label>
            <input class="ml-4"  value="{{old('secondname','')}}" style="width:400px;" type="text" name="secondname">
            @error('secondname')
            {{$message}}
            @enderror
            <label class="ml-4" for="">Email</label>
            <input class="ml-4"  value="{{old('name','')}}" style="width:400px;" type="email" name="email">
            @error('email')
            {{$message}}
            @enderror
            <label class="ml-4" for="">Mot de passe</label>
            <input class="ml-4"  value="{{old('name','')}}" style="width:400px;" type="password" name="password">
            @error('password')
            {{$message}}
            @enderror
            <button  style="width:200px;margin:auto" type="submit" class="btn btn-primary mt-3">Valider</button>
        </form>
    </div>

</div>
@endsection