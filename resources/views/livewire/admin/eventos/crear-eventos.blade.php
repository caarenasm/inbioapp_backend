@section('title', 'Crear eventos')

    <div class="p-2 bg-white pt-6 m-2">
        <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Crear nuevo evento</h2>
        <div class="flex flex-col">
            <form method="post" action="{{ route('eventos.store') }}" accept-charset="UTF-8"
                enctype="multipart/form-data">
                @csrf
                <div class="space-x-2">
                    <div class="mb-3 grid grid-cols-2 space-x-2">
                        <div class="mb-3">
                            <label for="titulo" class="block font-bold text-gray-700">Titulo</label>
                            <input type="text" name="titulo" id="titulo"
                                class="w-full rounded-xl text-gray-500 border-gray-300" value="">
                            @error('titulo')
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
                        <div class="mb-3">
                            <label for="slug" class="block font-bold text-gray-700">Url de la entrada</label>
                            <input type="text" name="slug" id="slug" class="w-full rounded-xl text-gray-500 border-gray-300"
                                value="" readonly>
                            @error('slug')
                                <small class="text-red-500">* {{ $message }}</small>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="fecha_evento" class="block font-bold text-gray-700">Fecha de
                                publicación</label>
                            <input type="date" name="fecha_evento" id="fecha_evento"
                                class="w-full rounded-xl text-gray-500 border-gray-300" value="">
                            @error('fecha_evento')
                                <small class="text-red-500">* {{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="hora" class="block font-bold text-gray-700">Fecha de
                                publicación</label>
                            <input type="time" name="hora" id="hora" class="w-full rounded-xl text-gray-500 border-gray-300"
                                value="">
                            @error('hora')
                                <small class="text-red-500">* {{ $message }}</small>
                            @enderror
                        </div>

                        <div class="w-1/2 mb-3">
                            <p class="block font-bold text-gray-700">Elijé el tipo de evento</p>
                            <select wire:model="selectedState" class="form-control" id="tipo_evento_id"
                                name="tipo_evento_id">
                                <option value="" selected>Escoge el tipo</option>
                                @foreach ($tipo_eventos as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->tipo_evento }}</option>
                                @endforeach
                            </select>
                            @error('tipo_evento_id')
                                <small class="text-red-500">* {{ $message }}</small>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-3">
                            <div class="col">
                                <div class="image-wrapper">
                                    <img id="picture" src="{{ asset('./imagenes/eventos/placeholder.png') }}" alt="">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <div class="label" name="imagen_url">Selecciona la imagen</div>
                                    <input type="file" name="imagen_url" id="imagen_url" class="form-control-file" value="">
                                    @error('imagen_url')
                                        <small class="text-red-500">* {{ $message }}</small>
                                    @enderror
                                </div>
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
            </form>
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
            document.getElementById("imagen_url").addEventListener('change', cambiarImagen);

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
                const titulo = document.getElementById('titulo');
                const slug = document.getElementById('slug');
                titulo.onblur = function() {
                    slug.value = slugify(titulo.value);
                }
                titulo.onkeydown = function() {
                    slug.value = slugify(titulo.value);
                }
                titulo.onkeyup = function() {
                    slug.value = slugify(titulo.value);
                }

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
                            uploadUrl: '{{ asset('./imagenes/eventos/placeholder.png') }}',
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

            function slugify(str) {
                str = str.replace(/^\s+|\s+$/g, ''); // trim
                str = str.toLowerCase();

                // remove accents, swap ñ for n, etc
                var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
                var to = "aaaaeeeeiiiioooouuuunc------";

                for (var i = 0, l = from.length; i < l; i++)
                    str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));


                str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                    .replace(/\s+/g, '-') // collapse whitespace and replace by -
                    .replace(/-+/g, '-'); // collapse dashes

                return str;
            }
        </script>
    @endpush
