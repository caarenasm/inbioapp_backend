<table id="deposiciones" class="display compact" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
    <thead>
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                data-priority="1">
                Estado
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                data-priority="2">
                Tipo de deposición
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                data-priority="2">
                Color
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                data-priority="2">
                Productos
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                data-priority="1">
                Otros
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                data-priority="1">
                Medicamentos
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lecturas as $lectura)
            @if ($lectura->tipo_lectura_id === 8)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="ml-1">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $lectura->estado }}
                                </div>
                            </div>
                        </div>
                    </td>
                    @foreach ($lectura->tipo_deposicion as $item)
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
                    @foreach ($lectura->color as $item)
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
                                @foreach ((array) $lectura->productos as $key => $item)
                                    @foreach ($item as $i)
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $i->title }}
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="ml-1">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $lectura->otros }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="ml-1">
                                @foreach ((array) $lectura->medicamentos as $key => $item)
                                    @foreach ($item as $i)
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $i->medicamento }}
                                        </div>
                                    @endforeach
                                @endforeach
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

            var table = $('#deposiciones').DataTable({
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
