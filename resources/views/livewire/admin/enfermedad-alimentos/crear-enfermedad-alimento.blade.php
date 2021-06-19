{{-- <form action="{{ route('enfermedades-alimentos.store') }}" method="POST">
    @csrf
    <table class="min-w-full divide-y divide-gray-200" id="table">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Alimento
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Recomendado
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    No recomendado
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Prohibido
                </th>
            </tr>
        </thead>
        <Tbody>
        <tbody class="bg-white divide-y divide-gray-200">
            @for ($i = 0; $i < count($alimentos); $i++)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex justify-items-center">
                                <div class="ml-1">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $alimentos[$i]->nombre }}
                                        <input type="hidden" name="alimento_id[{{$i}}]" value={{ $alimentos[$i]->id }}>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex justify-items-center">
                                <div class="ml-1">
                                    <div class="text-sm font-medium text-gray-900">
                                        <input type="radio" class="form-checkbox" value="1" name="recomendacion[{{$i}}]"
                                            id="radio">
                                    </div>
                                </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex justify-items-center">
                                <div class="ml-1">
                                    <div class="text-sm font-medium text-gray-900">
                                        <input type="radio" class="form-checkbox" value="2" name="recomendacion[{{$i}}]"
                                            id="radio">
                                    </div>
                                </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex justify-items-center">
                                <div class="ml-1">
                                    <div class="text-sm font-medium text-gray-900">
                                        <input type="radio" class="form-checkbox" value="3" name="recomendacion[{{$i}}]"
                                            id="checkbox3">
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <input type="hidden" value="{{ $enfermedades->id }}" name="enfermedad_id[{{$i}}]" id="input">
            @endfor
        </Tbody>
    </table>
    <x-forms.button type="submit" text="Agregar"/>
</form> --}}

@section('title', 'Crear Alimento Enfermedad')
    <div class="p-5 bg-white w-auto">
        <h2 class="text-lg py-2 text-fondo-verde font-extrabold">Añade el estado a los alimentos para:
            {{ $enfermedades->enfermedad }}</h2>
        <div class="flex flex-col">
            <form action="{{ route('enfermedades-alimentos.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-2 mt-6">
                    <div class="w-auto mb-3">
                        <p class="block font-bold text-gray-700">Elijé el alimento</p>
                        <select class="form-control" id="alimento_id" name="alimento_id">
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
                        <select class="form-control" id="recomendacion" name="recomendacion">
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
                <div class="w-auto m-6 grid grid-cols-2 gap-4 mt-6">
                    <input type="hidden" value="{{ $enfermedades->id }}" name="enfermedad_id">
                    <x-forms.button type="submit" text="Guardar cambios" />
                    <a href="{{ url()->previous() }}"
                        class="w-full justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-color-primario hover:bg-color-primario-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-color-primario-700 text-center"
                        type="submit">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
