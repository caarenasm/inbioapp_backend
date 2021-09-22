<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
    <table id="usuarios_app" class="display compact" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
        <thead>
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    data-priority="1">
                    Nombre completo
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    data-priority="2">
                    Fecha de nacimiento
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    data-priority="3">
                    Fecha de creación del usuario
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    data-priority="4">
                    Plan actual
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    data-priority="5">
                    Fecha de inscripcion
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    data-priority="6">
                    Fecha finalización del plan
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    data-priority="">
                    Días restantes
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users_datos as $dato)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="ml-1">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $dato->nombre }} {{ $dato->apellido }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="ml-1">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $dato->fecha_nacimiento }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="ml-1">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $dato->fecha_creacion_usuario }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="ml-1">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $dato->titulo }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="ml-1">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $dato->fecha_inscripcion }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="ml-1">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $dato->fecha_terminacion }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="ml-1">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $dato->dias_restantes }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="grid grid-cols-2 gap-2">
                            <h2 class="text-2xl text-fondo-verde font-extrabold">
                                <x-html.link href="{{ route('estadisticas',$dato->users_id) }}" text="Estadisticas"
                                    isButton="true" class="inline-block mb-2 ml-1" />
                            </h2>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>


@push('scripts')
    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!--Datatables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {

            var table = $('#usuarios_app').DataTable({
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
