<table class="min-w-full divide-y divide-gray-200 ">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Categorias
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Acciones
            </th>
        </tr>
    </thead>
    <Tbody>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($categorias_alimentos as $category_food)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="ml-1">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $category_food->nombre_categoria }}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="grid grid-cols-2 gap-2">
                        <h2 class="text-2xl text-fondo-verde font-extrabold">
                            <x-html.link href="{{ route('categoria-alimentos.edit', $category_food) }}" text="Editar"
                                isButton="true" class="inline-block mb-2 ml-1" />
                        </h2>
                        <h2 style="margin-top: 0.5em">
                            <a href="{{ route('categoria-alimentos.delete', $category_food->id) }}"
                                x-on:click="confirmDialog = confirmDialog !== true"
                                class=" py-2.5 px-2.5 text-sm rounded-md text-white bg-color-peligro eliminar">Eliminar</a>
                        </h2>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
    </Tbody>
</table>
