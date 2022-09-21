@extends('layouts.layout')
@section('title', 'Keresés')
@section('content')
<!--Termékek kezdete-->

<div class="container">
    <div class="text-center" id="fejlec">
        <h2 class="section-heading text-uppercase">Keresés</h2>
    </div>

    @if($error != "")
        <h1>{{$error}}</h1>
    @endif
    <div class="row">
        @foreach($kereses as $termek)
        <div class="col-xs-18 col-sm-12 col-md-6 col-lg-4 col-xl-4">
            <img src="{{ $termek->url }}" alt="termek_kep">
            <div class="text-left">
            <h4>{{ $termek->name }}</h4>
            <p>Mennyiség: {{ $termek->quantity }}</p>
            <p>Ár:  <strong>{{ $termek->price }}Ft</strong></p>
            </div>
            
            <p class="btn-holder"><a href="{{ route('add.to.cart', $termek->id) }}" class="btn-block text-center" id="kosargomb" role="button"><i class="fa-solid fa-cart-shopping"></i></a> </p>

        </div>
        @endforeach

    </div>

    <div class="row" id="lapozas">
        <div class="xl-12">
            {{$kereses->links('pagination::bootstrap-4')}}
        </div>

    </div>
</div>


<!--Termékek vége-->

@endsection