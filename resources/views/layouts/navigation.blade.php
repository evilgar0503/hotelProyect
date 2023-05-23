<nav x-data="{ open: false }" class="bg-black text-white fixed w-full z-10">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex w-full justify-between h-16 ">
            <div class="sm:top-0 p-3.5 ">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('index') }}">
                            <x-application-logo class="block h-9 w-auto fill-current" />
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex text-white">
                        <x-nav-link :href="route('galeria.index')" :active="request()->routeIs('galeria.index')">
                            {{ __('Galería') }}
                        </x-nav-link>
                    </div>
                    @auth

                        <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex text-white">
                            <x-nav-link :href="route('busqueda')" :active="request()->routeIs('busqueda')">
                                {{ __('Reservar') }}
                            </x-nav-link>
                        </div>
                        <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex text-white">
                            <x-nav-link :href="route('misReservas')" :active="request()->routeIs('reservas.index')">
                                {{ __('Mis reservas') }}
                            </x-nav-link>
                        </div>
                        @if (auth()->user()->rol == 1)
                            <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex text-white sm:justify-end">
                                <x-nav-link :href="route('usuarios')" :active="request()->routeIs('usuarios')">
                                    {{ __('Administración') }}
                                </x-nav-link>
                            </div>
                        @endif
                    @endauth

                </div>
                @auth
                    <div class="sm:fixed right-16 sm:top-0 p-6 mr-5 text-sm lg:block hidden">
                        Bienvenido, {{ Auth::user()->nombre }}
                    </div>
                    <!-- Settings Dropdown -->
                    <div class="sm:fixed sm:top-0 sm:right-0 p-3.5 mr-5 text-right ">
                        <x-dropdown align="right">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class="ml-1">
                                        <svg width="24" height="24" viewBox="0 0 48 48" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <rect width="48" height="48" fill="url(#pattern0)" />
                                            <defs>
                                                <pattern id="pattern0" patternContentUnits="objectBoundingBox"
                                                    width="1" height="1">
                                                    <use xlink:href="#image0_4_3" transform="scale(0.0208333)" />
                                                </pattern>
                                                <image id="image0_4_3" width="48" height="48"
                                                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAB4ElEQVR4nO2Yy0oDMRSGo6Ku2q5c9QW8rNzqGygourUPUHAlbvQFXPUG4to3UBFBpA+ge+sFwSeoongpQqWfBI9QQ6a103Ymaj44MMycOedPchKSKOXxeDx/CmAKKAIV4EVMPxeASeUqwAiwDbwTjP5WAoaVg+LL/JwTpxrBZ893Skk5VPNm2VwAC0BCbBG4NHzqwIQLDShaxCctfingyvDNx6P6uzAtuJnFFr5Lhu95tGrtop4MUYkWvknD9ylatX+0AZXfXkIFQ5RebVIBk/ja8M3Fo/q7sEnLMnolvZ0UW7KI18vouHIB2R50SvxL6Bd6WyDbg59y7NRWoqkRJSmNIOoyZ9wSb5kTeb3CAM9i+jnnTM17PB6POwBDwDSwCuzI2fgGqAJvYlV5VxafVflnKC7R+pi4AhwAj4TnEdiXWImozr+7QI3eU5PYU/0Qngb2gAb9pyG50r0SnwEe2iStSjltyNZZj9QYMCo2Ju+WgU3xvWsTU+fMdCt+vUWCW2BLJuNAiNgD8u+WxApiLaz42YBrwlO55xkMFdiea1BinlnyaQ0zYYIeGYFegWyY3u5wVLKSq5nDMMHujSBzfVFtAZg3ct+pTjHHUUUM3ebHMZRvQMyofzcCHo/Ho6LgA3X++5F/p8OpAAAAAElFTkSuQmCC" />
                                            </defs>
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Perfil') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    @if (Route::has('login'))
                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                            <a href="{{ route('login') }}"
                                class="font-semibold">Inicia
                                Sesión</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="ml-4 font-semibold">Registrate</a>
                            @endif

                        </div>
                    @endif
                @endauth

            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        @auth
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('usuarios')" :active="request()->routeIs('usuarios')">
                    {{ __('Administración') }}
                </x-responsive-nav-link>
            </div>
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base ">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm ">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth

    </div>
</nav>
