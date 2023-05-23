<x-admin-layout>

    <div class="flex justify-between items-center">
        <h3 class="text-3xl font-extralight text-white/50">Usuarios</h3>
    </div>

    <form method="POST" action="{{ route('admin.create.user') }}">
        @csrf

        <div class="w-2/3 m-auto bg-gray-900 h-1/2 my-36 rounded-lg grid grid-cols-4 p-12 gap-5">
            <!-- Nombre -->
            <div class="col-span-2 w-full">
                <label for="nombre" class="text-sm text-white">Nombre</label>
                <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')"
                    required autofocus autocomplete="nombre" />
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>

            <!-- Apellidos -->
            <div class="col-span-2">
                <label for="apellidos" class="text-sm text-white">Apellidos</label>
                <x-text-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')"
                    required autofocus autocomplete="apellidos" />
                <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
            </div>


            <!-- Email Address -->
            <div class="col-span-4">

                <label for="email" class="text-sm text-white">Correo electrónico</label>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="col-span-2">
                <label for="password" class="text-sm text-white">Contraseña</label>

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
            <div class="col-span-2">
                <label for="password_confirmation" class="text-sm text-white">Confirmar contraseña</label>
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                {{-- <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" /> --}}
                @error('password_confirmation')
                    <div class="text-sm text-red-600 space-y-1">
                        El campo de contraseña debe tener al menos 8 caracteres.
                    </div>
                @enderror
            </div>

            <div class="col-span-4 flex justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Registrar') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-admin-layout>
