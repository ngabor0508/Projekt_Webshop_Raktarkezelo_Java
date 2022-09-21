@extends('layouts.layout')

@section('title', $termekek->name)

@section('content')
    <h1> {{ $termekek->name }}</h1>
    <p>A termék ára: {{ $termekek->price }} Ft</p>
    <p>Elérhető mennyiség: {{ $termekek->quantity }} db</p>
    <p>Elérhető-e jelenleg a termék: {{ $termekek->kodszam }} </p>
@endsection
