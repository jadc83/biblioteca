<x-app-layout>
    <form method="POST" action="{{route('libros.store')}}">
        @csrf
        <div class="flex w-full justify-center h-full ml-24">
            <label>Titulo</label>
            <input type="text" name="titulo" id="titulo"  required /><br/>
            <label>Autor</label>
            <input type="text" name="autor" id="autor"  required /><br/>
        </div>
        <x-primary-button>Crear libro</x-primary-button>
    </form>
</x-app-layout>
