<form action="{{ route('respuestas.store') }}" method="post">
    @csrf
    <div class="mb-3 bg-white shadow-xl rounded p-5">
        <input type="hidden" value="{{$preguntas->id}}" name="pregunta_id" >
            <div>
                <label for="descripcion" class="block font-bold text-gray-700">Respuesta</label>
                <textarea name="respuesta" id="respuesta"
                    class="w-full rounded-xl text-gray-500 border-gray-300 mb-4"></textarea>
            </div>
            <div>
                <label for="descripcion" class="block font-bold text-gray-700">Ayuda</label>
                <textarea name="ayuda" id="ayuda"
                    class="w-full rounded-xl text-gray-500 border-gray-300 mb-4"></textarea>
            </div>

        <div class="flex space-x-2">
            <div class=" mb-3 grid grid-cols-2 gap-8">
                <x-forms.button type="submit" text="Guardar cambios" />
                <a href="{{ url()->previous() }}"
                    class="w-full text-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-color-primario hover:bg-color-primario-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-color-primario-700"
                    type="submit">
                    Cancel
                </a>
            </div>
        </div>
    </div>
</form>