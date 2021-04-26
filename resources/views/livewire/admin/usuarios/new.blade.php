<x-app-layout>

    @section('title', 'Crear usuario')

    <div class="p-2 bg-white">
        <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Crear nuevo usuario</h2>

        <div class="flex flex-col">

            <form method="post" action="{{ route('usuarios.store')  }}">
                @csrf

                <div class="w-1/2 mb-3">
                    <label for="name" class="block font-bold text-gray-700">Nombre</label>
                    <input type="text" name="name" id="name" class="w-full rounded-xl text-gray-500 border-gray-300" value="{{old('name')}}">
                    @error('name')
                    <small class="text-red-500">* {{$message}}</small>
                    @enderror
                </div>

                <div class="w-1/2 mb-3">
                    <label for="email" class="block font-bold text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="w-full rounded-xl text-gray-500 border-gray-300" value="{{old('email')}}">
                    @error('email')
                    <small class="text-red-500">* {{$message}}</small>
                    @enderror
                </div>

                <div class="w-1/2 mb-3">
                    <p class="block font-bold text-gray-700">Tipo de usuario</p>
                    @foreach($roles as $role)
                        <label>
                            <input type="checkbox" name="role[]" value="{{$role->id}}">
                            {{$role->name}}
                        </label>
                    @endforeach
                    @error('role')
                    <small class="text-red-500">* {{$message}}</small>
                    @enderror
                </div>

                <div class="w-1/2 mb-3">
                    <x-forms.button type="submit" text="Guardar cambios" />
                </div>
            </form>

        </div>

    </div>

</x-app-layout>
