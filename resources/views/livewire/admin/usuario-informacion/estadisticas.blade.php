<x-app-layout>

    @section('title', 'Estadisticas')

        <div class="p-2 bg-white">
            <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Estadisticas del usuario</h2>
            <p class="block font-bold text-gray-700">Elijé la el tipo de lectura</p>
            <select wire:model="selectedState" class="form-control" id="tipo_lectura_id" name="tipo_lectura_id">
                <option value="" selected>Escoge el tipo</option>
                @foreach ($tipo_lectura as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                @endforeach
            </select>

            @switch($tipo->id)
                @case(1)
                    <div class="flex flex-col mb-6">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    @include('livewire/admin/usuario-informacion/listar-sueño-estadisticas')
                                </div>
                            </div>
                        </div>
                    </div>
                @break
                @case(2)
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    @include('livewire/admin/usuario-informacion/listar-peso-actual-estadisticas')
                                </div>
                            </div>
                        </div>
                    </div>
                @break
                @default

            @endswitch
            {{-- <div class="grid grid-cols-2 p-2 bg-white">


            </div> --}}
    </x-app-layout>
