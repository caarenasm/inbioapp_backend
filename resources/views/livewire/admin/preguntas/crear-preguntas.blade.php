<x-app-layout>
    @section('title', 'Crear pregunta')

        <div class="p-2 bg-white">
            <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Crear nueva pregunta</h2>
            <div class="flex flex-col">
                <form method="post" action="{{ route('preguntas.store') }}" accept-charset="UTF-8"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="space-x-2 w-1/2">
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="pregunta" class="block font-bold text-gray-700">Pregunta</label>
                                <input type="text" name="pregunta" id="pregunta"
                                    class="w-full rounded-xl text-gray-500 border-gray-300" value="">
                                @error('pregunta')
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
                            <div class="flex-grow mb-3">
                                <label><input type="radio" name="tipo_respuestas" value="0" required>Respuesta unica</label>
                                <label><input type="radio" name="tipo_respuestas" value="1">Respuestas multiples</label>
                                @error('tipo_respuestas')
                                    <small class="text-red-500">* {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="grid grid-cols-2 gap-4 mb-3">
                                <div class="col">
                                    <div class="image-wrapper">
                                        <img id="picture" src="{{ asset('./imagenes/preguntas/placeholder.png') }}"
                                            alt="">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        {!! Form::label('icono', 'Selecciona el icono') !!}
                                        {!! Form::file('icono', ['class' => 'form-control-file']) !!}
                                        @error('icono')
                                            <small class="text-red-500">* {{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
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
                    </div>
                </form>
            </div>
        </div>

    @section('css')
        <style>
            .image-wrapper {
                position: relative;
                padding-bottom: 56.25%
            }

            .image-wrapper img {
                position: absolute;
                object-fit: cover;
                width: 100%;
                height: 100%;
            }

        </style>
    @endsection
    @push('scripts')
        <script>
            document.getElementById("icono").addEventListener('change', cambiarImagen);

            function cambiarImagen(event) {
                var file = event.target.files[0];

                var reader = new FileReader();
                reader.onload = (event) => {
                    document.getElementById("picture").setAttribute('src', event.target.result);
                };

                reader.readAsDataURL(file);
            }

        </script>

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

</x-app-layout>
