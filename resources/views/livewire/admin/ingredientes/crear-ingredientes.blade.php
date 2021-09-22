    <div class="m-3 w-1/3 p-6 bg-gray-50 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Nuevo ingrediente</h2>
        <div class="flex flex-col">
            <form action="{{ route('ingredientes.store') }}" method="post">
                @csrf
                <input type="hidden" value="{{ $recetas->id }}" name="receta_id">

                <div class="mb-3">
                    <p class="block font-bold text-gray-700">Alimento</p>
                    <select wire:model="selectedState"
                        class="form-control w-full rounded-xl text-gray-500 border-gray-300" name="alimento_id"
                        id="alimento_id">
                        <option selected>Escoge el alimento</option>
                        @foreach ($alimentos as $alimento)
                            <option value="{{ $alimento->id }}">{{ $alimento->nombre }}</option>
                        @endforeach
                    </select>
                    <small class="text-red-500"></small>
                    @error('alimento_id')
                        <small class="text-red-500">* {{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3" style="margin-left: 0.5%">
                    <label for="porcion" class=" block font-bold text-gray-700">Porcion</label>
                    <input type="text" name="porcion" id="porcion"
                        class="w-full rounded-xl text-gray-500 border-gray-300" value="">
                    @error('porcion')
                        <small class="text-red-500">* {{ $message }}</small>
                    @enderror
                </div>

                <div class="flex space-x-2">
                    <div class=" mb-3 grid grid-cols-2 gap-8">
                        <x-forms.button type="submit" text="Crear ingrediente" />
                        <a href="{{ url()->previous() }}"
                            class="text-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-color-primario hover:bg-color-primario-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-color-primario-700"
                            type="submit">
                            Cancelar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
