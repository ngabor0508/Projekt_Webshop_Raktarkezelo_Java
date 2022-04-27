@extends('layouts.layout')
@section('title', 'Termékek')

@section('content')

<div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Termékek</h2>
            <h3 class="section-subheading text-muted">Válasszon a termék kategóriák közül!</h3>
        </div>
        <div class="row text-center">

            <div class="col-md-4">
                <a href="{{ route('kesz_termekek') }}" id="kategoria_link">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-gifts fa-stack-1x fa-inverse" style="color: #fddcd3;"></i>
                    </span><h4 class="my-3">Kész termékek</h4></a>                
            </div>

            <div class="col-md-4">
                <a href="{{ route('alapanyagok') }}" id="kategoria_link">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-cut fa-stack-1x fa-inverse" style="color: #fddcd3;"></i>
                    </span><h4 class="my-3">Alapanyagok</h4></a>               
            </div>

            <div class="col-md-4">
                <a href="{{ route('dekoraciok') }}" id="kategoria_link">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-gift fa-stack-1x fa-inverse" style="color: #fddcd3;"></i>
                    </span><h4 class="my-3">Dekorációk</h4></a>         
            </div>
        </div>
    </div>

    

@endsection
