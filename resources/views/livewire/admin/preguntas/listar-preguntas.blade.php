<table class="min-w-full divide-y divide-gray-200 ">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Pregunta
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Descripcion
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Icono
            </th>

            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Acciones
        </tr>
    </thead>
    <Tbody>
    <tbody class="bg-white divide-y divide-gray-200">
    @foreach($preguntas as $pregunta)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="ml-1">
                        <div class="text-sm font-medium text-gray-900">
                            {{$pregunta->pregunta}}
                        </div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="ml-1">
                        <div class="text-sm font-medium text-gray-900">
                            {{$pregunta->descripcion}}
                        </div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="ml-1">
                        <div class="text-sm font-medium text-gray-900">
                            {{$pregunta->icono}}
                        </div>
                    </div>
                </div>
            </td>
            <td class="px-4 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <h2 class="text-2xl text-fondo-verde font-extrabold" style="margin-right: 10px">
                        <x-html.link href="{{route('preguntas.edit',$pregunta)}}" text="Editar" isButton="true" class="inline-block mb-2 ml-1" />
                    </h2>
                    <h2 class="text-2xl text-fondo-verde font-extrabold" style="margin-right: 1em">
                        <x-html.link href="{{route('respuestas.index',$pregunta->id)}}" text="Agregar respuestas" isButton="true" class="inline-block mb-2 ml-1" />
                    </h2>
                    <h2 style="margin-bottom: 0.5em">
                        <a href="{{ route('preguntas.delete', $pregunta->id) }}"
                            x-on:click="confirmDialog = confirmDialog !== true"
                            class=" py-2.5 px-2.5 text-sm rounded-md text-white bg-color-peligro eliminar">Eliminar</a>
                    </h2>
                </div>
            </td>
        </tr>
        @endforeach
    </Tbody>
</table>
