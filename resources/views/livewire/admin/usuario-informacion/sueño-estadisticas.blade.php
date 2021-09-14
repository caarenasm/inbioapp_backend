<table id="sueño" class="display compact" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
    <thead>
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                data-priority="1">
                Lectura
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                data-priority="2">
                Hora Inicio
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                data-priority="3">
                Hora Fin
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                data-priority="4">
                Total horas
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lecturas as $lectura)
            @if ($lectura->tipo_lectura_id === 1)
                <tr>
                    @foreach ($lectura->calidad_sueño as $item)
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-1">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $item->tipo }}
                                    </div>
                                </div>
                            </div>
                        </td>
                    @endforeach
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="ml-1">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $lectura->hora_inicio }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="ml-1">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $lectura->hora_fin }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="ml-1">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $lectura->total_horas }}
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endif
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

            var table = $('#sueño').DataTable({
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
