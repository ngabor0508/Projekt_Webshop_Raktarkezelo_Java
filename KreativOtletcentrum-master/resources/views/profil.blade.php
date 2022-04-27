@section('title', 'KÖC | Profilom')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profilom') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" id="profil_adatok">
                    <h2 id="profiladat_fejlec">
                        Személyes adatok
                    </h2>
                    <p><b>Név:</b> {{ Auth::user()->name }}</p>
                    <p><b>Email:</b> {{ Auth::user()->email }}</p>
                    <p><b>Regisztrálva:</b> {{ Auth::user()->created_at }}</p>
                    <a href="{{ 'adat_modositas' }}"><button id="adatok_modositasa">Adatok módosítása</button></a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>