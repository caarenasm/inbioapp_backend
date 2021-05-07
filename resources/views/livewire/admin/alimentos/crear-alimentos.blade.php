<x-app-layout>

    @section('title', 'Crear Alimento')

    <div class="p-2 bg-white">
        <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Crear nuevo alimento</h2>
        <div class="flex flex-col">
            <form action="">
                <!-- @csrf -->

                <div class="w-1/2 mb-3">
                    <label for="name" class="block font-bold text-gray-700">Nombre del alimento</label>
                    <input type="text" name="name" id="name" class="w-full rounded-xl text-gray-500 border-gray-300" value="">
                    <!-- @error('name') -->
                    <small class="text-red-500"></small>
                    <!-- @enderror -->
                </div>

                <div class="w-1/2 mb-3">
                    <p class="block font-bold text-gray-700">Tipo de enfermedad</p>
                    <select wire:model="selectedState" class="form-control">
                        <option value="" selected>Escoge la categoria</option>
                        <option>Harinas</option>
                        <option>Bebidas endulzadas</option>
                        <option>Comidas rapidas</option>
                    </select>
                    <small class="text-red-500"></small>

                </div>

                <div class="w-1/2 mb-3">
                    <x-forms.button type="submit" text="Guardar cambios" />
                </div>
            </form>
        </div>
    </div>
</x-app-layout>