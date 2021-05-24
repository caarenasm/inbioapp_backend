<table class="min-w-full divide-y divide-gray-200 ">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Alimento
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Porcion
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Acciones
            </th>
        </tr>
    </thead>
    <Tbody>
    <tbody class="bg-white divide-y divide-gray-200">
    @foreach($ingredientes as $ingrediente)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="ml-1">
                        <div class="text-sm font-medium text-gray-900">
                            {{$ingrediente->nombre}}
                        </div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="ml-1">
                        <div class="text-sm font-medium text-gray-900">
                            {{$ingrediente->porcion}}
                        </div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <h2 class="text-2xl text-fondo-verde font-extrabold">
                        <x-html.link href="{{route('ingredientes.edit',$ingrediente)}}" text="Editar" isButton="true" class="inline-block mb-2 ml-1" />
                    </h2>
                    <td class="px-2 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{route('ingredientes.delete', $ingrediente->id)}}"
                           x-on:click="confirmDialog = confirmDialog !== true"
                           class="justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-color-peligro hover:bg-color-peligro-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-color-peligro-300 eliminar">Eliminar</a>
                    </td>
                </div>
            </td>
        </tr>
        @endforeach
    </Tbody>
</table>