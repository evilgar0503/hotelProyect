<div class="min-h-full">
    <div class="flex justify-between items-center">
        <h3 class="text-3xl font-extralight text-white/50">Reservas</h3>

        <div class="searchBox">
            <input class="searchInput" wire:model="buscador" type="text" placeholder="Búsqueda...">
            <button class="searchButton">
                <i class="material-icons">
                    search
                </i>
            </button>
        </div>
    </div>
    <div class="mb-10 sm:mb-0 mt-10 grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($reservas as $reserva)
            <form action="{{ route('reservar.delete') }}">
                @csrf
                @method('delete')
                <input type="hidden" name="id" value="{{ $reserva->id }}">
                <div
                    class="flip relative group  py-10 sm:py-20 px-4 flex flex-col space-y-2 items-center cursor-pointer rounded-md  hover:smooth-hover">
                    <div class="front">
                        <?php
                        if($reserva->foto != null) { ?>
                        <img class="w-20 h-20 object-cover object-center rounded-full" src="{{ $reserva->foto }}"
                            alt="cuisine" />
                        <?php
                        }
                        else { ?>
                        <img class="w-20 h-20 object-cover object-center rounded-full"
                            src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="cuisine" />
                        <?php
                        }
                        ?>
                        <h4 class="text-white text-2xl font-bold capitalize text-center">{{ $reserva->nombre }}</h4>
                        <h5 class="text-white text-xl">{{ $reserva->user_name }} {{ $reserva->user_apellido }}</h5>
                        <p class="text-white text-sm">Entrada: {{ $reserva->fecha_entrada }} </p>
                        <p class="text-white text-sm">Salida: {{ $reserva->fecha_salida }} </p>
                        <p class="text-white text-sm">Precio: {{ $reserva->precio_total }} €</p>
                    </div>
                    <div class="back p-auto">
                        <div class="p-4 rounded w-2/3 my-36 h-max m-auto">
                            <button type="submit" class="text-white hover:bg-red-800 rounded bg-red-600 w-full p-3">
                                Cancelar Reserva
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach

    </div>
    <div class="w-full items-center justify-between px-4 py-3 my-2 sm:px-6 bg-gray-50  text-white ">
        <div>
            {{ $reservas->links() }}
        </div>
    </div>
</div>

