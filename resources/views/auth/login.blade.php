<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 fondoLogin">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <div class="shrink-0 flex items-center py-4">
                <div class="m-auto flex">
                    <a href="{{ route('index') }}">
                        <img src="https://www.hotelprincipepio.com/static/svg/logo-white.svg" width="170px"
                            class="invert">
                    </a>
                </div>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Correo electrónico')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="username" />
                    {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                    @error('email')
                        <div class="text-sm text-red-600 space-y-1">
                            Estas credenciales no coinciden con nuestros registros.
                        </div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Contraseña')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />
                    {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}

                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Recuerdame') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm rounded-md "
                            href="{{ route('password.request') }}">
                            {{ __('¿Has olvidado tu contraseña?') }}
                        </a>
                    @endif

                    <x-primary-button class="ml-3">
                        {{ __('Iniciar Sesion') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
