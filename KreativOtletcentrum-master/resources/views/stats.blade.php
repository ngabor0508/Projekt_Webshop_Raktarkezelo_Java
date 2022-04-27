@extends('layouts.layout')

@section('title', 'Termekek')

@section('content')
    <p>
        <a href="{{ route('termekek.index') }}">Webshop termékei</a>
    </p>
@endsection
