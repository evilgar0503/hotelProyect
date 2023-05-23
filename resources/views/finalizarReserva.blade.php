<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center min-h-screen">
                <div class="flex-1 max-w-6xl mx-auto bg-white rounded-lg shadow-xl">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:h-auto md:w-2/4">
                            <img class="object-cover w-full h-full"
                                src="{{$habitacion->foto}}"
                                alt="img" />
                        </div>
                        <div class="flex items-center justify-center p-6 sm:p-12 md:w-2/4">
                            <div class="w-full">
                                <div class="flex justify-end">
                                    <a href="{{ route('busqueda') }}">
                                        <p class="text-gray-600">← Cancelar reserva</p>
                                    </a>
                                </div>
                                <h3 class="mb-4 text-xl font-bold text-blue-600">Finalizar reserva</h3>
                                <form action="{{route('reservar.store')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="fecha_entrada" value="{{ $fecha_entrada }}">
                                    <input type="hidden" name="fecha_salida" value="{{ $fecha_salida }}">
                                    <input type="hidden" name="habitacion" value="{{ $habitacion->id }}">
                                    <input type="hidden" name="precio" value="{{ $precio }}">

                                    <div class="w-full bg-gray-200 rounded-full">
                                        <div
                                            class="w-3/3 p-1 text-xs font-medium leading-none text-center text-blue-100 bg-blue-600 rounded-full">
                                            Paso 3
                                        </div>
                                    </div>
                                    <div>
                                        <div class="block m-auto text-center w-1/2 divide-y divide-black">
                                            <h1 class="font-semibold p-2 mt-2 text-lg">Habitacion</h1>
                                            <hr class="w-100 divide-black">
                                            <p class="text-md">{{ $habitacion->nombre }}</p>
                                        </div>
                                        <div class="grid grid-cols-3">
                                            <div class=" block m-auto divide-y divide-black w-2/3">
                                                <h1 class="font-semibold p-2 mt-2 text-lg text-center">Entrada</h1>
                                                <hr class="w-100 divide-black">
                                                <p class="text-md text-center">{{ $fecha_entrada }}</p>
                                            </div>
                                            <div class=" block m-auto divide-y divide-black w-2/3">
                                                <h1 class="font-semibold p-2 mt-2 text-lg text-center">Salida</h1>
                                                <hr class="w-100 divide-black">
                                                <p class="text-md text-center">{{ $fecha_salida }}</p>
                                            </div>
                                            <div class=" block m-auto divide-y divide-black w-2/3">
                                                <h1 class="font-semibold p-2 mt-2 text-lg text-center">€/noche</h1>
                                                <hr class="w-100 divide-black">
                                                <p class="text-md text-center">{{ $habitacion->precio }} €</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-end mt-12">
                                        <div class="inline-block align-bottom mr-5">
                                            <span class="text-2xl leading-none align-baseline">€</span>
                                            <span class="font-bold text-5xl leading-none align-baseline">{{$precio}}</span>
                                        </div>
                                        <button id="nextBtn" type="submit"
                                            class="px-6 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150  bg-blue-600 border border-transparent rounded-lg  hover:bg-blue-700 focus:outline-none">
                                            Reservar
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
