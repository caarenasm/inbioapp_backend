<x-app-layout>
    @section('title', 'Editar pregunta')

    <div class="p-2 bg-white pt-6 m-2">
        <h2 class="text-2xl text-fondo-verde font-extrabold text-center">Objetivos</h2>
        <div class="m-3 p-2 bg-gray-50 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Modificar objetivo</h2>
            <div class="flex flex-col">
                <form method="post" action="{{ route('preguntas.update', $pregunta) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="grid grid-cols-2">
                        <div class="m-3">
                            <label for="pregunta" class="block font-bold text-gray-700">Pregunta</label>
                            <input type="text" name="pregunta" id="pregunta" class="w-full rounded-xl text-gray-500 border-gray-300" value="{{ old('pregunta', $pregunta->pregunta) }}">
                            @error('pregunta')
                            <small class="text-red-500">* {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="m-3">
                            <label for="descripcion" class="block font-bold text-gray-700">Descripción</label>
                            <textarea name="descripcion" id="descripcion" class="w-full rounded-xl text-gray-500 border-gray-300">{{ old('descripcion', $pregunta->descripcion) }}</textarea>
                            @error('descripcion')
                            <small class="text-red-500">* {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="flex-grow m-3">
                            <label><input type="radio" name="tipo_respuestas" value="1" {{ old('tipo_respuestas', $pregunta->tipo_respuestas) == '1' ? 'checked' : '' }}>Respuesta unica</label>
                            <label><input type="radio" name="tipo_respuestas" value="2" {{ old('tipo_respuestas', $pregunta->tipo_respuestas) == '2' ? 'checked' : '' }}>Respuestas multiples</label>
                            @error('tipo_respuestas')
                            <small class="text-red-500">* {{ $message }}</small>
                            @enderror
                        </div>

                        <div class="m-3">
                            <p class="block font-bold text-gray-700">Elijé el icono de la pregunta</p>
                            <select wire:model="selectedState" class="form-control rounded-xl border-gray-300" id="icono" name="icono">
                                <option value="" selected>Escoge el icono</option>
                                @foreach ($iconos as $icono)
                                <option value="{{ $icono->nombre_icono }}" @if(old('icono')===$pregunta->icono || $pregunta->icono === $icono->nombre_icono) selected @endif>{{ $icono->nombre_icono }}</option>
                                @endforeach
                            </select>
                            <small class="text-red-500"></small>
                        </div>
                    </div>
            </div>

            <div class="flex space-x-2">
                <div class=" mb-3 grid grid-cols-2 gap-8">
                    <x-forms.button type="submit" text="Guardar cambios" />
                    <a href="{{ url()->previous() }}" class="w-full text-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-color-primario hover:bg-color-primario-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-color-primario-700" type="submit">
                        Cancelar
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
                        uploadUrl: '{{ asset('. / imagenes / preguntas / placeholder.png ') }}',
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