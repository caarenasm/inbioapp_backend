<form action="{{ route('enfermedades-alimentos.store') }}" method="POST">
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
            @for ($i = 0; $i <count($alimentos); $i++)
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
</form>

