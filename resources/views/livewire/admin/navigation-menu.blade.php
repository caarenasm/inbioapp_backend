<div class="flex-item border-t border-gray-300">

    <div class="flex-col p-1">
        <a href="{{ route('escritorio') }}" class="border-b border-gray-300 p-1 block text-white">
            <div class="inline-block w-5 relative top-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="white">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            Escritorio
        </a>
    </div>

    <div class="flex-col p-1">
        <a href="{{ route('enfermedad') }}" class="border-b border-gray-300 p-1 block text-white">
            <div class="inline-block w-5 relative top-1">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="head-side-cough" class="svg-inline--fa fa-head-side-cough fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                    <path fill="currentColor" d="M616,304a24,24,0,1,0-24-24A24,24,0,0,0,616,304ZM552,416a24,24,0,1,0,24,24A24,24,0,0,0,552,416Zm-64-56a24,24,0,1,0,24,24A24,24,0,0,0,488,360ZM616,464a24,24,0,1,0,24,24A24,24,0,0,0,616,464Zm0-104a24,24,0,1,0,24,24A24,24,0,0,0,616,360Zm-64-40a24,24,0,1,0,24,24A24,24,0,0,0,552,320Zm-74.78-45c-21-47.12-48.5-151.75-73.12-186.75A208.13,208.13,0,0,0,234.1,0H192C86,0,0,86,0,192c0,56.75,24.75,107.62,64,142.88V512H288V480h64a64,64,0,0,0,64-64H320a32,32,0,0,1,0-64h96V320h32A32,32,0,0,0,477.22,275ZM288,224a32,32,0,1,1,32-32A32.07,32.07,0,0,1,288,224Z">
                    </path>
                </svg>
            </div>
            Enfermedades
        </a>    
    </div>

    <div class="flex-col p-1" x-data="{ openAlimentos : false }">
        <a class="border-b border-gray-300 p-1 block text-white" x-on:click="openAlimentos = openAlimentos !== true">
            <div class="inline-block w-5 relative top-1">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="utensils" class="svg-inline--fa fa-utensils fa-w-13" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 416 512">
                    <path fill="currentColor" d="M207.9 15.2c.8 4.7 16.1 94.5 16.1 128.8 0 52.3-27.8 89.6-68.9 104.6L168 486.7c.7 13.7-10.2 25.3-24 25.3H80c-13.7 0-24.7-11.5-24-25.3l12.9-238.1C27.7 233.6 0 196.2 0 144 0 109.6 15.3 19.9 16.1 15.2 19.3-5.1 61.4-5.4 64 16.3v141.2c1.3 3.4 15.1 3.2 16 0 1.4-25.3 7.9-139.2 8-141.8 3.3-20.8 44.7-20.8 47.9 0 .2 2.7 6.6 116.5 8 141.8.9 3.2 14.8 3.4 16 0V16.3c2.6-21.6 44.8-21.4 48-1.1zm119.2 285.7l-15 185.1c-1.2 14 9.9 26 23.9 26h56c13.3 0 24-10.7 24-24V24c0-13.2-10.7-24-24-24-82.5 0-221.4 178.5-64.9 300.9z">
                    </path>
                </svg>
            </div>
            Alimentacion
        </a>
        <div x-show="openAlimentos">
            <div class="p-1 mt-1">
                <a href="{{ route('categoria-alimento') }}" class="text-white">
                    Categoria de alimentos
                </a>
            </div>
            <div class="p-1 mt-1">
                <a href="{{ route('alimento') }}" class="text-white">
                    Alimentos
                </a>
            </div>
        </div>
    </div>

    <div class="flex-col p-1" x-data="{ openBlog : false }">
        <a class="border-b border-gray-300 p-1 block text-white" x-on:click="openBlog = openBlog !== true">
            <div class="inline-block w-5 relative top-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="white">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 5c7.18 0 13 5.82 13 13M6 11a7 7 0 017 7m-6 0a1 1 0 11-2 0 1 1 0 012 0z" />
                </svg>
            </div>
            Blog
        </a>
        <div x-show="openBlog">
            <div class="p-1 mt-1">
                <a href="{{ route('blog') }}" class="text-white">
                    Ver entradas
                </a>
            </div>
            <div class="p-1">
                <a href="{{ route('blog.create') }}" class="text-white">
                    Nueva entrada
                </a>
            </div>
            <div class="border-b border-black p-1 block">
                <a href="{{ route('blog-category') }}" class="text-white">
                    Categorías
                </a>
            </div>
        </div>
    </div>


    <div class="flex-col p-1" x-data="{ openProductos : false }">
        <a class="border-b border-gray-300 p-1 block text-white" x-on:click="openProductos = openProductos !== true">
            <div class="inline-block w-5 relative top-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="white">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                </svg>
            </div>
            Productos
        </a>
        <div x-show="openProductos">
            <div class="p-1 mt-1">
                <a href="{{ route('producto') }}" class="text-white">
                    Ver productos
                </a>
            </div>
            <div class="p-1">
                <a href="{{ route('producto.create') }}" class="text-white">
                    Nuevo producto
                </a>
            </div>
            <div class="p-1">
                <a href="{{ route('product-category') }}" class="text-white">
                    Categorías
                </a>
            </div>
        </div>
    </div>

    <div class="flex-col p-1">
        <a href="{{ route('usuarios') }}" class="border-b border-gray-300 p-1 block text-white">
            <div class="inline-block w-5 relative top-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="white">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
            Usuarios
        </a>
    </div>

    <div class="flex-col p-1">
        <a href="{{ route('profile.show') }}" class="border-b border-gray-300 p-1 block text-white">
            <div class="inline-block w-5 relative top-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="white">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            Mi perfil
        </a>
    </div>

    <div class="flex-col p-1">
        <form method="POST" action="{{ route('logout') }}" class="border-b border-gray-300 p-1 block">
            @csrf
            <div class="inline-block w-5 relative top-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="white">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </div>
            <a class="text-white" onclick="event.preventDefault();
            this.closest('form').submit();">Cerrar sesión</a>
        </form>
    </div>
</div>


<script>
    document.addEventListener('livewire:load', function() {

    })
</script>