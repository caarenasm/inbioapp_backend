<x-app-layout>

    @section('title', 'Editar usuario')

    <div class="p-2 bg-white p-6 m-2">
        <h2 class="text-2xl  text-fondo-verde font-extrabold text-center">Usuarios</h2>
        <div class="m-3 w-1/3 p-2 bg-gray-50 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Modificar usuario</h2>
            <div class="flex flex-col">

                <form method="post" action="{{ route('usuarios.update', $user)  }}">
                    @csrf
                    @method('put')

                    <div class="m-3">
                        <label for="name" class="block font-bold text-gray-700">Nombre</label>
                        <input type="text" name="name" id="name" class="w-full rounded-xl text-gray-500 border-gray-300" value="{{old('name', $user->name)}}">
                        @error('name')
                        <small class="text-red-500">* {{$message}}</small>
                        @enderror
                    </div>

                    <div class="m-3">
                        <label for="email" class="block font-bold text-gray-700">Email</label>
                        <input type="email" name="email" id="email" class="w-full rounded-xl text-gray-500 border-gray-300" value="{{old('email', $user->email)}}">
                        @error('email')
                        <small class="text-red-500">* {{$message}}</small>
                        @enderror
                    </div>

                    <div class="m-3">
                        <p class="block font-bold text-gray-700">Tipo de usuario</p>
                        @foreach($roles as $role)
                        <label>
                            <input type="checkbox" name="role[]" value="{{$role->id}}" {{ $user->hasRole($role->id) ? 'checked' : '' }}>
                            {{$role->name}}
                        </label>
                        @endforeach
                        @error('role')
                        <small class="text-red-500">* {{$message}}</small>
                        @enderror
                    </div>

                    <div class="m-3">
                        <x-forms.button type="submit" text="Guardar cambios" />
                    </div>
                </form>

            </div>
        </div>
    </div>

</x-app-layout>