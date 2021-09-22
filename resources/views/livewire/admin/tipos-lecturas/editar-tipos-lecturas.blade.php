<x-app-layout>

    @section('title', 'Editar tipo de lectura')

    <div class="p-2 bg-white">
        <h2 class="text-2xl py-2 text-fondo-verde font-extrabold text-center m-3">Tipo de lectura</h2>
        <div class="m-3 w-1/3 p-2 bg-gray-50 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Modificar tipo de lectura</h2>
            <div class="flex flex-col">
                <form action="{{ route('tipos-lecturas.update', $tipo_lectura) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="nombre" class="block font-bold text-gray-700">Nombre del tipo</label>
                        <input type="text" name="nombre" id="nombre"
                            class="w-full rounded-xl text-gray-500 border-gray-300"
                            value="{{ old('nombre', $tipo_lectura->nombre) }}">
                        @error('nombre')
                            <small class="text-red-500"></small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <p class="block font-bold text-gray-700">Elijé la categoria del alimento</p>
                        <select wire:model="selectedState" class="form-control rounded-xl border-gray-300" id="categoria_diario_id"
                            name="categoria_diario_id" required>
                            <option value="" selected>Escoge la categoria</option>
                            @foreach ($categorias_diarios as $categoria)
                                <option value="{{ $categoria->id }}" @if (old('categoria_diario_id') == $categoria->id || $categoria->id == $tipo_lectura->categoria_diario_id) selected @endif>
                                    {{ $categoria->nombre_categoria }}</option>
                            @endforeach
                        </select>
                        <small class="text-red-500"></small>
                    </div>

                    <div class="mb-3 grid grid-cols-2 gap-4">
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
