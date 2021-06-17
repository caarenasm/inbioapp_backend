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

    <div class="flex-col p-1" x-data="{ openAlimentos : false }">
        <a class="border-b border-gray-300 p-1 block text-white" x-on:click="openAlimentos = openAlimentos !== true">
            <div class="inline-block w-5 relative top-1">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="head-side-cough" class="svg-inline--fa fa-head-side-cough fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                    <path fill="currentColor" d="M616,304a24,24,0,1,0-24-24A24,24,0,0,0,616,304ZM552,416a24,24,0,1,0,24,24A24,24,0,0,0,552,416Zm-64-56a24,24,0,1,0,24,24A24,24,0,0,0,488,360ZM616,464a24,24,0,1,0,24,24A24,24,0,0,0,616,464Zm0-104a24,24,0,1,0,24,24A24,24,0,0,0,616,360Zm-64-40a24,24,0,1,0,24,24A24,24,0,0,0,552,320Zm-74.78-45c-21-47.12-48.5-151.75-73.12-186.75A208.13,208.13,0,0,0,234.1,0H192C86,0,0,86,0,192c0,56.75,24.75,107.62,64,142.88V512H288V480h64a64,64,0,0,0,64-64H320a32,32,0,0,1,0-64h96V320h32A32,32,0,0,0,477.22,275ZM288,224a32,32,0,1,1,32-32A32.07,32.07,0,0,1,288,224Z">
                    </path>
                </svg>
            </div>
            Sección enfermedades
        </a>
        <div x-show="openAlimentos">
            <div class="p-1 mt-1">
                <a href="{{ route('tipos-enfermedades.index') }}" class="text-white">
                   Tipo de enfermedades 
                </a>
            </div>
            <div class="p-1 mt-1">
                <a href="{{ route('enfermedades.index') }}" class="text-white">
                   Enfermedades 
                </a>
            </div>
        </div>
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
                <a href="{{ route('categoria-alimentos') }}" class="text-white">
                    Categoria de alimentos
                </a>
            </div>
            <div class="p-1 mt-1">
                <a href="{{ route('alimentos') }}" class="text-white">
                    Alimentos
                </a>
            </div>
            <div class="p-1 mt-1">
                <a href="{{ route('recetas') }}" class="text-white">
                    Recetas
                </a>
            </div>
        </div>
    </div>

    <div class="flex-col p-1" x-data="{ openAlimentos : false }">
        <a class="border-b border-gray-300 p-1 block text-white" x-on:click="openAlimentos = openAlimentos !== true">
            <div class="inline-block w-5 relative top-1">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="utensils" class="svg-inline--fa fa-utensils fa-w-13" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <g>
                        <path d="m7.5 246.939h66.85c2.173 0 4.239-.942 5.664-2.584 1.424-1.641 2.067-3.819 1.761-5.971-.337-2.375-.508-4.81-.508-7.233 0-27.837 22.647-50.483 50.483-50.483s50.483 22.646 50.483 50.483c0 2.427-.171 4.859-.508 7.229-.306 2.152.336 4.331 1.761 5.973s3.491 2.584 5.665 2.584l50.284-.001c1.989 0 3.897-.79 5.303-2.197 1.407-1.406 2.197-3.313 2.197-5.303l-.003-74.55c-.001-3.457 1.922-6.566 5.012-8.11 3.096-1.547 6.735-1.217 9.501.862 5.63 4.228 12.341 6.462 19.406 6.462 17.838 0 32.35-14.512 32.35-32.35s-14.513-32.35-32.351-32.35c-7.067 0-13.777 2.234-19.405 6.462-2.767 2.078-6.407 2.41-9.498.864-3.094-1.546-5.016-4.654-5.016-8.112v-91.114c0-4.143-3.358-7.5-7.5-7.5h-215.364c-13.271 0-24.067 10.796-24.067 24.066v19.7c0 4.143 3.358 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-19.7c0-4.999 4.067-9.066 9.067-9.066h207.865v83.614c0 9.178 5.101 17.428 13.312 21.53 8.209 4.104 17.87 3.226 25.21-2.288 3.01-2.261 6.604-3.456 10.396-3.456 9.567 0 17.35 7.783 17.35 17.35s-7.783 17.35-17.35 17.35c-3.791 0-7.387-1.195-10.398-3.456-7.337-5.511-16.995-6.389-25.211-2.288-8.21 4.104-13.31 12.355-13.31 21.531l.002 67.049-34.705.001c.003-.262.005-.524.005-.786 0-36.107-29.376-65.483-65.483-65.483-36.108 0-65.483 29.376-65.483 65.483 0 .263.001.525.005.788h-51.272v-158.172c0-4.143-3.358-7.5-7.5-7.5s-7.5 3.357-7.5 7.5v165.672c0 4.142 3.358 7.5 7.5 7.5z" />
                        <path d="m48.133 90.333v-41.419c0-.432.352-.783.783-.783h41.417c4.142 0 7.5-3.358 7.5-7.5 0-4.143-3.358-7.5-7.5-7.5h-41.416c-8.703 0-15.783 7.08-15.783 15.783v41.419c0 4.143 3.358 7.5 7.5 7.5s7.499-3.357 7.499-7.5z" />
                        <path d="m463.085 33.132h-41.419c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h41.419c.432 0 .783.352.783.783v41.417c0 4.143 3.358 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-41.417c0-8.703-7.081-15.783-15.783-15.783z" />
                        <path d="m478.868 463.085v-41.42c0-4.143-3.358-7.5-7.5-7.5s-7.5 3.357-7.5 7.5v41.42c0 .432-.352.783-.783.783h-41.417c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h41.417c8.702 0 15.783-7.08 15.783-15.783z" />
                        <path d="m90.336 463.867h-41.419c-.432 0-.783-.352-.783-.784v-41.416c0-4.143-3.358-7.5-7.5-7.5s-7.5 3.357-7.5 7.5v41.416c0 8.703 7.081 15.784 15.783 15.784h41.419c4.142 0 7.5-3.357 7.5-7.5 0-4.142-3.358-7.5-7.5-7.5z" />
                        <path d="m487.933 0h-215.368c-4.142 0-7.5 3.357-7.5 7.5v66.849c0 2.173.942 4.239 2.584 5.664 1.641 1.424 3.818 2.064 5.971 1.762 2.371-.337 4.803-.508 7.23-.508 27.836 0 50.483 22.646 50.483 50.483s-22.647 50.483-50.483 50.483c-2.421 0-4.854-.171-7.231-.508-2.151-.303-4.33.338-5.97 1.763-1.641 1.425-2.583 3.49-2.583 5.663l.002 50.283c0 4.143 3.358 7.5 7.5 7.5l74.546-.001c3.458 0 6.566 1.922 8.111 5.015 1.545 3.094 1.215 6.732-.861 9.496-4.229 5.629-6.464 12.34-6.464 19.405 0 17.838 14.512 32.351 32.35 32.351s32.35-14.513 32.35-32.351c0-7.065-2.235-13.775-6.463-19.404-2.076-2.765-2.406-6.403-.86-9.496 1.545-3.093 4.653-5.015 8.11-5.015h91.113c4.142 0 7.5-3.357 7.5-7.5v-215.368c0-13.27-10.796-24.066-24.067-24.066zm9.067 231.935h-83.613c-9.179 0-17.428 5.101-21.529 13.311-4.103 8.211-3.227 17.87 2.285 25.208 2.261 3.011 3.457 6.607 3.457 10.397 0 9.567-7.783 17.351-17.35 17.351s-17.35-7.783-17.35-17.351c0-3.79 1.195-7.386 3.457-10.397 5.512-7.338 6.388-16.997 2.287-25.208-4.102-8.211-12.352-13.312-21.53-13.312l-67.046.001-.002-34.706c36.482.4 66.268-29.109 66.268-65.479 0-36.107-29.375-65.483-65.483-65.483-.262 0-.523.002-.785.005v-51.272h207.868c4.999 0 9.067 4.067 9.067 9.066v207.869z" />
                        <path d="m244.351 431.988c-1.641-1.426-3.818-2.067-5.97-1.763-2.377.337-4.81.508-7.231.508-27.836 0-50.483-22.646-50.483-50.483s22.647-50.483 50.483-50.483c2.422 0 4.857.171 7.235.508 2.155.31 4.329-.338 5.97-1.763s2.583-3.49 2.583-5.663l-.002-50.28c0-4.143-3.358-7.5-7.5-7.5l-74.551.001c-3.458 0-6.566-1.922-8.112-5.016-1.545-3.093-1.215-6.731.863-9.496 4.229-5.631 6.464-12.342 6.464-19.407 0-17.838-14.512-32.351-32.35-32.351s-32.35 14.512-32.35 32.35c0 7.065 2.236 13.777 6.467 19.41 2.077 2.764 2.407 6.402.862 9.495-1.545 3.094-4.653 5.016-8.111 5.016h-91.118c-4.142 0-7.5 3.357-7.5 7.5v215.362c0 13.271 10.796 24.067 24.067 24.067h215.367c4.142 0 7.5-3.357 7.5-7.5v-66.849c0-2.173-.943-4.239-2.583-5.663zm-12.417 65.012h-207.867c-5 0-9.067-4.067-9.067-9.066v-207.863h83.617c9.179 0 17.429-5.102 21.53-13.312 4.102-8.212 3.225-17.871-2.289-25.208-2.263-3.014-3.459-6.609-3.459-10.4 0-9.567 7.783-17.351 17.35-17.351s17.35 7.783 17.35 17.351c0 3.791-1.196 7.387-3.457 10.397-5.515 7.339-6.392 16.999-2.289 25.21 4.102 8.211 12.352 13.311 21.53 13.311l67.051-.001.001 34.703c-.262-.003-.525-.005-.787-.005-36.107 0-65.483 29.376-65.483 65.483s29.376 65.483 65.483 65.483c.261 0 .522-.002.784-.005v51.273z" />
                        <path d="m504.5 265.067h-66.849c-2.173 0-4.24.942-5.664 2.584-1.424 1.641-2.067 3.819-1.761 5.971.337 2.372.508 4.804.508 7.228 0 27.837-22.647 50.483-50.483 50.483s-50.483-22.647-50.483-50.483c0-2.424.171-4.856.508-7.229.306-2.151-.337-4.33-1.761-5.971-1.425-1.642-3.491-2.584-5.664-2.584l-50.28.001c-1.989 0-3.897.79-5.303 2.197-1.407 1.406-2.197 3.314-2.197 5.303l.003 74.55c0 3.458-1.922 6.567-5.016 8.112s-6.733 1.213-9.499-.864c-5.629-4.229-12.34-6.465-19.408-6.465-17.838 0-32.35 14.512-32.35 32.35s14.512 32.35 32.35 32.35c7.065 0 13.775-2.234 19.405-6.462 2.766-2.077 6.404-2.407 9.498-.861 3.093 1.545 5.014 4.652 5.014 8.11v91.113c0 4.143 3.358 7.5 7.5 7.5h169.432c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5h-161.933v-83.613c0-9.179-5.101-17.429-13.311-21.529-8.21-4.102-17.87-3.227-25.21 2.286-3.011 2.261-6.606 3.456-10.397 3.456-9.567 0-17.35-7.783-17.35-17.35s7.783-17.35 17.35-17.35c3.792 0 7.387 1.195 10.397 3.457 7.339 5.516 17.001 6.394 25.211 2.291 8.212-4.102 13.313-12.353 13.313-21.531l-.003-67.05 34.702-.001c-.003.262-.004.522-.004.783 0 36.107 29.376 65.483 65.483 65.483 36.108 0 65.483-29.376 65.483-65.483 0-.261-.001-.522-.004-.782h51.273v207.866c0 4.999-4.067 9.066-9.067 9.066h-16.565c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h16.565c13.27 0 24.067-10.796 24.067-24.066v-215.366c0-4.142-3.358-7.5-7.5-7.5z" />
                    </g>
                </svg>
            </div>
            Planes
        </a>
        <div x-show="openAlimentos">
            <div class="p-1 mt-1">
                <a href="{{ route('planes') }}" class="text-white">
                    Planes nutricionales
                </a>
            </div>
            <div class="p-1 mt-1">
                <a href="{{ route('mis-planes') }}" class="text-white">
                    Mis planes
                </a>
            </div>
        </div>
    </div>

    <div class="flex-col p-1" x-data="{ openAlimentos : false }">
        <a class="border-b border-gray-300 p-1 block text-white" x-on:click="openAlimentos = openAlimentos !== true">
            <div class="inline-block w-5 relative top-1">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="utensils" class="svg-inline--fa fa-utensils fa-w-13" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="m331 352.236c9.464 3.843 19.523 6.516 30 7.828v151.936h30v-151.936c59.115-7.404 105-57.975 105-119.064 0-66.168-53.832-120-120-120-15.906 0-31.096 3.118-45 8.764v-129.764h-216.262l-98.738 99.835v321.165h315zm135-111.236c0 49.626-40.374 90-90 90s-90-40.374-90-90 40.374-90 90-90 90 40.374 90 90zm-360-189.502v39.502h-39.068zm-60 339.502v-270h90v-91h165v117.399c-27.415 22.011-45 55.789-45 93.601s17.585 71.59 45 93.601v56.399z" />
                    <path d="m361 292.213 81.213-81.213-21.213-21.213-60 60-30-30-21.213 21.213z" />
                    <path d="m76 151h150v30h-150z" />
                    <path d="m76 211h150v30h-150z" />
                    <path d="m76 271h150v30h-150z" />
                    <path d="m76 331h150v30h-150z" />
                </svg>
            </div>
            Quiz
        </a>
        <div x-show="openAlimentos">
            <div class="p-1 mt-1">
                <a href="{{ route('preguntas') }}" class="text-white">
                    Preguntas y respuestas
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