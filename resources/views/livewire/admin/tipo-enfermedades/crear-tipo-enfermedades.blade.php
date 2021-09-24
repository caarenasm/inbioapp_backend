<form action="{{ route('tipos-enfermedades.store') }}" method="post">
    @csrf
    <div class="mb-3 bg-white rounded p-5">
        <div class="mb-3" style="margin-left: 0.5%">
            <label for="categoria_enfermedad" class=" block font-bold text-gray-700">Tipo enfermedad</label>
            <input type="text" name="categoria_enfermedad" id="categoria_enfermedad"
                class="w-full rounded-xl text-gray-500 border-gray-300" value="">
            @error('categoria_enfermedad')
                <small class="text-red-500">* {{ $message }}</small>
            @enderror
        </div>
        <div class="w-full mb-3">
            <label for="descripcion" class="block font-bold text-gray-700">Descripción</label>
            <textarea name="descripcion" id="descripcion"
                class="w-full rounded-xl text-gray-500 border-gray-300"></textarea>
            @error('descripcion')
                <small class="text-red-500">* {{ $message }}</small>
            @enderror
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
