@section('title', 'KÖC | Főoldal')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Felhasználói felület') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" id="dash_logo">
                    <x-guest-layout>
                        <x-auth-card>
                            <x-slot name="logo">
                                <img src="photos/logo.png" alt="logo" height="500px" width="450px">
                            </x-slot>
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Szia {{ Auth::user()->name }}! </h2>
                        </x-auth-card>
                    </x-guest-layout>
                    <br />
                </div>
                <div class="p-6 bg-white border-b border-gray-200" id="dash_udvozles">
                    Üdvözlünk a saját felhasználói felületeden!<br />
                    A Profilom menüponton belül módosítani tudod felhasználói adataidat, jelszavadat. <br />
                    A Kosaram gombra kattintva megtekintheted a mentett kosaradat.
                </div>

            </div>
        </div>
    </div>
</x-app-layout>