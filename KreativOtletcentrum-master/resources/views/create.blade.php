@extends('layout')

@section('content')
    <h1>Új termék</h1>


    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif

    <form method='POST' action="{{ route('termekek.store') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
            Termék neve:<br>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            Ár:<br>
            <input type="number" name="price" value="{{ old('price') }}">
            @error('price')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            Mennyiég:<br>
            <input type="number" name="quantity" value="{{ old('quantity') }}">
            @error('quantity')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            Elérhető-e:<br>
            <input type="radio" id="kodszam" name="kodszam" value="1">
        <label for="kodszam">Igen</label><br>
        <input type="radio" name="kodszam" value="0">
        <label for="kodszam">Nem</label><br>
            @error('kodszam')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <input type="submit" value="Hozzáad" class="btn btn-primary">
        </div>
    </form>
@endsection
