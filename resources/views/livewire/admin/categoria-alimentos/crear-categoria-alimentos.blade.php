@section('title', 'Crear categoria')

<div class="m-3 w-1/3 p-2 bg-gray-50 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Nueva categoría</h2>
    <div class="flex flex-col">
        <form action="{{ route('categoria-alimentos.store') }}" method="POST">
            @csrf
            <div class="m-3">
                <label for="nombre_categoria" class="block font-bold text-gray-700">Nombre de la categoría</label>
                <input type="text" name="nombre_categoria" id="nombre_categoria"
                    class="w-full rounded-xl text-gray-500 border-gray-300" value="">
                @error('nombre_categoria')
                    <small class="text-red-500">* {{ $message }}</small>
                @enderror
            </div>
            
            <div class="m-3 grid grid-cols-2 gap-4">
                <x-forms.button type="submit" text="Crear categoría" />
                <a href="{{ url()->previous() }}"
                    class="w-full text-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-color-primario hover:bg-color-primario-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-color-primario-700"
                    type="submit">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
