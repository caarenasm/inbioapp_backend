<div class="m-3 p-2 bg-gray-50 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Nueva enfermedad</h2>
    <div class="flex flex-col">
        <form action="{{ route('enfermedades.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="enfermedad" class="block font-bold text-gray-700">Enfermedad</label>
                <input type="text" name="enfermedad" id="enfermedad"
                    class="w-full rounded-xl text-gray-500 border-gray-300" value="">
                @error('enfermedad')
                    <small class="text-red-500">* {{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="descripcion" class="block font-bold text-gray-700">Descripción</label>
                <textarea name="descripcion" id="descripcion"
                    class="w-full rounded-xl text-gray-500 border-gray-300"></textarea>
                @error('descripcion')
                    <small class="text-red-500">* {{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <p class="block font-bold text-gray-700">Elijé el tipo de enfermedad</p>
                <select wire:model="selectedState" class="form-control rounded-xl border-gray-300" id="tipo_enfermedad_id"
                    name="tipo_enfermedad_id">
                    <option value="" selected>Escoge el tipo</option>
                    @foreach ($tipo_enfermedades as $category)
                        <option value="{{ $category->id }}">{{ $category->categoria_enfermedad }}</option>
                    @endforeach
                </select>
                @error('tipo_enfermedad_id')
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
@push('scripts')

    <script src="/js/ckeditor5.js"></script>

    <script>
        document.addEventListener('livewire:load', function() {
            // CK Editor
            ClassicEditor
                .create(document.querySelector('#descripcion'), {
                    toolbar: {
                        items: [
                            'heading',
                            '|',
                            'bold',
                            'italic',
                            'link',
                            'bulletedList',
                            'numberedList',
                            '|',
                            'imageUpload',
                            'blockQuote',
                            'insertTable',
                            'mediaEmbed',
                            'undo',
                            'redo'
                        ]
                    },
                    language: 'es',
                    image: {
                        toolbar: ['imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight',
                            '|',
                            'resizeImage',
                            '|',
                            'imageTextAlternative'
                        ],
                        styles: [
                            'alignLeft', 'alignCenter', 'alignRight'
                        ],
                    },
                    table: {
                        contentToolbar: [
                            'tableColumn',
                            'tableRow',
                            'mergeTableCells'
                        ]
                    },
                    simpleUpload: {
                        uploadUrl: '{{ asset('./imagenes/recetas/placeholder.png') }}',
                        headers: {

                        }
                    },
                })
                .then(editor => {
                    window.editor = editor;
                })
                .catch(error => {
                    console.error('Oops, something went wrong!');
                    console.error(
                        'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:'
                    );
                    console.warn('Build id: smh51lc3zo1f-qavakagvqr26');
                    console.error(error);
                });
            // CK Editor fin
        });
    </script>
@endpush
