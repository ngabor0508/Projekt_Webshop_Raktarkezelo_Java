@extends('layouts.layout')
@section('title', 'Alapanyagok')

@section('content')
<!--Termékek kezdete-->
<p style="margin-top: 10%;"></p>
<div class="dropdown">
    <button class="dropbtn">Rendezés/Szűrés</button>
    <div class="dropdown-content">
        <p id="dropdown_fejlec">Rendezés</p>
        <a href="{{ route('rendezes_novekvo_alap') }}">Ár szerint növekvő <i class="fa-solid fa-arrow-up-wide-short"></i></a>
          <a href="{{ route('rendezes_csokkeno_alap') }}">Ár szerint csökkenő <i class="fa-solid fa-arrow-down-wide-short"></i></a>
        <p id="dropdown_fejlec">Szűrés</p>
        <form action="{{ route('szures_dekor')}}" method="GET" id="szuro_mezo">
            <input type="number" name="query_mettol" placeholder="Ár-tól" required>
            <input type="number" name="query_meddig" placeholder="Ár-ig" required>
            <button type="submit" id="szuro_gomb"><i class="fa-solid fa-filter"></i></button>
        </form>
    </div>
</div>
<div class="container">
    <div class="text-center" id="fejlec">
        <h2 class="section-heading text-uppercase">Alapanyagok</h2>
    </div>

    <div class="row">
        @foreach($alapanyagok as $alapanyag)
        <div class="col-xs-18 col-sm-12 col-md-6 col-lg-4 col-xl-4">
            <img src="{{ $alapanyag->url }}" alt="termek_kep">
            <div class="text-center">
            <h4>{{ $alapanyag->name }}</h4>
            <p>Mennyiség: {{ $alapanyag->quantity }}</p>
            <p>Ár:  <strong>{{ $alapanyag->price }}Ft</strong></p>
            </div>
            <p class="btn-holder"><a href="{{ route('add.to.cart', $alapanyag->id) }}" class="btn-block text-center" id="kosargomb" role="button"><i class="fa-solid fa-cart-shopping"></i></a> </p>
        </div>
        @endforeach

    </div>

    <div class="row" id="lapozas">
        <div class="xl-12">
            {{$alapanyagok->links('pagination::bootstrap-4')}}
        </div>

    </div>

</div>


<!--Termékek vége-->

@endsection