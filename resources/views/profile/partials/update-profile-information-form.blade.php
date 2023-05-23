<section class="grid grid-cols-12">
    <div class="col-start-1 col-span-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Información del perfil') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Actualiza tu información personal y correo electrónico.') }}
            </p>
        </header>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div>

                <x-input-label for="foto" :value="__('Foto Perfil')" />
                <input type="file" name="foto" id="foto" value="old('foto', {{$user->foto}})" class="mt-1 block w-full">
                <p class="text-red-500">Foto actual: {{$user->foto}}</p>
                <x-input-error class="mt-2" :messages="$errors->get('foto')" />
            </div>

            <div>
                <x-input-label for="nombre" :value="__('Nombre')" />
                <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" :value="old('nombre', $user->nombre)"
                    required autofocus autocomplete="nombre" />
                <x-input-error class="mt-2" :messages="$errors->get('nombre')" />
            </div>

            <div>
                <x-input-label for="apellidos" :value="__('Apellidos')" />
                <x-text-input id="apellidos" name="apellidos" type="text" class="mt-1 block w-full" :value="old('apellidos', $user->apellidos)"
                    required autofocus autocomplete="apellidos" />
                <x-input-error class="mt-2" :messages="$errors->get('apellidos')" />
            </div>

            <div>
                <x-input-label for="dni" :value="__('DNI')" />
                <x-text-input id="dni" name="dni" type="text" class="mt-1 block w-full" :value="old('dni', $user->dni)"
                    autofocus autocomplete="dni" />
                <x-input-error class="mt-2" :messages="$errors->get('dni')" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                    required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Guardar') }}</x-primary-button>

                @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600">{{ __('Actualizado correctamente.') }}</p>
                @endif
            </div>
        </form>
    </div>
    <div class="col-start-7 col-span-6 m-auto justify-center">
        @if ($user->foto != null)
        <img src="storage/img_users/{{ $user->foto }}" alt="Foto user" width="200px" class="rounded">
        @else
        <img class="object-cover object-center rounded-full"
        src="https://cdn-icons-png.flaticon.com/512/149/149071.png" width="300px" alt="cuisine" />
        @endif
    </div>

</section>
