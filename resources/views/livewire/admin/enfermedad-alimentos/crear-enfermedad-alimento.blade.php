@section('title', 'Crear Alimento Enfermedad')
<div class="m-3 p-2 bg-gray-50 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Nuevo tipo de enfermedad</h2>
    <div class="flex flex-col">
        <h2 class="text-lg py-2  font-extrabold">Añade el estado a los alimentos para:
            {{ $enfermedades->enfermedad }}</h2>
        <div class="flex flex-col">
            <form action="{{ route('enfermedades-alimentos.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-2 mt-6">
                    <div class="w-auto mb-3">
                        <p class="block font-bold text-gray-700">Elijé el alimento</p>
                        <select class="form-control rounded-xl border-gray-300" id="alimento_id" name="alimento_id">
                            <option value="" selected>Escoge el alimento</option>
                            @foreach ($alimentos as $alimento)
                                <option value="{{ $alimento->id }}">{{ $alimento->nombre }}</option>
                            @endforeach
                        </select>
                        @error('alimento_id')
                            <small class="text-red-500">* {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="w-auto mb-3">
                        <p class="block font-bold text-gray-700">Elijé el estado del alimento</p>
                        <select class="form-control rounded-xl border-gray-300" id="recomendacion" name="recomendacion">
                            <option value="" selected>Escoge el estado del alimento</option>
                            @foreach ($estados as $estado)
                                <option value="{{ $estado->id }}">{{ $estado->estado_semaforo }}</option>
                            @endforeach
                        </select>
                        @error('recomendacion')
                            <small class="text-red-500">* {{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 mt-3">
                    <input type="hidden" value="{{ $enfermedades->id }}" name="enfermedad_id">
                    <x-forms.button type="submit" text="Añadir alimento" />
                    <a href="{{ url()->previous() }}"
                        class="w-full text-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-color-primario hover:bg-color-primario-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-color-primario-700 text-center"
                        type="submit">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
