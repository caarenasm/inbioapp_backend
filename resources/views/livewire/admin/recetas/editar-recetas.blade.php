<x-app-layout>
    @section('title', 'Editar recetas')

    <div class="p-2 bg-white pt-6 m-2">
        <h2 class="text-2xl  text-fondo-verde font-extrabold text-center">Recetas</h2>
        <div class="m-3 p-2 bg-gray-50 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Editar receta</h2>
            <div class="flex flex-col">
                <form method="post" action="{{ route('recetas.update', $receta) }}" accept-charset="UTF-8"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="space-x-2 ">
                        <div class="mb-3 grid grid-cols-2 space-x-2">
                            <div class="mb-3">
                                <label for="titulo" class="block font-bold text-gray-700">Titulo</label>
                                <input type="text" name="titulo" id="titulo"
                                    class="w-full rounded-xl text-gray-500 border-gray-300"
                                    value="{{ old('titulo', $receta->titulo) }}">
                            </div>

                            <div class="w-full mb-3">
                                <label for="descripcion" class="block font-bold text-gray-700">Descripción</label>
                                @error('text')
                                    <small class="text-red-500">* {{ $message }}</small>
                                @enderror
                                <textarea name="descripcion" id="descripcion"
                                    class="w-full rounded-xl text-gray-500 border-gray-300">{{ old('descripcion', $receta->descripcion) }}</textarea>

                            </div>
                            <div class="mb-3">
                                <label for="slug" class="block font-bold text-gray-700">Url de la entrada</label>
                                <input type="text" name="slug" id="slug"
                                    class="w-full rounded-xl text-gray-500 border-gray-300"
                                    value="{{ old('slug', $receta->slug) }}" readonly>
                                @error('slug')
                                    <small class="text-red-500">* {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="seo_titulo" class="block font-bold text-gray-700">Título para buscadores
                                    <small>Máximo
                                        160 caractéres</small></label>
                                <input type="text" name="seo_titulo" id="seo_titulo"
                                    class="w-full rounded-xl text-gray-500 border-gray-300"
                                    value="{{ old('seo_titulo', $receta->seo_titulo) }}">
                                @error('seo_titulo')
                                    <small class="text-red-500">* {{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="seo_descripcion" class="block font-bold text-gray-700">Descripción para
                                    buscadores <small>Máximo 60 caractéres</small></label>
                                <textarea name="seo_descripcion" id="seo_descripcion"
                                    class="w-full rounded-xl text-gray-500 border-gray-300">{{ old('seo_descripcion', $receta->seo_descripcion) }}</textarea>
                                @error('seo_descripcion')
                                    <small class="text-red-500">* {{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="fecha_publicacion" class="block font-bold text-gray-700">Fecha de
                                    publicación</label>
                                <input type="date" name="fecha_publicacion" id="fecha_publicacion"
                                    class="w-full rounded-xl text-gray-500 border-gray-300"
                                    value="{{ old('fecha_publicacion', $receta->fecha_publicacion) }}">
                                @error('fecha_publicacion')
                                    <small class="text-red-500">* {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="flex-grow mb-3">
                                <label><input type="radio" name="publicacion" value="0" required
                                        {{ old('publicacion', $receta->publicacion) == '0' ? 'checked' : '' }}>
                                    Borrador</label>
                                <label><input type="radio" name="publicacion" value="1"
                                        {{ old('publicacion', $receta->publicacion) == '1' ? 'checked' : '' }}>
                                    Publicación</label>
                                @error('publicacion')
                                    <small class="text-red-500">* {{ $message }}</small>
                                @enderror
                            </div>

                            <div class="w-full mb-3">
                                <label for="preparacion" class="block font-bold text-gray-700">Preparacion</label>
                                @error('text')
                                    <small class="text-red-500">* {{ $message }}</small>
                                @enderror
                                <textarea name="preparacion" id="preparacion"
                                    class="w-full rounded-xl text-gray-500 border-gray-300">{{ old('preparacion', $receta->preparacion) }}</textarea>

                            </div>

                            <div class="mb-3">
                                <label for="caloria" class="block font-bold text-gray-700">Caloria</label>
                                <input type="number" name="caloria" id="caloria"
                                    class="w-full rounded-xl text-gray-500 border-gray-300"
                                    value="{{ old('caloria', $receta->caloria) }}">
                                @error('caloria')
                                    <small class="text-red-500">* {{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="grasa" class="block font-bold text-gray-700">Grasa</label>
                                <input type="number" name="grasa" id="grasa"
                                    class="w-full rounded-xl text-gray-500 border-gray-300"
                                    value="{{ old('grasa', $receta->grasa) }}">
                                @error('grasa')
                                    <small class="text-red-500">* {{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="proteina" class="block font-bold text-gray-700">Proteina</label>
                                <input type="number" name="proteina" id="proteina"
                                    class="w-full rounded-xl text-gray-500 border-gray-300"
                                    value="{{ old('proteina', $receta->proteina) }}">
                                @error('price')
                                    <small class="text-red-500">* {{ $message }}</small>
                                @enderror
                            </div>

                            <div class="w-1/2 m-3">
                                <p class="block font-bold text-gray-700">Elijé la resolución para la imagen</p>
                                <select wire:model="selectedState" class="form-control rounded-xl border-gray-300" id="resolucion"
                                    name="resolucion" required>
                                    <option value="" selected>Escoge la resolución</option>
                                    @foreach ($resoluciones as $resolucion)
                                        <option value="{{ $resolucion->id }}" @if (old('resolucion') == $resolucion->id || $resolucion->id == $receta->resolucion) selected @endif>
                                            {{ $resolucion->resolucion }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="text-red-500"></small>
                            </div>

                            <div class="grid grid-cols-2 gap-4 mb-3">
                                <div class="col">
                                    <div class="image-wrapper">
                                        <img id="picture"
                                            src="{{ asset('./imagenes/recetas/' . old('imagen_url', $receta->imagen_url)) }}"
                                            alt="{{ old('imagen_url', $receta->imagen_url) }}">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <div class="label" name="imagen_url">Selecciona la imagen</div>
                                        <input type="file" name="imagen_url" id="imagen_url" class="form-control-file"
                                            value="{{ old('imagen_url', $receta->imagen_url) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex space-x-2 grid justify-items-end">
                            <div class=" mb-3 grid grid-cols-2 gap-8">
                                <x-forms.button type="submit" text="Guardar cambios" />
                                <a href="{{ url()->previous() }}"
                                    class="w-full text-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-color-primario hover:bg-color-primario-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-color-primario-700"
                                    type="submit">
                                    Cancelar
                                </a>
                            </div>
                        </div>
                </form>

            </div>
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
                const title = document.getElementById('titulo');
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

            document.addEventListener('livewire:load', function() {
                ClassicEditor
                    .create(document.querySelector('#preparacion'), {
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

</x-app-layout>
