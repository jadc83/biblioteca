<x-app-layout>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            <span class="font-medium">Error</span> {{ session()->get('error') }}
        </div>
    @endif

            <h1 class="w-3/4 p-4 mx-auto">Titulo</h1>

    <div class="shadow-md sm:rounded-lg">

        <ul class="w-3/4 p-4 mx-auto">

            @foreach ($libros as $libro)

                <li class="flex">
                    <h1 class="mx-4">{{ $libro->titulo }}</h1>

                    <a href="{{ route('libros.edit', $libro) }}" class="mx-4 font-medium text-blue-600 hover:underline">Editar</a>
                    <a href="{{ route('libros.show', $libro) }}" class="mx-4 font-medium text-blue-600 hover:underline">Detalles</a>

                    <form method="POST" action="{{ route('libros.destroy', $libro) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="mx-4 font-medium text-blue-600 hover:underline">Borrar</button>
                    </form>
                </li>

            @endforeach
        </ul>
    </div>

    <div class="flex justify-center mt-4 ml-10">
        <x-primary-button>
            <a href="{{ route('libros.create') }}">Insertar nuevo libro</a>
        </x-primary-button>
    </div>
</x-app-layout>
