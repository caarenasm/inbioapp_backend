@section('title', 'Crear subtipo de lectura')

<div class="m-3 w-1/3 p-2 bg-gray-50 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Crear subtipo de lectura</h2>
    <div class="flex flex-col">
        <form action="{{ route('subtipos-lecturas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="m-3">
                <label for="descripcion" class="block font-bold text-gray-700">Descripción del subtipo</label>
                <input type="text" name="descripcion" id="descripcion"
                    class="w-full rounded-xl text-gray-500 border-gray-300" value="">
                @error('descripcion')
                    <small class="text-red-500">* {{ $message }}</small>
                @enderror
            </div>

            <div class="">
                <div class="m-3">
                    <p class="block font-bold text-gray-700">Elijé el tipo de lectura</p>
                    <select wire:model="selectedState" class="form-control rounded-xl border-gray-300"
                        id="tipo_lectura_id" name="tipo_lectura_id">
                        <option value="" selected>Escoge el tipo</option>
                        @foreach ($tipos_lecturas as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                        @endforeach
                    </select>
                    @error('tipo_lectura_id')
                        <small class="text-red-500">* {{ $message }}</small>
                    @enderror
                </div>
                <div class="m-3">
                    <p class="block font-bold text-gray-700">Elijé el icono para el subtipo</p>
                    <select wire:model="selectedState" class="form-control rounded-xl border-gray-300" id="icono"
                        name="icono">
                        <option value="" selected>Escoge el icono</option>
                        @foreach ($iconos as $icono)
                            <option value="{{ $icono->nombre_icono }}">{{ $icono->nombre_icono }}</option>
                        @endforeach
                    </select>
                    <small class="text-red-500"></small>
                </div>
            </div>

            <div class="m-3 grid grid-cols-2 gap-4">
                <x-forms.button type="submit" text="Crear subtipo de lectura" />
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
                    uploadUrl: '{{ asset('. / imagenes / eventos / placeholder.png ') }}',
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
