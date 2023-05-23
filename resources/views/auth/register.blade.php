<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 fondoRegistro">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <div class="shrink-0 flex items-center py-4">
                <div class="m-auto flex">
                    <a href="{{ route('index') }}">
                        <img src="https://www.hotelprincipepio.com/static/svg/logo-white.svg" width="170px"
                            class="invert">
                    </a>
                </div>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nombre -->
                <div>
                    <x-input-label for="nombre" :value="__('Nombre')" />
                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                        :value="old('nombre')" required autofocus autocomplete="nombre" />
                    <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                </div>

                <!-- Apellidos -->
                <div class="mt-4">
                    <x-input-label for="apellidos" :value="__('Apellidos')" />
                    <x-text-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos"
                        :value="old('apellidos')" required autofocus autocomplete="apellidos" />
                    <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Correo electrónico')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Contraseña')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />

                    {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
                    @error('password')
                        <div class="text-sm text-red-600 space-y-1">
                            El campo de contraseña debe tener al menos 8 caracteres.
                        </div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />

                    {{-- <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" /> --}}
                    @error('password_confirmation')
                        <div class="text-sm text-red-600 space-y-1">
                            El campo de contraseña debe tener al menos 8 caracteres.
                        </div>
                    @enderror
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('login') }}">
                        {{ __('¿Tienes cuenta?') }}
                    </a>

                    <x-primary-button class="ml-4">
                        {{ __('Registrarse') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

</x-guest-layout>
