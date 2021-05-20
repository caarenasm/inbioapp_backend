<x-app-layout>
    @section('title', 'Crear categoria de alimentos')

        <div class="p-2 bg-white">
            <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Crear nuevo plan</h2>
            <div class="flex flex-col">
                <form method="post" action="{{ route('planes.store') }}" accept-charset="UTF-8"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="space-x-2 w-96">
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="titulo" class="block font-bold text-gray-700">Titulo</label>
                                <input type="text" name="titulo" id="titulo"
                                    class="w-full rounded-xl text-gray-500 border-gray-300" value="">
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="block font-bold text-gray-700">Descripción del plan</label>
                                @error('description')
                                    <small class="text-red-500">* {{ $message }}</small>
                                @enderror
                                <textarea name="descripcion" id="descripcion"
                                    class="w-full rounded-xl text-gray-500 border-gray-300"></textarea>
                            </div>
                            <div class="grid grid-cols-2 gap-4 mb-3">
                                <div class="col">
                                    <div class="image-wrapper">
                                        <img id="picture"
                                            src="{{ asset('./imagenes/imagenes-planes/placeholder.png') }}"
                                            alt="">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        {!! Form::label('imagen_url', 'Selecciona la imagen') !!}
                                        {!! Form::file('imagen_url', ['class' => 'form-control-file']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="precio" class="block font-bold text-gray-700">Precio</label>
                                <input type="number" name="precio" id="precio"
                                    class="w-full rounded-xl text-gray-500 border-gray-300" value="">
                                @error('price')
                                    <small class="text-red-500">* {{ $message }}</small>
                                @enderror
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