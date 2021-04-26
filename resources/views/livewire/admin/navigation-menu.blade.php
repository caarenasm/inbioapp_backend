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
    document.addEventListener('livewire:load', function () {

    })
</script>
