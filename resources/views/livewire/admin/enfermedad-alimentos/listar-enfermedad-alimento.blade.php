<table class="min-w-full divide-y divide-gray-200 ">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Alimento
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Estado
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Acciones
            </th>
        </tr>
    </thead>
    <Tbody>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($alimentos_enfermedad as $alimento_enfermedad)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="ml-1">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $alimento_enfermedad->nombre }}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="ml-1">
                            <div class="text-sm font-medium text-gray-900">
                                @if ($alimento_enfermedad->recomendacion === 1)
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Recomendado
                                    </span>
                                @else
                                    @if ($alimento_enfermedad->recomendacion === 2)
                                        <span
                                            style="background-color: #FBF9AC; color: #ECA04A; border-radius: 2em; font-size: .9em; padding: 3px">
                                            No recomendado
                                        </span>
                                    @else
                                        <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Prohibido
                                        </span>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-4 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <h2 class="text-2xl text-fondo-verde font-extrabold" style="margin-right: 10px">
                            <x-html.link href="{{ route('enfermedades-alimentos.edit', $alimento_enfermedad) }}" text="Editar" isButton="true"
                                class="inline-block" />
                        </h2>
                        <h2>
                            <a href="{{ route('enfermedades-alimentos.delete', $alimento_enfermedad->id) }}"
                                x-on:click="confirmDialog = confirmDialog !== true"
                                class=" py-2.5 px-2.5 text-sm rounded-md text-white bg-color-peligro eliminar">Eliminar</a>
                        </h2>
                    </div>
                </td>
            </tr>
        @endforeach
    </Tbody>
</table>
