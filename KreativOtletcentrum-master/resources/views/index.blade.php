@extends('layouts.layout')
@section('title', 'Főoldal')

@section('content')
<div class="container" id="bemutatkozo">
  <div class="text-center">
    <h2>KREATIVITÁS FELSŐFOKON !</h2>
    <p>Örülünk, hogy ránk találtál, és érdeklődsz a kreatív kézműves tevékenységek iránt ! A fantázia adja az ötleteket,
      amely összefonódva megvalósítható kreatív alkotássá formálódik. Számos dekor alapanyag áll rendelkezésre ahhoz,
      hogy ötleteidet, megvalósítsd! Folyamatosan készítünk ajándéktárgyakat, kézműves termékeket minden alkalomra.
      Fő profilunk a dekorációs kellékek, kiegészítők, alapanyagok, kész dekorációk forgalmazása.
    </p>
    <p>Állandó fejlődésben, a minőséget szem előtt tartva próbálunk a változó piacnak megfelelni.
      Izgalmas és sokféle kreatív alapanyagot találsz nálunk, ezen felül tanácsokkal látunk el, a decoupage technikák,
      repesztések, festések, antikolások elsajátításához. Egyedi elképzeléseket is megvalósítunk.
    </p><br />
    <h2>Mert…, alkotni…, öröm…</h2>
    <p>Köszönjük ellátogattál hozzánk.</p>
  </div>
</div>

<!-- <div class="container" id="elerhetoseg">
    <div class="row">

      <div class="col-lg-6">
        <h2>Elérhetőségeink</h2>
        <p>Email: kocentrum@info.hu</p>
        <p>Telefonszám: +36301234567</p>
      </div>
      <div class="col-lg-6">
        <iframe id="terkep" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9081.089942961125!2d19.397610731155908!3d47.41537022726169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741be50def15e91%3A0x400c4290c1e29d0!2zR3nDtm1yxZEsIDIyMzA!5e0!3m2!1shu!2shu!4v1645550595304!5m2!1shu!2shu" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>

  </div> -->
<div id="bejelentkezo_panel" style="margin-bottom: -25%;">
  @auth
  <x-guest-layout>
    <x-auth-card>
      <x-slot name="logo">
        <img src="photos/logo.png" alt="logo" height="500px" width="450px">
      </x-slot>
      <a href="{{ route('profil') }}" id="nev_kiir_fooldal">
        {{ Auth::user()->name }}
      </a>
    </x-auth-card>
  </x-guest-layout>
  @else
  <x-guest-layout>
    <x-auth-card>
      <x-slot name="logo">
        <img src="photos/logo.png" alt="logo" height="500px" width="450px">
      </x-slot>
      <div class="flex items-center justify-end mt-4" id="bejelentkezes_linkek">
          <a href="/verify-email" id="bejelentkezes_gomb_link">
              {{ __('Bejelentkezés') }}
          </a>
          <a href="/register" id="bejelentkezes_gomb_link">
              {{ __('Regisztráció') }}
          </a>
        </div>
    </x-auth-card>
  </x-guest-layout>
  @endauth

</div>


@endsection