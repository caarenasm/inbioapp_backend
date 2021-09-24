<table class="min-w-full divide-y divide-gray-200 ">
    <thead class="bg-gray-50">
        <tr>
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
        @foreach ($semaforos_estados as $estado)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="ml-1">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $estado->estado_semaforo }}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-4 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <h2 class="text-2xl text-fondo-verde font-extrabold" style="margin-right: 10px">
                            <x-html.link href="{{ route('semaforos-estados.edit', $estado) }}" text="Editar"
                                isButton="true" class="inline-block" />
                        </h2>
                        <h2>
                            <a href="{{ route('semaforos-estados.delete', $estado->id) }}"
                                x-on:click="confirmDialog = confirmDialog !== true"
                                class=" py-2.5 px-2.5 text-sm rounded-md text-white bg-color-peligro eliminar">Eliminar</a>
                        </h2>
                    </div>
                </td>
            </tr>
        @endforeach
    </Tbody>
</table>
