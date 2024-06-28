@extends('homeafter')
@section('title','Verification')
@section('content')
<div class="container">
    <h2>Vérification</h2>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div>{{ session('error') }}</div>
    @endif
    <form method="POST" action="{{ route('process.payment') }}" id="paymentForm">
        @csrf
        <input type="text" name="total" value="{{$total}}">
        <input type="email" name="email" value="{{\Illuminate\Support\Facades\Auth::user()->email}}" placeholder="Votre adresse e-mail" required>
        <button type="submit">Payer avec FedaPay</button>
    </form>
</div>
@endsection
