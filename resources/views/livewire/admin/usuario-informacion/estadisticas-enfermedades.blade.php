<x-app-layout>
    <div class="p-2 bg-white">
        <h2 class="text-2xl py-2 text-fondo-verde font-extrabold text-center">Enfermedades y Señales subjetivas</h2>
        <div class="flex justify-center items-center h-screen">
            <!--actual component start-->
            <div x-data="setup()">
                <ul class="flex justify-center items-center my-4">
                    <template x-for="(tab, index) in tabs" :key="index">
                        <li class="cursor-pointer py-2 px-4 text-gray-500 border-b-8"
                            :class="activeTab===index ? 'text-green-500 border-green-500' : ''"
                            @click="activeTab = index" x-text="tab"></li>
                    </template>
                </ul>

                <div class="w-auto bg-white p-16 text-center mx-auto border p-8">
                    <div x-show="activeTab===0">
                        @include('livewire/admin/usuario-informacion/glucosa-estadisticas')
                    </div>
                    <div x-show="activeTab===1">
                        @include('livewire/admin/usuario-informacion/presion-estadisticas')
                    </div>
                    <div x-show="activeTab===2">
                        @include('livewire/admin/usuario-informacion/oxigeno-estadisticas')
                    </div>
                    <div x-show="activeTab===3">
                        @include('livewire/admin/usuario-informacion/vision-estadisticas')
                    </div>
                    <div x-show="activeTab===4">
                        @include('livewire/admin/usuario-informacion/gastricas-estadisticas')
                    </div>
                    <div x-show="activeTab===5">
                        @include('livewire/admin/usuario-informacion/dolencias-estadisticas')
                    </div>
                    <div x-show="activeTab===6">
                        @include('livewire/admin/usuario-informacion/señales-estadisticas')
                    </div>
                    <div x-show="activeTab===7">
                        @include('livewire/admin/usuario-informacion/alergias-estadisticas')
                    </div>
                </div>

                <ul class="flex justify-center items-center my-4">
                    <template x-for="(tab, index) in tabs" :key="index">
                        <li class="cursor-pointer py-3 px-4 rounded transition"
                            :class="activeTab===index ? 'text-green-500 border-green-500' : ' text-gray-500'"
                            @click="activeTab = index" x-text="tab"></li>
                    </template>
                </ul>

                <div class="flex gap-4 justify-center border-t p-4">
                    <button
                        class="m-3 py-2 px-4 border rounded-md border-green-600 text-green-600 cursor-pointer uppercase text-sm font-bold hover:bg-green-700 hover:text-white hover:shadow"
                        @click="activeTab--" x-show="activeTab>0">Back</button>
                    <button
                        class="m-3 py-2 px-4 border rounded-md border-green-600 text-green-600 cursor-pointer uppercase text-sm font-bold hover:bg-green-700 hover:text-white hover:shadow"
                        @click="activeTab++" x-show="activeTab<tabs.length-1">Next</button>
                </div>
            </div>
            <!--actual component end-->
        </div>
        @push('scripts')
            <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
            <script>
                function setup() {
                    return {
                        activeTab: 0,
                        tabs: [
                            "Glucosa",
                            "Presión",
                            "Oxigeno",
                            "Visión",
                            "Enfermedades gastricas",
                            "Dolencias en el cuerpo",
                            "Señales en el organismo",
                            "Alergias"
                        ]
                    };
                };
            </script>

            <!--
            # Changelog:

            ## [1.1] - 2021-05-01
            ### Added
             - Back/Next buttons

            ## [1.0] - 2021-05-01
            ### Added
             - Nav bar with two styles
             - Set tabs title dynamically and render on page
            -->
        @endpush
    </div>
    </div>
</x-app-layout>
