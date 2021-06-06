<table class="min-w-full divide-y divide-gray-200 ">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Imagen
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Titulo
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Descripción
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Preparación
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Valores 
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Acciones
        </tr>
    </thead>
    <Tbody>
    <tbody class="bg-white divide-y divide-gray-200">
    @foreach($recetas as $receta)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="ml-1">
                        <div class="text-sm font-medium text-gray-900">
                            <img id="picture" src="{{ asset('./imagenes/recetas/' . old('imagen_url', $receta->imagen_url)) }}" alt="receta" style="width: 200px; height: 100;">
                        </div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="ml-1">
                        <div class="text-sm font-medium text-gray-900">
                            {{$receta->titulo}}
                        </div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="ml-1">
                        <div class="text-sm font-medium text-gray-900">
                                {{strip_tags($receta->descripcion)}}
                        </div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="ml-1">
                        <div class="text-sm font-medium text-gray-900">
                            <label for="">Caloria:</label> {{$receta->caloria}}
                        </div>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="ml-1">
                        <div class="text-sm font-medium text-gray-900">
                           <label for="">Grasa:</label> {{$receta->grasa}}
                        </div>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="ml-1">
                        <div class="text-sm font-medium text-gray-900">
                            <label for="">Proteina:</label> {{$receta->proteina}}
                        </div>
                    </div>
                </div>
                <td class="px-6 py-4 whitespace-nowrap">
                    @if ($receta->publicacion)
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        Publicada
                    </span>
                    @else
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                        No publicada
                    </span>
                    @endif

                </td>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <h2 class="text-2xl text-fondo-verde font-extrabold">
                        <x-html.link href="{{route('recetas.edit',$receta)}}" text="Editar" isButton="true" class="inline-block mb-2 ml-1" />
                    </h2>
                    <h2 class="text-2xl text-fondo-verde font-extrabold">
                        <x-html.link href="{{route('ingredientes.index',$receta->id)}}" text="Agregar alimentos" isButton="true" class="inline-block mb-2 ml-1" />
                    </h2>
                    <td class="px-2 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{route('recetas.delete', $receta->id)}}"
                           x-on:click="confirmDialog = confirmDialog !== true"
                           class="justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-color-peligro hover:bg-color-peligro-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-color-peligro-300 eliminar">Eliminar</a>
                    </td>
                </div>
            </td>
        </tr>
        @endforeach
    </Tbody>
</table>