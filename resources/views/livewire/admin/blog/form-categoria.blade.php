<div class="mb-3">
    <label for="name" class="block font-bold text-gray-700">Nombre</label>
    <input type="text" name="name" id="name"
           class="w-full rounded-xl text-gray-500 border-gray-300"
           value="{{old('name', $category->name)}}">
    @error('name')
    <small class="text-red-500">* {{$message}}</small>
    @enderror
</div>

<div class="mb-3">
    <label for="slug" class="block font-bold text-gray-700">Url de la categoría</label>
    <input type="text" name="slug" id="slug"
           class="w-full rounded-xl text-gray-500 border-gray-300"
           value="{{old('slug', $category->slug)}}" readonly>
    @error('slug')
    <small class="text-red-500">* {{$message}}</small>
    @enderror
</div>
