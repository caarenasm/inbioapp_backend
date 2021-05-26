<x-app-layout>
    @section('title', 'Editar ingrediente')
        <form action="{{ route('ingredientes.update', $ingrediente) }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3 bg-white shadow-xl rounded p-5 w-1/2">
                <div class="grid grid-cols-2 space-x-2">
                    
                    <input type="hidden" value="{{old('receta_id',$ingrediente->receta_id)}}" name="receta_id" >

                    <div>
                        <p class="block font-bold text-gray-700">Alimento</p>
                        <select wire:model="selectedState" class="form-control" name="alimento_id">
                            <option selected>Escoge el alimento</option>
                            @foreach ($alimentos as $food)
                                <option value="{{ $food->id }}" @if (old('alimento_id') == $food->id || $food->id == $ingrediente->alimento_id) selected @endif>{{ $food->nombre }}</option>
                            @endforeach
                        </select>
                        <small class="text-red-500"></small>
                    </div>
                    <div class="mb-3" style="margin-left: 0.5%">
                        <label for="porcion" class="block font-bold text-gray-700">Porcion</label>
                        <input type="text" name="porcion" id="porcion"
                            class="w-full rounded-xl text-gray-500 border-gray-300"
                            value="{{ old('porcion', $ingrediente->porcion) }}">
                    </div>
                </div>
                <div class="flex space-x-2">
                    <div class=" mb-3 grid grid-cols-2 gap-8">
                        <x-forms.button type="submit" text="Guardar cambios" />
                        <a href="{{ url()->previous() }}"
                            class="w-full text-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-color-primario hover:bg-color-primario-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-color-primario-700"
                            type="submit">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
        </form>
</x-app-layout>
