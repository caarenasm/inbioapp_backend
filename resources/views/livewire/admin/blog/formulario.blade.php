<div class="grid grid-cols-2 space-x-2">

    <div class="mb-3">

        <div class="mb-3">
            <label for="title" class="block font-bold text-gray-700">Título</label>
            <input type="text" name="title" id="title"
                   class="w-full rounded-xl text-gray-500 border-gray-300"
                   value="{{old('title', $post->title)}}">
            @error('title')
            <small class="text-red-500">* {{$message}}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="author" class="block font-bold text-gray-700">Autor</label>
            <select type="text" name="author" id="author"
                    class="w-full rounded-xl text-gray-500 border-gray-300">
                @foreach($users as $user)
                    <option value="{{$user->id}}" {{$user->id==$post->user_id?'selected':''}}>{{$user->name}}</option>
                @endforeach
            </select>
            @error('author')
            <small class="text-red-500">* {{$message}}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="start_date" class="block font-bold text-gray-700">Fecha de publicación</label>
            <input type="date" name="start_date" id="start_date"
                   class="w-full rounded-xl text-gray-500 border-gray-300"
                   value="{{old('start_date', $post->start_date)}}">
            @error('start_date')
            <small class="text-red-500">* {{$message}}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="end_date" class="block font-bold text-gray-700">Fecha de retirada</label>
            <input type="date" name="end_date" id="end_date"
                   class="w-full rounded-xl text-gray-500 border-gray-300"
                   value="{{old('end_date', $post->end_date)}}">
            @error('end_date')
            <small class="text-red-500">* {{$message}}</small>
            @enderror
        </div>

        <div class="mb-3">
            <p class="block font-bold text-gray-700">Categorías</p>
            @foreach($categories as $category)
                <label class="block"><input type="checkbox" name="categoria[]"
                              value="{{$category->id}}" {{ (is_array(old('categoria', $post->categorias()->pluck('categorias_blog_id')->all())) && in_array($category->id, old('categoria', $post->categorias()->pluck('categorias_blog_id')->all()))) ? ' checked' : '' }}> {{$category->name}}
                </label>
            @endforeach
            @error('categoria')
            <small class="text-red-500">* {{$message}}</small>
            @enderror
        </div>

    </div>

    <div class="mb-3">
        <div class="mb-3">
            <label for="slug" class="block font-bold text-gray-700">Url de la entrada</label>
            <input type="text" name="slug" id="slug"
                   class="w-full rounded-xl text-gray-500 border-gray-300"
                   value="{{old('slug', $post->slug)}}" readonly>
            @error('slug')
            <small class="text-red-500">* {{$message}}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="seo_title" class="block font-bold text-gray-700">Título para buscadores <small>Máximo
                    160 caractéres</small></label>
            <input type="text" name="seo_title" id="seo_title"
                   class="w-full rounded-xl text-gray-500 border-gray-300"
                   value="{{old('seo_title', $post->seo_title)}}">
            @error('seo_title')
            <small class="text-red-500">* {{$message}}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="seo_description" class="block font-bold text-gray-700">Descripción para
                buscadores <small>Máximo 60 caractéres</small></label>
            <textarea name="seo_description" id="seo_description"
                      class="w-full rounded-xl text-gray-500 border-gray-300">{{old('seo_description', $post->seo_description)}}</textarea>
            @error('seo_description')
            <small class="text-red-500">* {{$message}}</small>
            @enderror
        </div>

        <div class="mb-3 grid grid-cols-2 space-x-2">
            <div>
                <img src="{{$post->image_url==''?'/imagenes/blog/placeholder.png':'/imagenes/blog/'.old('image_url', $post->image_url)}}" id="picture">
            </div>
            <div>
                <p class="font-bold text-sgray-700">Imagen principal de la entrada</p>
                <label for="image_url"
                       class="block text-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-color-primario hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Elegir
                    imagen</label>
                <input type="file" name="image_url" id="image_url" class="hidden">
                <p>Explicación de tamaño de imagen</p>

                @error('image_url')
                <small class="text-red-500">* {{$message}}</small>
                @enderror
            </div>
        </div>

    </div>

</div>

<div class="w-full mb-3">
    <label for="content" class="block font-bold text-gray-700">Texto de la entrada</label>
    @error('text')
    <small class="text-red-500">* {{$message}}</small>
    @enderror
    <textarea name="text" id="text"
              class="w-full rounded-xl text-gray-500 border-gray-300">{{old('text', $post->content)}}</textarea>

</div>

<div class="flex space-x-2">

    <div class="flex-grow mb-3">
        <label><input type="radio" name="published" value="0"
                      required {{old('published', $post->published) == '0' ? 'checked' : '' }}> Borrador</label>
        <label><input type="radio" name="published" value="1" {{old('published', $post->published) == '1' ? 'checked' : '' }}>
            Publicación</label>
        @error('published')
        <small class="text-red-500">* {{$message}}</small>
        @enderror
    </div>

    <div class="flex-grow mb-3">
        <x-forms.button type="submit" text="{{$btnText}}"/>
    </div>
</div>
