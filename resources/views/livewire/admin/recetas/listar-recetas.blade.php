<table id="receta" class="display compact" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
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
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($recetas as $receta)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="ml-1">
                            <div class="text-sm font-medium text-gray-900">
                                <img id="picture"
                                    src="{{ asset('./imagenes/recetas/' . old('imagen_url', $receta->imagen_url)) }}"
                                    alt="receta" style="width: 200px; height: 100;">
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="ml-1">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $receta->titulo }}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="ml-1">
                            <div class="text-sm font-medium text-gray-900">
                                {{ strip_tags($receta->descripcion) }}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="ml-1">
                            <div class="text-sm font-medium text-gray-900">
                                <label for="">Caloria:</label> {{ $receta->caloria }}
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="ml-1">
                            <div class="text-sm font-medium text-gray-900">
                                <label for="">Grasa:</label> {{ $receta->grasa }}
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="ml-1">
                            <div class="text-sm font-medium text-gray-900">
                                <label for="">Proteina:</label> {{ $receta->proteina }}
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
                            <x-html.link href="{{ route('recetas.edit', $receta) }}" text="Editar" isButton="true"
                                class="inline-block mb-2 ml-1" />
                        </h2>
                        <h2 class="text-2xl text-fondo-verde font-extrabold" style="margin-right: 10px">
                            <x-html.link href="{{ route('ingredientes.index', $receta->id) }}"
                                text="Agregar alimentos" isButton="true" class="inline-block mb-2 ml-1" />
                        </h2>
                        <h2 class="mb-2">
                            <a href="{{ route('recetas.delete', $receta->id) }}"
                                x-on:click="confirmDialog = confirmDialog !== true"
                                class="py-2.5 px-2.5 text-sm rounded-md text-white bg-color-peligro eliminar">Eliminar</a>

                        </h2>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@push('scripts')
    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!--Datatables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {

            var table = $('#receta').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true,
                    "lengthMenu": [
                        [5, 10, 25, 50, -1],
                        [5, 10, 25, 50, "Mostrar Todo"]
                    ],
                    responsive: true,
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                    }
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
@endpush
