<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <img src="https://res.cloudinary.com/dnoinlxvo/image/upload/v1649272609/logo_ob9nqc.png" alt="logo" height="500px" width="450px">
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Köszönjük a regisztrációt! Mielőtt belekezdene, erősítse meg az emailben kapott link segítségével regisztrációját! Ha nem kapott emailt, a gombra kattintva újraküldjük azt.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Az új megerősítő emailt kiküldtük az email fiókjára.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Megerősítő Email újraküldése') }}
                    </x-button>
                </div>
            </form>
<a href="https://mail.google.com/mail/u/0/#inbox" target="blank"><button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Vigyél az email fiókomba') }}
                </button></a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Vissza') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
