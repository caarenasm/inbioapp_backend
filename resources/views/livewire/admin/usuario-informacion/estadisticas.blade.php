<x-app-layout>

    @section('title', 'informacion')

    <div class="p-2 bg-white">
        <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Informacion de los usuarios</h2>
        <div class="flex flex-grow">
            <div class="p-2 bg-white">
                <div class="flex flex-col mb-6">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        @include('livewire/admin/usuario-informacion/listar-lecturas-estadisticas')
                    </div>
                </div>
            </div>
            <div class="items-center">
                <div>
                    <a href="{{ url()->previous() }}"
                        class="w-50 justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-color-primario hover:bg-color-primario-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-color-primario-700"
                        type="submit">
                        Enfermedades y señales subj.
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
