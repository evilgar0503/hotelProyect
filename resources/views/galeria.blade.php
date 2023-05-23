<x-app-layout>
    <div class="py-24">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-amber-600 uppercase text-4xl tracking-widest text-center my-5 font-bold ">
                Hotel Príncipe Pío Madrid
            </h1>
            <div class="w-full grid grid-cols-4 gap-8">
                @foreach ($imagenes as $imagen)
                    <div class="md:col-span-2 col-span-4">
                        <img src="{{ $imagen->url }}" alt="" width="100%">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
