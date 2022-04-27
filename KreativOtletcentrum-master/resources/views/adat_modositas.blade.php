@section('title', 'Módosítás')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fiókbeállítások') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" id="modositas_div">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Általános fiókbeállítások
                    </h2>
                    <form action="{{ 'adat_modositas' }}" method="GET">
                        <label for="nev_modosit">Név </label>
                        <input type="text" name="nev_modosit" id="nev_modosit" class="search-data" placeholder="" required>
                        <button type="submit">
                            Módosít
                        </button>
                    </form>
                    <form action="{{ 'adat_modositas' }}" method="GET">
                        <label for="email_modosit">E-mail </label>
                        <input type="email" name="email_modosit" id="email_modosit" class="search-data" placeholder="pelda@gmail.com" required>
                        <button type="submit">
                            Módosít
                        </button>
                    </form>
                    <form action="{{ 'adat_modositas' }}" method="GET">
                        <label for="jelszo_modosit">Jelszó </label>
                        <input type="password" name="jelszo_modosit" id="jelszo_modosit" class="search-data" placeholder="********" required>
                        <button type="submit">
                            Módosít
                        </button>
                    </form>
                    <a href="{{ route('profil') }}"><button>Mutasd az adataimat!</button></a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>