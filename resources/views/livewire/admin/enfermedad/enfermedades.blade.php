<x-app-layout>

    @section('title', 'Enfermedades')

    <div class="p-2 bg-white">
        <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Enfermedades</h2>
        <div class="p-2 bg-white">
            <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">
                <x-html.link href="{{route('crear-enfermedad')}}" text="Crear Enfermedad" isButton="true" class="inline-block mb-2 ml-4" />
            </h2>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 ">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Enfermedad
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Descripcion
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Categoria
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Acciones
                                        </th>
                                        <!-- <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Editar</span>
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Eliminar</span>
                                    </th> -->
                                    </tr>
                                </thead>
                                <Tbody>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="ml-1">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        Fiebre
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="ml-1">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        Presenta altas temperaturas mayores a 38°
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="ml-1">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        Coronavirus
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <h2 class="text-2xl text-fondo-verde font-extrabold">
                                                    <x-html.link href="{{route('editar-enfermedad')}}" text="Editar" isButton="true" class="inline-block mb-2 ml-1" />
                                                </h2>
                                                <h2 class="text-2xl text-fondo-verde font-extrabold">
                                                    <x-html.link href="{{route('editar-enfermedad')}}" text="Eliminar" isButton="true" class="inline-block mb-2 ml-1" />
                                                </h2>
                                            </div>

                                        </td>
                                    </tr>
                                </Tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>