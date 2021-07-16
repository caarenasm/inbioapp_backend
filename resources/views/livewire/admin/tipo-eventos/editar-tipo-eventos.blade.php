<x-app-layout>
    @section('title', 'Editar tipo de evento')
        <div class="p-2 bg-white">
            <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Editar tipo de evento</h2>
            <div class="flex flex-col">
                <form action="{{ route('tipo-eventos.update',$tipo_evento) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="w-1/2 mb-3">
                        <label for="tipo_evento" class="block font-bold text-gray-700">Tipo de evento</label>
                        <input type="text" name="tipo_evento" id="tipo_evento"
                            class="w-full rounded-xl text-gray-500 border-gray-300" value="{{old('tipo_evento',$tipo_evento->tipo_evento)}}">
                        @error('tipo_evento')
                            <small class="text-red-500">* {{ $message }}</small>
                        @enderror
                    </div>
                    <div class="w-1/2 mb-3 grid grid-cols-2 gap-4">
                        <x-forms.button type="submit" text="Guardar cambios" />
                        <a href="{{ url()->previous() }}"
                            class="w-full justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-color-primario hover:bg-color-primario-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-color-primario-700"
                            type="submit">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>
