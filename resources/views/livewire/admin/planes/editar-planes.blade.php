<x-app-layout>
    @section('title', 'Editar categoria de alimentos')

    <div class="p-2 bg-white pt-6 m-2">
        <h2 class="text-2xl  text-fondo-verde font-extrabold text-center">Planes</h2>
        <div class="m-3 p-2 bg-gray-50 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Modificar planes</h2>
            <div class="flex flex-col">
                <form method="post" action="{{ route('planes.update', $plan) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="space-x-2 w-full grid grid-cols-2">
                        <div class="mb-3 m-3">
                            <label for="titulo" class="block font-bold text-gray-700">Titulo</label>
                            <input type="text" name="titulo" id="titulo" class="w-full rounded-xl text-gray-500 border-gray-300" value="{{ old('titulo', $plan->titulo) }}">
                            @error('titulo')
                            <small class="text-red-500">* {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 m-3">
                            <label for="slug" class="block font-bold text-gray-700">Url de la entrada</label>
                            <input type="text" name="slug" id="slug" class="w-full rounded-xl text-gray-500 border-gray-300" value="{{ old('slug', $plan->slug) }}" readonly>
                            @error('slug')
                            <small class="text-red-500">* {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 m-3">
                            <label for="descripcion" class="block font-bold text-gray-700">Descripción del plan</label>
                            <textarea name="descripcion" id="descripcion" class="w-full rounded-xl text-gray-500 border-gray-300">{{ old('descripcion', $plan->descripcion) }}</textarea>
                            @error('descripcion')
                            <small class="text-red-500">* {{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3 m-3">
                            <label for="precio" class="block font-bold text-gray-700">Precio</label>
                            <input type="number" name="precio" id="precio" class="w-full rounded-xl text-gray-500 border-gray-300" value="{{ old('precio', $plan->precio) }}">
                            @error('precio')
                            <small class="text-red-500">* {{ $message }}</small>
                            @enderror
                        </div>

                        <div class="w-1/2 m-3">
                            <p class="block font-bold text-gray-700">Elijé la resolución para la imagen</p>
                            <select wire:model="selectedState" class="form-control rounded-xl border-gray-300" id="resolucion" name="resolucion" required>
                                <option value="" selected>Escoge la resolución</option>
                                @foreach ($resoluciones as $resolucion)
                                <option value="{{ $resolucion->id }}" @if (old('resolucion')==$resolucion->id || $resolucion->id == $plan->resolucion) selected @endif>
                                    {{ $resolucion->resolucion }}
                                </option>
                                @endforeach
                            </select>
                            <small class="text-red-500"></small>
                        </div>

                        <div class="grid grid-cols-2">
                            <div class="col mr-3">
                                <div class="image-wrapper">
                                    @if ($plan->imagen_url)
                                    <img id="picture" src="{{ asset('./imagenes/planes/' . old('imagen_url', $plan->imagen_url)) }}" alt="{{ old('imagen_url', $plan->imagen_url) }}">
                                    @else
                                    <img id="picture" src="{{ asset('./imagenes/planes/placeholder.png') }}" alt="{{ old('imagen_url', $plan->imagen_url) }}">
                                    @endif
                                </div>
                            </div>

                            <div>
                                <p class="font-bold text-sgray-700">Imagen principal de la entrada</p>
                                <label for="image_url" class="block text-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-color-primario hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Elegir
                                    imagen</label>
                                <input type="file" name="image_url" id="image_url" class="hidden">
                                <p>Explicación de tamaño de imagen</p>

                                @error('image_url')
                                <small class="text-red-500">* {{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <div class=" mb-3 grid grid-cols-2 gap-8">
                            <x-forms.button type="submit" text="Guardar cambios" />
                            <a href="{{ url()->previous() }}" class="text-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-color-primario hover:bg-color-primario-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-color-primario-700" type="submit">
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
                        uploadUrl: '{{ asset('. / imagenes / planes / placeholder.png ') }}',
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