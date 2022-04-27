@extends('layouts.layout')
@section('title', 'Dekorációk')

@section('content')
<p style="margin-top: 10%;"></p>
<div class="dropdown">
    <button class="dropbtn">Rendezés/Szűrés</button>
    <div class="dropdown-content">
        <p id="dropdown_fejlec">Rendezés</p>
        <a href="{{ route('rendezes_novekvo_dekor') }}">Ár szerint növekvő <i class="fa-solid fa-arrow-up-wide-short"></i></a>
          <a href="{{ route('rendezes_csokkeno_dekor') }}">Ár szerint csökkenő <i class="fa-solid fa-arrow-down-wide-short"></i></a>
        <p id="dropdown_fejlec">Szűrés</p>
        <form action="{{ route('szures_dekor')}}" method="GET" id="szuro_mezo">
            <input type="number" name="query_mettol" placeholder="Ár-tól" required>
            <input type="number" name="query_meddig" placeholder="Ár-ig" required>
            <button type="submit" id="szuro_gomb">Szűrés<i class="fa-solid fa-filter"></i></button>
        </form>
    </div>
</div>



<div class="container">
    <div class="text-center" id="fejlec">
        <h2 class="section-heading text-uppercase">Dekorációk</h2>
    </div>
</div>

<div class="row">
    @foreach($dekoraciok as $dekoracio)
    <div class="col-xs-18 col-sm-12 col-md-6 col-lg-4 col-xl-4">
        <img src="{{ $dekoracio->url }}" alt="termek_kep">
        <div class="text-center">
            <h4>{{ $dekoracio->name }}</h4>
            <p id="elfogyott">@if ($dekoracio->quantity <= 0) Jelenleg nem kapható @endif </p>
                    <p>@if ($dekoracio->quantity >= 1) Mennyiség: {{$dekoracio->quantity}} db @endif</p>
                    <p>Ár: <strong>{{ $dekoracio->price }}Ft</strong></p>
        </div>
        @if ($dekoracio->quantity <= 0) <p class="btn-holder" style="color:red; font-weight:bold; font-size:1.5rem">A termék jelenleg nem elérhető</p> @endif
        @if ($dekoracio->quantity >= 1) <p class="btn-holder"><a href="{{ route('add.to.cart', $dekoracio->id) }}" class="btn-block text-center" id="kosargomb" role="button"><i class="fa-solid fa-cart-shopping"></i></a> </p> @endif

        
    </div>
    @endforeach

</div>

<div class="row" id="lapozas">
    <div class="xl-12">
        {{$dekoraciok->links('pagination::bootstrap-4')}}
    </div>

</div>


<!--Termékek vége-->

@endsection