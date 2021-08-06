<x-app-layout>

    @section('title', 'informacion')

        <div class="p-2 bg-white">
            <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Informacion de los usuarios</h2>
            <div class="p-2 bg-white">
                <div class="flex flex-col mb-6">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        @include('livewire/admin/usuario-informacion/listar-lecturas-estadisticas')
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
