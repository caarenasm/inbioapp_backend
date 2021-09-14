<x-app-layout>

    @section('title', 'Editar categoria')
    <div class="p-2 bg-white">
        <h2 class="text-2xl py-2 text-fondo-verde font-extrabold text-center m-3">Categorías del diario</h2>
        <div class="m-3 w-1/3 p-2 bg-gray-50 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Editar categoría</h2>
            <div class="flex flex-col">
                <form action="{{ route('categorias-diarios.update', $categoria_diario) }}" method="POST">
                    @csrf
                    @method('put')

                    <div class="m-3">
                        <label for="nombre_categoria" class="block font-bold text-gray-700">Nombre de la
                            categoría</label>
                        <input type="text" name="nombre_categoria" id="nombre_categoria"
                            class="w-full rounded-xl text-gray-500 border-gray-300"
                            value="{{ old('nombre_categoria', $categoria_diario->nombre) }}">
                        @error('nombre_categoria')
                            <small class="text-red-500">* {{ $message }}</small>
                        @enderror
                    </div>
                    <div class="m-3 grid grid-cols-2 gap-4">
                        <x-forms.button type="submit" text="Guardar cambios" />
                        <a href="{{ url()->previous() }}"
                            class="w-full text-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-color-primario hover:bg-color-primario-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-color-primario-700"
                            type="submit">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
