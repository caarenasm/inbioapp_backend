<div class="m-3 p-2 bg-gray-50 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    
    <h2 class="text-2xl p-3 text-fondo-verde font-extrabold">{{ $h2 }}</h2>

    <div class="grid grid-cols-2">
        <div class="m-3">
            <label for="title" class="block font-bold text-gray-700">Título</label>
            <input type="text" name="title" id="title" class="w-full rounded-xl text-gray-500 border-gray-300"
                value="{{ old('title', $producto->title) }}">
            @error('title')
                <small class="text-red-500">* {{ $message }}</small>
            @enderror
        </div>

        <div class="m-3">
            <label for="slug" class="block font-bold text-gray-700">Url de la entrada</label>
            <input type="text" name="slug" id="slug" class="w-full rounded-xl text-gray-500 border-gray-300"
                value="{{ old('slug', $producto->slug) }}" readonly>
            @error('slug')
                <small class="text-red-500">* {{ $message }}</small>
            @enderror
        </div>

        <div class="m-3">
            <label for="seo_title" class="block font-bold text-gray-700">Título para buscadores <small>Máximo
                    60 caractéres</small></label>
            <input type="text" name="seo_title" id="seo_title" class="w-full rounded-xl text-gray-500 border-gray-300"
                value="{{ old('seo_title', $producto->seo_title) }}">
            @error('seo_title')
                <small class="text-red-500">* {{ $message }}</small>
            @enderror
        </div>

        <div class="m-3">
            <label for="seo_description" class="block font-bold text-gray-700">Descripción para
                buscadores <small>Máximo 160 caractéres</small></label>
            <textarea name="seo_description" id="seo_description"
                class="w-full rounded-xl text-gray-500 border-gray-300">{{ old('seo_description', $producto->seo_description) }}</textarea>
            @error('seo_description')
                <small class="text-red-500">* {{ $message }}</small>
            @enderror
        </div>

        <div class="m-3">
            <label for="price" class="block font-bold text-gray-700">Precio</label>
            <input type="text" name="price" id="price" class="w-full rounded-xl text-gray-500 border-gray-300"
                value="{{ old('price', $producto->price) }}">
            @error('price')
                <small class="text-red-500">* {{ $message }}</small>
            @enderror
        </div>

        <div class="m-3">
            <label for="weight" class="block font-bold text-gray-700">Peso en Kg.<small>(Con empaque
                    incluído)</small></label>
            <input type="text" name="weight" id="weight" class="w-full rounded-xl text-gray-500 border-gray-300"
                value="{{ old('weight', $producto->weight) }}">
            @error('weight')
                <small class="text-red-500">* El peso debe ser numérico</small>
            @enderror
        </div>

        <div class="m-3">
            <p class="block font-bold text-gray-700">Categorías</p>
            @foreach ($categories as $category)
                <label class="block"><input type="checkbox" name="categoria[]" value="{{ $category->id }}"
                        {{ is_array(
    old(
        'categoria',
        $producto->categorias()->pluck('categorias_producto_id')->all(),
    ),
) &&
in_array(
    $category->id,
    old(
        'categoria',
        $producto->categorias()->pluck('categorias_producto_id')->all(),
    ),
)
    ? ' checked'
    : '' }}>
                    {{ $category->name }}
                </label>
            @endforeach
            @error('categoria')
                <small class="text-red-500">* {{ $message }}</small>
            @enderror
        </div>

        {{-- <div class="m-3">
                    <label for="imagenes" class="block font-bold text-gray-700">Seleccionar imagen de banner</label>
                    <div class="grid grid-cols-2 space-x-5">
                        <div>
                            <input type="file" name="imagenes" id="imagenes" accept="image/*">
                        </div>
                        <div>
                            @if ($category->id)
                                <img src="/storage/{{$category->url}}" id="miniatura">
                            @else
                                <img src="/imagenes/blog/placeholder.png" id="miniatura">
                            @endif
                        </div>
                    </div>
                
                    @error('imagenes')
                    <small class="text-red-500">* {{$message}}</small>
                    @enderror
                </div> --}}

        <div class="w-1/2 m-3">
            <p class="block font-bold text-gray-700">Elijé la resolución para la imagen</p>
            <select wire:model="selectedState" class="form-control rounded-xl border-gray-300" id="dimension" name="dimension" required>
                <option value="" selected>Escoge la resolución</option>
                @foreach ($resoluciones as $dimension)
                    <option value="{{ $dimension->id }}" @if (old('dimension') == $dimension->id || $dimension->id == $category->dimension) selected @endif> {{ $dimension->resolucion }}
                    </option>
                @endforeach
            </select>
            <small class="text-red-500"></small>
        </div>

        <div class="m-3">
            <label for="description" class="block font-bold text-gray-700">Descripción del producto</label>
            @error('description')
                <small class="text-red-500">* {{ $message }}</small>
            @enderror
            <textarea name="description" id="description"
                class="w-full rounded-xl text-gray-500 border-gray-300">{{ old('description', $producto->description) }}</textarea>

        </div>

        <div class="grid grid-cols-2 gap-4 m-3">
            <div class="col">
                <div class="image-wrapper">
                    @if ($producto->id)
                        <img id="picture"
                            src="{{ asset('./imagenes/productos/' . old('imagenes', $producto->imagenes)) }}"
                            alt="{{ old('imagenes', $producto->imagenes) }}">
                    @else
                        <img id="picture" src="{{ asset('./imagenes/productos/placeholder.png') }}" alt="">
                    @endif


                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <div class="label" name="imagenes">Selecciona la imagen</div>
                    <input type="file" name="imagenes" id="imagenes" class="form-control-file"
                        value="{{ old('imagenes', $producto->imagenes) }}">
                </div>
            </div>
        </div>



        <div class="flex space-x-2">

            <div class="flex-grow m-3">
                <label><input type="radio" name="published" value="0" required
                        {{ old('published', $producto->published) == '0' ? 'checked' : '' }}> Borrador</label>
                <label><input type="radio" name="published" value="1"
                        {{ old('published', $producto->published) == '1' ? 'checked' : '' }}>
                    Publicación</label>
                @error('published')
                    <small class="text-red-500">* {{ $message }}</small>
                @enderror
            </div>

            <div class="flex-grow m-3">
                <x-forms.button type="submit" text="{{ $btnText }}" />
            </div>
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
        document.getElementById("imagenes").addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
    </script>
@endpush
