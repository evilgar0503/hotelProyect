<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/buscador.css">
    @livewireStyles
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="bg-gray-100 min-h-screen flex items-center justify-center ">
        <div
            class="bg-gray-800 p-0 m-0 flex-1 flex flex-col space-y-5 lg:space-y-0 lg:flex-row lg:space-x-10 w-full min-h-screen sm:p-6 ">
            <!-- Navigation -->
            <div class="bg-gray-900 px-2 lg:px-4 py-2 lg:py-10 sm:rounded-xl flex lg:flex-col justify-between">
                <nav class="flex items-center flex-row space-x-2 lg:space-x-0 lg:flex-col lg:space-y-5">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('index') }}">
                            <x-application-logo class="block h-9 w-auto fill-current" />
                        </a>
                    </div>
                    <!-- ICONO RESERVAS -->
                    <a class="bg-gray-800 text-white p-4 inline-flex justify-center rounded-md mt-5"
                        href="{{ route('usuarios') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                        </svg>
                    </a>
                    <!-- ICONO RESERVAS -->
                    <a class="text-white/50 p-4 inline-flex justify-center rounded-md hover:bg-gray-800 hover:text-white smooth-hover"
                        href="{{ route('reservas.show') }}">
                        <svg width="30" height="30" viewBox="0 0 50 50" fill="none"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="50" height="50" fill="url(#pattern0)" />
                            <defs>
                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1"
                                    height="1">
                                    <use xlink:href="#image0_6_3" transform="scale(0.02)" />
                                </pattern>
                                <image id="image0_6_3" width="50" height="50"
                                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAACr0lEQVR4nO2aW4iNURTHj8uMS03y5JIXTV5EXngxXoQH4UERTx6UKJlMHhQPRozLC1FEU0LTPHr0NEqIXJIHMoNczyExcotc8tNy/qd2X2d0Pmd/Z3+N/a+v01rf+vZaa++11l57dwqFiIiIugA0AweBlzQeJWC/2eDDkQOExz4fjtisGObXPVh63W3SXfIx2B94sSykfqIjfkBckeEUWsAI4E6VMnjZu6UZOzISuF3FkUveLc15RHgDMdk9zAjQAqwDzgH9wGc9D4FTwOLcb4jAeuAV8B3oA/YCW4AdwGngtYa0d5MzdYRyx9ufpmoBo4FuyZnB04aQGwNsB34Az4ApWTtyP03VAk4Av4CNNepYLfmLualalI0y7Kky+8uB3cARYKfo8Xrfo++WBc8RyiFlSfwYaHL4S4GnVMdmycwT3ZMHR1ZKpN3hrQJ+in8WWKLnjXgLnY33o01CHhzplkir6EkyzrDLkRurBMetVioqX4P3WsA94L1Dd0r2kXvWBuaKP5j4/jnwKXivBQwCDxz6qmSPJuTaxb/i8JoUgnczcSQNgG/AgENXErwjMTE3xT/j8FeIdywPOVIEPlg4ir6mT3qdMLUrnQqOiz8OuK4VmZ0HR/okMke0tSIV3FIy28a3Qb92P7bNcbizHv0+HemQyGGnOvU6zth10hq9O5Tgb6pXv8+qNRF4B3wBZiX4rbZhJuSnAtMtb/5uRYATosLG8ASY+U9Ksw6tWmHXmtJp544uYEbi/ShgkXW+NQ9aCHQeAdYCL5wVfKsNs+js6lauJ2Sh3+tA6nitGz4JXABuAOfVc20d6pziS39+YjRU1coaNLJqZQkCR4Q3EHMkZ0tLXJFhvCIljdXmxbJ0uhdId9HHYO6hKBS6fDjSLGcqK9NIFNWA1v+HgYiI/xy/AdEoFueiTD62AAAAAElFTkSuQmCC" />
                            </defs>
                        </svg>

                    </a>
                </nav>
                <div class="flex items-center flex-row space-x-2 lg:space-x-0 lg:flex-col lg:space-y-2">
                    <a class="text-white/50 p-4 inline-flex justify-center rounded-md hover:bg-gray-800 hover:text-white smooth-hover"
                        href="{{ route('profile.edit') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- Content -->
            <div class="flex-1 px-2 sm:px-0">
                {{ $slot }}
            </div>
        </div>
    </div>
    @livewireScripts
</body>

</html>
