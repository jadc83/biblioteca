<x-app-layout>
    <form class="inline w-5/6" method="POST" action="{{route('libros.update',$libro)}}" class="flex items-center justify-center h-screen">
        @method('PUT')
        @csrf
        <div class="w-5/6  mx-auto bg-white p-2 rounded-lg shadow-md">
                <label>Titulo</label>
                <input type="text" value="{{$libro->titulo}}" name="titulo" id="titulo" class="block w-full px-4 rounded-md border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required /><br>
                <label>Autor</label>
                <input type="text" value="{{$libro->autor}}" name="autor" id="autor" class="block w-full px-4 rounded-md border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required /><br>
        </div>
        <div class="flex justify-center mt-4">
            <x-primary-button class="mx-auto">Editar libro</x-primary-button>
        </div>
    </form>
</x-app-layout>
