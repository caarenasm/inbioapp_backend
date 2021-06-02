<x-app-layout>

    @section('title', 'Crear Alimento')

        <div class="p-2 bg-white">
            <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Crear nuevo alimento</h2>
            <div class="flex flex-col">
                <form action="{{ route('alimentos.store') }}" method="POST">
                    @csrf

                    <div class="w-1/2 mb-3">
                        <label for="nombre" class="block font-bold text-gray-700">Nombre del alimento</label>
                        <input type="text" name="nombre" id="nombre" class="w-full rounded-xl text-gray-500 border-gray-300"
                            value="">
                        @error('nombre')
                            <small class="text-red-500"></small>
                        @enderror
                    </div>

                    <div class="w-1/2 mb-3">
                        <p class="block font-bold text-gray-700">Elijé la categoria del alimento</p>
                        <select wire:model="selectedState" class="form-control" id="categoria_alimento_id" name="categoria_alimento_id">
                            <option value="" selected>Escoge la categoria</option>
                            @foreach ($category_food as $category)
                                <option value="{{$category->id}}">{{ $category->nombre_categoria }}</option>
                            @endforeach
                        </select>
                        <small class="text-red-500"></small>
                    </div>
                    <div class="w-1/2 mb-3 grid grid-cols-2 gap-4">
                        <x-forms.button type="submit" text="Guardar cambios" />
                        <a href="{{ url()->previous()}}"
                            class="w-full justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-color-primario hover:bg-color-primario-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-color-primario-700"
                            type="submit">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </x-app-layout>
