<x-app-layout>

    @section('title', 'Crear categoria de alimentos')

    <div class="p-2 bg-white">
        <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Crear nueva categoria</h2>

        <div class="flex flex-col">

            <form action="">
                <!-- @csrf -->

                <div class="w-1/2 mb-3">
                    <label for="name" class="block font-bold text-gray-700">Nombre de la categoria</label>
                    <input type="text" name="name" id="name" class="w-full rounded-xl text-gray-500 border-gray-300" value="">
                    <!-- @error('name') -->
                    <small class="text-red-500"></small>
                    <!-- @enderror -->
                </div>

                <div class="w-1/2 mb-3">
                    <x-forms.button type="submit" text="Guardar cambios" />
                </div>
            </form>
        </div>
    </div>
</x-app-layout>