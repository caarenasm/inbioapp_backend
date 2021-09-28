    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />

    <div class="h-full flex flex-row bg-gray-100">
        <div class="flex flex-col w-80 bg-fondo-verde rounded-br-3xl overflow-hidden">
            <ul class="flex flex-col py-4">
                @can('editar_admin_editor')
                    <li>
                        <a href="{{ route('escritorio') }}"
                            class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                            <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                    class="bx bx-home"></i></span>
                            <span class="text-base font-medium text-white">Dashboard</span>
                        </a>
                    </li>
                    <div x-data="{ openEnfermedades : false }">
                        <li>
                            <a href="#"
                                class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                x-on:click="openEnfermedades = openEnfermedades !== true">
                                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                        class="bx bx-band-aid"></i></span>
                                <span class="text-base font-medium text-white ">Sección Enfermedades</span>
                            </a>
                        </li>

                        <div x-show="openEnfermedades">
                            <li>
                                <a href="{{ route('tipos-enfermedades.index') }}"
                                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                    x-on:click="openEnfermedades = openEnfermedades !== true">
                                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                            class=""></i></span>
                            <span class=" text-base
                                            font-medium text-white">Tipo de enfermedades</span>
                                </a>
                                <a href="{{ route('enfermedades.index') }}"
                                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                    x-on:click="openEnfermedades = openEnfermedades !== true">
                                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                            class=""></i></span>
                            <span class=" text-base
                                            font-medium text-white">Enfermedades</span>
                                </a>
                                <a href="{{ route('semaforos-estados.index') }}"
                                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                    x-on:click="openEnfermedades = openEnfermedades !== true">
                                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                            class=""></i></span>
                            <span class=" text-base
                                            font-medium text-white">Semaforo estados</span>
                                </a>
                            </li> 
                        </div>
                    </div>
                    <div x-data="{ openAlimentos : false }">
                        <li>
                            <a href="#"
                                class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                x-on:click="openAlimentos = openAlimentos !== true">
                                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                        class="bx bx-fridge"></i></span>
                                <span class="text-base font-medium text-white">Sección Alimentos</span>
                            </a>
                        </li>

                        <div x-show="openAlimentos">
                            <li>
                                <a href="{{ route('categoria-alimentos') }}"
                                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                    x-on:click="openAlimentos = openAlimentos !== true">
                                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                            class=""></i></span>
                            <span class=" text-base
                                            font-medium text-white">Categorías de alimentos</span>
                                </a>
                                <a href="{{ route('alimentos') }}"
                                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                    x-on:click="openAlimentos = openAlimentos !== true">
                                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                            class=""></i></span>
                            <span class=" text-base
                                            font-medium text-white">Alimentos</span>
                                </a>
                                <a href="{{ route('recetas') }}"
                                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                    x-on:click="openAlimentos = openAlimentos !== true">
                                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                            class=""></i></span>
                            <span class=" text-base
                                            font-medium text-white">Recetas</span>
                                </a>
                            </li>
                        </div>
                    </div>
                    <div x-data="{ openPlanes : false }">
                        <li>
                            <a href="#"
                                class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                x-on:click="openPlanes = openPlanes !== true">
                                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                        class='bx bx-detail'></i></span>
                                <span class="text-base font-medium text-white">Sección Planes y Objetivos</span>
                            </a>
                        </li>

                        <div x-show="openPlanes">
                            <li>
                                <a href="{{ route('planes') }}"
                                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                    x-on:click="openPlanes = openPlanes !== true">
                                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                            class=""></i></span>
                            <span class=" text-base
                                            font-medium text-white">Planes nutricionales</span>
                                </a>
                                <a href="{{ route('objetivos') }}"
                                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                    x-on:click="openPlanes = openPlanes !== true">
                                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                            class=""></i></span>
                            <span class=" text-base
                                            font-medium text-white">Objetivos nutricionales</span>
                                </a>
                            </li>
                        </div>
                    </div>
                    <div x-data="{ openPreguntas : false }">
                        <li>
                            <a href="#"
                                class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                x-on:click="openPreguntas = openPreguntas !== true">
                                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                        class='bx bx-book-open'></i></span>
                                <span class="text-base font-medium text-white">Sección Quiz</span>
                            </a>
                        </li>

                        <div x-show="openPreguntas">
                            <li>
                                <a href="{{ route('preguntas') }}"
                                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                    x-on:click="openPreguntas = openPreguntas !== true">
                                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                            class=""></i></span>
                            <span class=" text-base
                                            font-medium text-white">Preguntas y Respuestas</span>
                                </a>
                            </li>
                        </div>
                    </div>
                    <div x-data="{ openEventos : false }">
                        <li>
                            <a href="#"
                                class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                x-on:click="openEventos = openEventos !== true">
                                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                        class='bx bx-calendar-event'></i></span>
                                <span class="text-base font-medium text-white">Sección de Eventos</span>
                            </a>
                        </li>

                        <div x-show="openEventos">
                            <li>
                                <a href="{{ route('tipo-eventos.index') }}"
                                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                    x-on:click="openEventos = openEventos !== true">
                                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                            class=""></i></span>
                            <span class=" text-base
                                            font-medium text-white">Tipo de eventos</span>
                                </a>
                                <a href="{{ route('eventos.index') }}"
                                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                    x-on:click="openEventos = openEventos !== true">
                                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                            class=""></i></span>
                            <span class=" text-base
                                            font-medium text-white">Eventos</span>
                                </a>
                            </li>
                        </div>
                    </div>
                    <div x-data="{ openBlog : false }">
                        <li>
                            <a href="#"
                                class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                x-on:click="openBlog = openBlog !== true">
                                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                        class='bx bx-paper-plane'></i></span>
                                <span class="text-base font-medium text-white">Sección Blog</span>
                            </a>
                        </li>

                        <div x-show="openBlog">
                            <li>
                                <a href="{{ route('blog') }}"
                                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                    x-on:click="openBlog = openBlog !== true">
                                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                            class=""></i></span>
                            <span class=" text-base
                                            font-medium text-white">Ver entradas</span>
                                </a>
                                <a href="{{ route('blog.create') }}"
                                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                    x-on:click="openBlog = openBlog !== true">
                                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                            class=""></i></span>
                            <span class=" text-base
                                            font-medium text-white">Nueva entrada</span>
                                </a>
                                <a href="{{ route('blog-category') }}"
                                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                    x-on:click="openBlog = openBlog !== true">
                                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                            class=""></i></span>
                            <span class=" text-base
                                            font-medium text-white">Categorias para el blog</span>
                                </a>
                            </li>
                        </div>
                    </div>
                    <div x-data="{ openProductos : false }">
                        <li>
                            <a href="#"
                                class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                x-on:click="openProductos = openProductos !== true">
                                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                        class='bx bx-shopping-bag'></i></span>
                                <span class="text-base font-medium text-white">Sección Productos</span>
                            </a>
                        </li>

                        <div x-show="openProductos">
                            <li>
                                <a href="{{ route('producto') }}"
                                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                    x-on:click="openProductos = openProductos !== true">
                                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                            class=""></i></span>
                            <span class=" text-base
                                            font-medium text-white">Ver productos</span>
                                </a>
                                <a href="{{ route('producto.create') }}"
                                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                    x-on:click="openProductos = openProductos !== true">
                                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                            class=""></i></span>
                            <span class=" text-base
                                            font-medium text-white">Nuevo producto</span>
                                </a>
                                <a href="{{ route('product-category') }}"
                                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                    x-on:click="openProductos = openProductos !== true">
                                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                            class=""></i></span>
                            <span class=" text-base
                                            font-medium text-white">Categorias para el producto</span>
                                </a>
                            </li>
                        </div>
                    </div>
                    <div x-data="{ openLecturas : false }">
                        <li>
                            <a href="#"
                                class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                x-on:click="openLecturas = openLecturas !== true">
                                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                        class='bx bx-message-edit'></i></span>
                                <span class="text-base font-medium text-white">Sección Lecturas (Diario)</span>
                            </a>
                        </li>

                        <div x-show="openLecturas">
                            <li>
                                <a href="{{ route('categorias-diarios.index') }}"
                                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                    x-on:click="openLecturas = openLecturas !== true">
                                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                            class=""></i></span>
                            <span class=" text-base
                                            font-medium text-white">Categoria Diario</span>
                                </a>
                                <a href="{{ route('tipos-lecturas.index') }}"
                                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                    x-on:click="openLecturas = openLecturas !== true">
                                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                            class=""></i></span>
                            <span class=" text-base
                                            font-medium text-white">Tipos de lecturas</span>
                                </a>
                                <a href="{{ route('subtipos-lecturas.index') }}"
                                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                    x-on:click="openLecturas = openLecturas !== true">
                                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                            class=""></i></span>
                            <span class=" text-base
                                            font-medium text-white">Subtipo de Lecturas</span>
                                </a>
                            </li>
                        </div>
                    </div>
                    @endcan
                    <div x-data="{ openUsuarios : false }">
                        <li>
                            <a href="#"
                                class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                x-on:click="openUsuarios = openUsuarios !== true">
                                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                        class='bx bx-user-check'></i></span>
                                <span class="text-base font-medium text-white">Sección Usuarios</span>
                            </a>
                        </li>
                    <div x-show="openUsuarios">
                        <li>
                            @can('editar_admin_editor')
                                <a href="{{ route('usuarios') }}"
                                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                    x-on:click="openUsuarios = openUsuarios !== true">
                                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                            class=""></i></span>
                            <span class=" text-base
                                            font-medium text-white">Usuarios registrados</span>
                                </a>
                            @endcan
                            <a href="{{ route('informacion.index') }}"
                                class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                x-on:click="openUsuarios = openUsuarios !== true">
                                <span
                                    class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                        class=""></i></span>
                            <span class=" text-base
                                        font-medium text-white">Información de los usuarios - Diario</span>
                            </a>
                        </li>
                    </div>
                </div>
                <div>
                    <li>
                        <a href="{{ route('profile.show') }}"
                            class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                            x-on:click="openMiPerfil = openMiPerfil !== true">
                            <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                    class='bx bx-user'></i></span>
                            <span class=" text-base font-medium text-white">Mi
                                Perfil</span>
                        </a>
                    </li>
                </div>
                <div>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <span
                                    class="inline-flex items-center justify-center h-12 w-12 text-lg text-white"><i
                                        class='bx bx-log-out'></i></span>
                                <span class=" text-base
                                    font-medium text-white">Cerrar
                                    Sesión</span>
                            </a>
                        </form>
                    </li>
                </div>
            </ul>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:load', function() {

        })
    </script>
