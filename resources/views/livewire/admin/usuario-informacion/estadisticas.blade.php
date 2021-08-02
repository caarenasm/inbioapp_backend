<x-app-layout>

    @section('title', 'Tipo de eventos')

        <div class="p-2 bg-white">
            <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Tipo de eventos</h2>
            <div class="grid grid-cols-2 p-2 bg-white">
                <div class="flex flex-col mb-6">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                @include('livewire/admin/usuario-informacion/listar-sueño-estadisticas')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                {{-- @include('livewire/admin/usuario-informacion/listar-usuarios-informacion') --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </x-app-layout>
