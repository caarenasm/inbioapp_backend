<x-app-layout>
    <div class="p-2 bg-white">
        <h2 class="text-2xl py-2 text-fondo-verde font-extrabold text-center m-3">Enfermedad alimento</h2>
        <div class="m-3 w-1/3 p-2 bg-gray-50 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Modificar alimentos - enfermedad</h2>
            <div class="flex flex-col">
            <h2 class="text-lg py-2 font-extrabold">Edita el estado al alimentos para:
                @foreach ($enfermedades as $enfermedad_nombre)
                    {{ $enfermedad_nombre->enfermedad }}
            </h2>
            @endforeach
            <div class="flex flex-col">
                <form action="{{ route('enfermedades-alimentos.update', $enfermedad_alimento) }}" method="POST"
                    id="formulario">
                    @csrf
                    @method('put')
                    <div class="grid grid-cols-2 mt-6">
                        <div class="w-auto mb-3">
                            <p class="block font-bold text-gray-700">Alimento</p>
                            <select class="form-control rounded-xl border-gray-300" id="alimento_id" name="alimento_id" disabled>
                                <option value="" selected>Escoge el alimento</option>
                                @foreach ($alimentos_enfermedad as $alimento)
                                    <option value="{{ old('alimento_id') == $alimento->alimento_id }}" @if (old('alimento_id') == $alimento->alimento_id || $alimento->alimento_id == $enfermedad_alimento->alimento_id) selected @endif>{{ $alimento->nombre }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="alimento_id" value="{{ $alimento->alimento_id }}">
                            @error('alimento_id')
                                <small class="text-red-500">* {{ $message }}</small>
                            @enderror
                        </div>

                        <div class="w-auto mb-3">
                            <p class="block font-bold text-gray-700">Elijé el estado del alimento</p>
                            <select class="form-control rounded-xl border-gray-300" id="recomendacion" name="recomendacion">
                                <option value="" selected>Escoge el estado del alimento</option>
                                @foreach ($estados as $estado)
                                    <option value="{{ $estado->id }}" @if (old('recomendacion') == $estado->id || $estado->id == $enfermedad_alimento->recomendacion) selected @endif>{{ $estado->estado_semaforo }}</option>
                                @endforeach
                            </select>
                            @error('recomendacion')
                                <small class="text-red-500">* {{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-3">
                        @foreach ($enfermedades as $enfermedad_id)
                            <input type="hidden" value="{{ $enfermedad_id->id }}" name="enfermedad_id">
                        @endforeach
                        <x-forms.button type="submit" text="Guardar cambios" />
                        <a href="{{ url()->previous() }}"
                            class="text-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-color-primario hover:bg-color-primario-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-color-primario-700 text-center"
                            type="submit">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </x-app-layout>
