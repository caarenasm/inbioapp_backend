<div class="mb-3">
    <label for="nombre" class="block font-bold text-gray-700">Nombre</label>
    <input type="text" name="nombre" id="nombre"
           class="w-full rounded-xl text-gray-500 border-gray-300"
           value="{{old('nombre', $pais->nombre)}}">
    @error('nombre')
    <small class="text-red-500">* {{$message}}</small>
    @enderror
</div>
