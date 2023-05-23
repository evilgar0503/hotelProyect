<x-admin-layout>

    <div class="flex justify-between items-center">
        <h3 class="text-3xl font-extralight text-white/50">Usuarios</h3>
    </div>

    <form method="post" action="{{ route('update.user') }}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="w-2/3 m-auto bg-gray-900 h-1/2 my-12 rounded-lg grid grid-cols-4 p-12 gap-5">


            <div class="col-span-3">
                <!-- Nombre -->
                <div class="mt-3">
                    <label for="nombre" class="text-sm text-white">Nombre</label>
                    <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full"
                        :value="old('nombre', $user->nombre)" required autofocus autocomplete="nombre" />
                    <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                </div>

                <!-- Apellidos -->
                <div class="mt-3">
                    <label for="apellidos" class="text-sm text-white">Apellidos</label>
                    <x-text-input id="apellidos" name="apellidos" type="text" class="mt-1 block w-full"
                        :value="old('apellidos', $user->apellidos)" required autofocus autocomplete="apellidos" />
                    <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
                </div>


                <!-- Email Address -->
                <div class="mt-3">
                    <label for="email" class="text-sm text-white">Correo electrónico</label>
                    <<x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                        :value="old('email', $user->email)" required />
                </div>

                <!-- Dni -->
                <div class="mt-3">
                    <label for="dni" class="text-sm text-white">DNI</label>

                    <x-text-input id="dni" name="dni" type="text" class="mt-1 block w-full"
                        :value="old('dni', $user->dni)" />
                    @error('dni')
                        <div class="text-sm text-red-600 space-y-1">
                            El dni introducido no es correcto o ya está en uso.
                        </div>
                    @enderror
                </div>

                <!-- Foto usuario -->
                <div>
                    <label for="dni" class="text-sm text-white">Foto</label>
                    <input type="file" name="foto" id="foto" value="old('foto', {{ $user->foto }})"
                        class="mt-1 block w-full text-white">
                    <p class="text-red-500">Foto actual: {{ $user->foto }}</p>
                    <x-input-error class="mt-2" :messages="$errors->get('foto')" />
                </div>
            </div>
            <div class="col-span-1 my-auto justify-center">
                @if ($user->foto)
                    <img src="storage/img_users/{{ $user->foto }}" alt="Foto user" width="200px"
                        class="rounded text-white">
                @else
                    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Foto user" width="200px"
                        class="rounded text-white">
                @endif
            </div>

            <div class="col-span-4 flex justify-between mt-4">
                <x-primary-button>{{ __('Guardar') }}</x-primary-button>

    </form>
    @if ($user->id != Auth::id())
        <form action="{{ route('profile.destroy') }}" method="post">
            @csrf
            @method('delete')

            <input type="hidden" name="id" value="{{ $user->id }}">
            <button type="submit"
                class="text-white hover:bg-red-800 rounded bg-red-600 p-3 font-semibold text-xs uppercase tracking-widest">
                Eliminar
            </button>
        </form>
    @endif

    </div>
</x-admin-layout>
