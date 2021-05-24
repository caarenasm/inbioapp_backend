<x-app-layout>
    @section('title', 'Editar recetas')

        <div class="p-2 bg-white">
            <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Editar receta</h2>
            <div class="flex flex-col">
                <form method="post" action="{{ route('recetas.update',$receta) }}" accept-charset="UTF-8"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="space-x-2 ">
                        <div class="mb-3 grid grid-cols-2 space-x-2">
                            <div class="mb-3">
                                <label for="titulo" class="block font-bold text-gray-700">Titulo</label>
                                <input type="text" name="titulo" id="titulo"
                                    class="w-full rounded-xl text-gray-500 border-gray-300" value="{{old('titulo', $receta->titulo)}}">
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="block font-bold text-gray-700">Descripción de la receta</label>
                                @error('description')
                                    <small class="text-red-500">* {{ $message }}</small>
                                @enderror
                                <textarea name="descripcion" id="descripcion"
                                    class="w-full rounded-xl text-gray-500 border-gray-300">{{old('descripcion', $receta->descripcion)}}"</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="preparacion" class="block font-bold text-gray-700">Preparacion</label>
                                @error('description')
                                    <small class="text-red-500">* {{ $message }}</small>
                                @enderror
                                <textarea name="preparacion" id="preparacion"
                                    class="w-full rounded-xl text-gray-500 border-gray-300">{{old('preparacion', $receta->preparacion)}}</textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="caloria" class="block font-bold text-gray-700">Caloria</label>
                                <input type="number" name="caloria" id="caloria"
                                    class="w-full rounded-xl text-gray-500 border-gray-300" value="{{old('caloria', $receta->caloria)}}">
                                @error('caloria')
                                    <small class="text-red-500">* {{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="grasa" class="block font-bold text-gray-700">Grasa</label>
                                <input type="number" name="grasa" id="grasa"
                                    class="w-full rounded-xl text-gray-500 border-gray-300" value="{{old('grasa', $receta->grasa)}}">
                                @error('grasa')
                                    <small class="text-red-500">* {{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="proteina" class="block font-bold text-gray-700">Proteina</label>
                                <input type="number" name="proteina" id="proteina"
                                    class="w-full rounded-xl text-gray-500 border-gray-300" value="{{old('descripcion', $receta->proteina)}}">
                                @error('price')
                                    <small class="text-red-500">* {{ $message }}</small>
                                @enderror
                            </div>
                        
                            <div class="grid grid-cols-2 gap-4 mb-3">
                                <div class="col">
                                    <div class="image-wrapper">
                                        <img id="picture"
                                            src="{{ asset('./imagenes/recetas/'.old('imagen_url',$receta->imagen_url)) }}"
                                            alt="{{old('imagen_url',$receta->imagen_url)}}">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <div class="label" name="imagen_url">Selecciona la imagen</div>
                                        <input type="file" name="imagen_url" id="imagen_url" class="form-control-file" value="{{old('imagen_url',$receta->imagen_url)}}">
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
    @endpush
    
</x-app-layout>