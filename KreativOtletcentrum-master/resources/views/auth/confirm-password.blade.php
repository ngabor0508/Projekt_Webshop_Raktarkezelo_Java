<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
            <img src="photos/logo.png" alt="logo" height="550px" width="500px">

            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Ez az alkalmazás biztonságát szolgáló felület. Kérjük erősítse meg jelszavát, mielőtt továbblép.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-label for="password" :value="__('Jelszó')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <x-button>
                    {{ __('Megerősítés') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
