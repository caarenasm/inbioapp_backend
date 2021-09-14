<div class="mb-3">
    <label for="name" class="block font-bold text-gray-700">Nombre</label>
    <input type="text" name="name" id="name" class="w-full rounded-xl text-gray-500 border-gray-300" value="{{ old('name', $category->name) }}">
    @error('title')
    <small class="text-red-500">* {{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label for="slug" class="block font-bold text-gray-700">Url de la categoría</label>
    <input type="text" name="slug" id="slug" class="w-full rounded-xl text-gray-500 border-gray-300" value="{{ old('slug', $category->slug) }}" readonly>
    @error('slug')
    <small class="text-red-500">* {{ $message }}</small>
    @enderror
</div>

{{-- <div class="mb-3">
    <label for="imagen" class="block font-bold text-gray-700">Seleccionar imagen de banner</label>
    <div class="grid grid-cols-2 space-x-5">
        <div>
            <input type="file" name="imagen" id="imagen" accept="image/*">
        </div>
        <div>
            @if ($category->id)
                <img src="/storage/{{$category->url}}" id="miniatura">
@else
<img src="/imagenes/blog/placeholder.png" id="miniatura">
@endif
</div>
</div>

@error('imagen')
<small class="text-red-500">* {{$message}}</small>
@enderror
</div> --}}
<div class="w-1/2 mb-3">
    <p class="block font-bold text-gray-700">Elijé la resolución para la imagen</p>
    <select wire:model="selectedState" class="form-control rounded-xl border-gray-300" id="resolucion" name="resolucion" required>
        <option value="" selected>Escoge la resolución</option>
        @foreach ($resoluciones as $resolucion)
        <option value="{{$resolucion->id}}" @if(old('resolucion')==$resolucion->id || $resolucion->id == $category->resolucion) selected @endif> {{ $resolucion->resolucion }}</option>
        @endforeach
    </select>
    <small class="text-red-500"></small>
</div>

<div class="grid grid-cols-2 gap-4 mb-3">
    <div class="col">
        <div class="image-wrapper">

            @if ($category->id)
            <img id="picture" src="{{ asset('./imagenes/categorias_productos/' . old('imagen', $category->imagen)) }}" alt="{{ old('imagen', $category->imagen) }}">

            @else
            <img id="picture" src="{{ asset('./imagenes/categorias_productos/placeholder.png') }}" alt="">
            @endif
        </div>
    </div>

    <div>
        <p class="font-bold text-sgray-700">Imagen principal de la categoría</p>
        <label for="imagen" class="block text-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-color-primario hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Elegir
            imagen</label>
        <input type="file" name="imagen" id="imagen" class="hidden">
        <p>Explicación de tamaño de imagen</p>

        @error('imagen')
        <small class="text-red-500">* {{$message}}</small>
        @enderror
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
    document.getElementById("imagen").addEventListener('change', cambiarImagen);

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