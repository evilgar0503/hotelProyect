<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center min-h-screen">
                <div class="flex-1 max-w-4xl mx-auto bg-white rounded-lg shadow-xl">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:h-auto md:w-1/2">
                            <img class="object-cover w-full h-full"
                                src="https://a-static.besthdwallpaper.com/marking-the-calendar-for-2021-agenda-with-chocolate-and-coffee-wallpaper-5120x2880-60469_55.jpg"
                                alt="img" />
                        </div>
                        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                            <div class="w-full">
                                <h3 class="mb-4 text-xl font-bold text-blue-600">Realizar reserva</h3>
                                <form action="{{route('busqueda.comprobar')}}">
                                    @csrf
                                    <div class="">
                                        <div class="w-full bg-gray-200 rounded-full">
                                            <div
                                                class="w-40 p-1 text-xs font-medium leading-none text-center text-blue-100 bg-blue-600 rounded-full">
                                                Paso 1
                                            </div>
                                        </div>
                                        <div>
                                            <div class="mt-4 mb-4">
                                                <label class="block text-sm">Fecha de Entrada</label>
                                                <input type="date" name="fecha_entrada"
                                                    class="w-full px-4 py-2 text-sm border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600" required/>
                                            </div>
                                            <div class="mt-4 mb-4">
                                                <label class="block text-sm">Fecha de Salida</label>
                                                <input type="date" name="fecha_salida"
                                                    class="w-full px-4 py-2 text-sm border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600" required/>
                                            </div>
                                            @if (isset($status))
                                            <p class="text-red-500">{{ $status }}</p>
                                            @endif
                                            <div class="mt-4">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex justify-end">
                                        <button id="nextBtn" type="submit"
                                            class="px-6 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150  bg-blue-600 border border-transparent rounded-lg  hover:bg-blue-700 focus:outline-none"
                                            href="#">
                                            Buscar disponibilidad
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
