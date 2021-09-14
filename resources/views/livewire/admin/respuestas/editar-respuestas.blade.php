<x-app-layout>
    @section('title', 'Editar respuesta')
    <div class="p-2 bg-white pt-6 m-2">
        <h2 class="text-2xl text-fondo-verde font-extrabold text-center">Respuestas</h2>
        <div class="m-3 p-2 bg-gray-50 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Modificar respuesta</h2>
            <div class="flex flex-col">
                <form action="{{ route('respuestas.update', $respuesta) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="grid grid-cols-2">
                    
                            <input type="hidden" value="{{ old('pregunta_id', $respuesta->pregunta_id) }}" name="pregunta_id">

                            <div class="m-3">
                                <label for="respuesta" class="block font-bold text-gray-700">Respuesta</label>
                                <textarea name="respuesta" id="respuesta" class="w-full rounded-xl text-gray-500 border-gray-300">{{ old('ayuda', $respuesta->respuesta) }}</textarea>
                                @error('respuesta')
                                <small class="text-red-500">* {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="m-3">
                                <label for="ayuda" class="block font-bold text-gray-700">Ayuda</label>
                                <textarea name="ayuda" id="ayuda" class="w-full rounded-xl text-gray-500 border-gray-300">{{ old('ayuda', $respuesta->ayuda) }}</textarea>
                                @error('ayuda')
                                <small class="text-red-500">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="flex-grow m-3">
                            <label class="inline-flex items-center mt-3">
                                <input type="checkbox" name="otro" value="1" class="form-checkbox h-5 w-5 text-gray-600" {{ old('otro', $respuesta->otro) == '1' ? 'checked' : '' }}>
                                <span class="ml-2 text-gray-700">Tipo de respuesta: Otro</span>
                            </label>
                            @error('otro')
                            <small class="text-red-500">* {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="flex space-x-2">
                            <div class=" m-3 grid grid-cols-2 gap-8">
                                <x-forms.button type="submit" text="Guardar cambios" />
                                <a href="{{ url()->previous() }}" class="w-full text-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-color-primario hover:bg-color-primario-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-color-primario-700" type="submit">
                                    Cancelar
                                </a>
                            </div>
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
                    .create(document.querySelector('#respuesta'), {
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
                            uploadUrl: '{{ asset('. / imagenes / recetas / placeholder.png ') }}',
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

                ClassicEditor
                    .create(document.querySelector('#ayuda'), {
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
                            uploadUrl: '{{ asset('. / imagenes / recetas / placeholder.png ') }}',
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
            });
        </script>
        @endpush

</x-app-layout>