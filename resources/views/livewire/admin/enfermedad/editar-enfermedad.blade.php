<x-app-layout>

    @section('title', 'Editar Enfermedad')

    <div class="p-2 bg-white">
        <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Editar enfermedad</h2>

        <div class="flex flex-col">

            <form action="">
                <!-- @csrf -->

                <div class="w-1/2 mb-3">
                    <label for="name" class="block font-bold text-gray-700">Nombre de la enfermedad</label>
                    <input type="text" name="name" id="name" class="w-full rounded-xl text-gray-500 border-gray-300" value="Asma">
                    <!-- @error('name') -->
                    <small class="text-red-500"></small>
                    <!-- @enderror -->
                </div>

                <div class="w-1/2 mb-3">
                    <label for="name" class="block font-bold text-gray-700">Descripción</label>
                    <textarea name="description" id="description" style="width:630px;height: 150px" class="w-full rounded-xl text-gray-500 border-gray-300">Enfermedad respiratoria que ataca los..... </textarea>
                    <!-- @error('name') -->
                    <small class="text-red-500"></small>
                    <!-- @enderror -->
                </div>


                <div class="w-1/2 mb-3">
                    <p class="block font-bold text-gray-700">Tipo de enfermedad</p>
                    <select wire:model="selectedState" class="form-control">
                        <option value="" selected>Respiratorias</option>
                        <option>Cardiovascular</option>
                        <option>Diabetes</option>
                        <option>Respiratorias</option>
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