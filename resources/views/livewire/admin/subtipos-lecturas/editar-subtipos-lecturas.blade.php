<x-app-layout>

    @section('title', 'Editar subtipo de lectura')

    <div class="p-2 bg-white">
        <h2 class="text-2xl py-2 text-fondo-verde font-extrabold text-center m-3">Subtipo de lectura</h2>
        <div class="m-3 w-1/3 p-2 bg-gray-50 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Modificar subtipo de lectura</h2>
            <div class="flex flex-col">
                <form action="{{ route('subtipos-lecturas.update', $subtipo_lectura) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="m-3">
                        <label for="descripcion" class="block font-bold text-gray-700">Descripcion del subtipo</label>
                        <input type="text" name="descripcion" id="descripcion"
                            class="w-full rounded-xl text-gray-500 border-gray-300"
                            value="{{ old('descripcion', $subtipo_lectura->descripcion) }}">
                        @error('descripcion')
                            <small class="text-red-500"></small>
                        @enderror
                    </div>

                    <div class="">
                        <div class="m-3">
                            <p class="block font-bold text-gray-700">Elijé el tipo de lectura</p>
                            <select wire:model="selectedState" class="form-control rounded-xl border-gray-300"
                                id="tipo_lectura_id" name="tipo_lectura_id" required>
                                <option value="" selected>Escoge el tipo</option>
                                @foreach ($tipos_lecturas as $tipo)
                                    <option value="{{ $tipo->id }}" @if (old('tipo_lectura_id') == $tipo->id || $tipo->id == $subtipo_lectura->tipo_lectura_id) selected @endif>
                                        {{ $tipo->nombre }}</option>
                                @endforeach
                            </select>
                            <small class="text-red-500"></small>
                        </div>

                        <div class="m-3">
                            <p class="block font-bold text-gray-700">Elijé el icono del subtipo</p>
                            <select wire:model="selectedState" class="form-control rounded-xl border-gray-300"
                                id="icono" name="icono">
                                <option value="" selected>Escoge el icono</option>
                                @foreach ($iconos as $icono)
                                    <option value="{{ $icono->nombre_icono }}" @if (old('icono') === $subtipo_lectura->icono || $subtipo_lectura->icono === $icono->nombre_icono) selected @endif>
                                        {{ $icono->nombre_icono }}</option>
                                @endforeach
                            </select>
                            <small class="text-red-500"></small>
                        </div>
                    </div>


                    <div class="m-3 grid grid-cols-2 gap-4">
                        <x-forms.button type="submit" text="Guardar cambios" />
                        <a href="{{ url()->previous() }}"
                            class="w-full text-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-color-primario hover:bg-color-primario-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-color-primario-700"
                            type="submit">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
