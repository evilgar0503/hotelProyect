<x-app-layout>
    <div class="py-24">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center min-h-screen">
                <div class="flex-1 max-w-6xl mx-auto bg-white rounded-lg shadow-xl">
                    <div class="flex flex-col md:flex-row">
                        @if (sizeOf($habitaciones) == 0)
                            <div class="md:h-auto md:w-2/3">

                                <img class="object-cover w-full h-full"
                                    src="https://a-static.besthdwallpaper.com/marking-the-calendar-for-2021-agenda-with-chocolate-and-coffee-wallpaper-5120x2880-60469_55.jpg"
                                    alt="img" />


                            </div>
                        @endif
                        <div class="flex items-center justify-center sm:p-12 md:w-3/3">
                            <div class="w-full">
                                <div class="flex justify-end">
                                    <a href="{{ route('busqueda') }}">
                                        <p class="text-gray-600">← Cancelar reserva</p>
                                    </a>
                                </div>
                                <h3 class="mb-4 text-xl font-bold text-blue-600">Selecciona habitación</h3>
                                <div>
                                    @if (sizeOf($habitaciones) == 0)
                                        No existen habitaciones disponibles en las fechas seleccionadas.
                                    @endif
                                </div>
                                @if (sizeOf($habitaciones) != 0)
                                    <form action="{{ route('finalizar.index') }}">
                                        <input type="hidden" name="fecha_entrada" value="{{ $fecha_entrada }}">
                                        <input type="hidden" name="fecha_salida" value="{{ $fecha_salida }}">
                                        <div class="tab">
                                            <div class="w-full bg-gray-200 rounded-full">
                                                <div
                                                    class="w-2/3 p-1 text-xs font-medium leading-none text-center text-blue-100 bg-blue-600 rounded-full">
                                                    Paso 2
                                                </div>
                                            </div>
                                            <div>
                                                @foreach ($habitaciones as $habitacion)
                                                    <div class="col-md-4 col-lg-4 col-sm-4 w-full">
                                                        <label>
                                                            <input type="radio" name="habitacion"
                                                                class="card-input-element"
                                                                value="{{ $habitacion->id }}" />
                                                            <div class="bg-gray-100 my-5 rounded card-input">
                                                                <div class="">
                                                                    <img src="{{ $habitacion->foto }}"
                                                                        alt="Imagen habitación">
                                                                </div>
                                                                <div class="p-4 w-full">
                                                                    <div class="font-medium text-2xl mb-3">
                                                                        {{ $habitacion->nombre }}</div>
                                                                    <div class="grid grid-cols-5 gap-24">
                                                                        <div class="col-span-1">
                                                                            Camas
                                                                            <br>{{ $habitacion->camas }}
                                                                        </div>
                                                                        <div class="col-span-1">
                                                                            Habitación
                                                                            <br>{{ $habitacion->numero_habitacion }}
                                                                        </div>
                                                                        <div class="col-span-1">
                                                                            Planta
                                                                            <br>{{ $habitacion->planta }}
                                                                        </div>
                                                                        <div class="col-span-1">
                                                                            Precio
                                                                            <br>{{ $habitacion->precio }} €
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="flex justify-end">
                                                <button id="nextBtn" type="submit"
                                                    class="px-6 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150  bg-blue-600 border border-transparent rounded-lg  hover:bg-blue-700 focus:outline-none">
                                                    Siguiente
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <form action="{{ route('busqueda') }}">
                                        <div class="flex justify-between">
                                            <div class="justify-start">
                                                <button type="submit"
                                                    class="px-6 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150  bg-blue-600 border border-transparent rounded-lg  hover:bg-blue-700 focus:outline-none">
                                                    Volver
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/reservas.js"></script>
</x-app-layout>
