<x-app-layout>
    <div class="p-2 bg-white">
        <h2 class="text-2xl py-2 text-fondo-verde font-extrabold text-center">Estados</h2>
        <div class="m-3 w-1/3 p-2 bg-gray-50 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Modificar estado</h2>
            <div class="flex flex-col">
                <form action="{{ route('semaforos-estados.update', $semaforo_estado) }}" method="POST">
                    @csrf
                    @method('put')
                        <div class="mb-3">
                            <label for="estado_semaforo" class="block font-bold text-gray-700">Estado para el
                                semaforo</label>
                            <input type="text" name="estado_semaforo" id="estado_semaforo"
                                class="w-full rounded-xl text-gray-500 border-gray-300"
                                value="{{ old('estado_semaforo', $semaforo_estado->estado_semaforo) }}">
                            @error('estado_semaforo')
                                <small class="text-red-500">* {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 grid grid-cols-2 gap-4">
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
