<x-app-layout>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    @if (session()->has('error'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Error</span> {{ session()->get('error') }}
        </div>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <h1 class="text-center text-2xl">{{ ucfirst($libro->titulo) }}</h1>
        <h2 class="text-center text-2xl">{{ ucfirst($libro->autor) }}</h2>
        @foreach($libro->ejemplares as $ejemplar)
            <h3 class="text-center text-2xl">
                {{$ejemplar->codigo}}/{{$ejemplar->id}}
                @if(in_array($ejemplar->id, $prestamos))
                    - Prestado
                @else
                    - Disponible
                @endif
            </h3>
        @endforeach
    </div>

    <div class="flex justify-center mt-4 ml-10">
        <x-primary-button><a href="{{ route('libros.index') }}">Volver</a></x-primary-button>
    </div>

</x-app-layout>
