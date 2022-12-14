<x-app-layout>

    @section('title', 'Categorias de productos')

    <div class="p-2 bg-white">
        <h2 class="text-2xl py-2 text-fondo-verde font-extrabold text-center">Categorías de productos</h2>

        <div class="grid grid-cols-2 space-x-5">

            <div>
                @if($category->id)
                <div class="m-3 p-2 bg-gray-50 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <h3 class="text-xl py-2 text-fondo-verde font-extrabold">Modificar categoría</h3>
                    <form method="post" action="{{route('product-category.update', $category)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @include('livewire/admin/product/form-categoria')

                        <x-forms.button type="submit" text="Guardar modificación" />
                    </form>
                </div>
                @else
                <div class="m-3 p-2 bg-gray-50 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <h3 class="text-xl py-2 text-fondo-verde font-extrabold">Nueva categoría</h3>
                    <form method="post" action="{{route('product-category.store')}}" enctype="multipart/form-data">
                        @csrf
                        @include('livewire/admin/product/form-categoria')

                        <x-forms.button type="submit" text="Agregar categoría" />
                    </form>
                </div>
                @endif

            </div>

            <div>
                <h3 class="text-xl py-2 text-fondo-verde font-extrabold">Categorías existentes</h3>
                @include('livewire/admin/product/tabla-categorias')

            </div>

        </div>

    </div>

    @push('scripts')
    <script>
        document.addEventListener('livewire:load', function() {
            const name = document.getElementById('name');
            const slug = document.getElementById('slug');
            name.onblur = function() {
                slug.value = slugify(name.value);
            }
            name.onkeydown = function() {
                slug.value = slugify(name.value);
            }
            name.onkeyup = function() {
                slug.value = slugify(name.value);
            }
        });

        function slugify(str) {
            str = str.replace(/^\s+|\s+$/g, ''); // trim
            str = str.toLowerCase();

            // remove accents, swap ñ for n, etc
            var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
            var to = "aaaaeeeeiiiioooouuuunc------";

            for (var i = 0, l = from.length; i < l; i++)
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));


            str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes

            return str;
        }
    </script>
    @endpush

    @push('modals')
    <div class="fixed z-10 inset-0 overflow-y-auto hidden" id="modalConfirm" x-show="confirmDialog">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>


            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                Eliminar categoría
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    ¿Estás totalmente seguro/a de eliminar esta categoría? Esta acción no se puede
                                    deshacer.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" id="confirmarEliminado" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-color-peligro text-base font-medium text-white hover:bg-color-peligro-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-color-peligro-300 sm:ml-3 sm:w-auto sm:text-sm">
                        Eliminar categoría
                    </button>
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" x-on:click="confirmDialog = confirmDialog !== true">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>

    </div>

    <form id="deleteForm" action="" method="POST" style="display: none;">
        @csrf
        @method('delete')
    </form>
    @endpush

    @push('scripts')
    <script>
        document.addEventListener('livewire:load', function() {
            let enlace = "";
            const modalConfirm = document.getElementById('modalConfirm');
            const botonEliminar = document.getElementById('confirmarEliminado');
            const formEliminar = document.getElementById('deleteForm');
            const deleteLinks = document.querySelectorAll(".eliminar");
            deleteLinks.forEach(function(element) {
                element.onclick = function(evt) {
                    evt.preventDefault();
                    modalConfirm.classList.remove('hidden');
                    enlace = this.href;
                }
            });

            botonEliminar.onclick = function() {
                if (enlace !== "") {
                    formEliminar.action = enlace;
                    formEliminar.submit();
                }
            }

            //Cambiar imagen
            document.getElementById("imagen").addEventListener('change', cambiarImagen);

            function cambiarImagen(event) {
                var file = event.target.files[0];

                var reader = new FileReader();
                reader.onload = (event) => {
                    document.getElementById("miniatura").setAttribute('src', event.target.result);
                };

                reader.readAsDataURL(file);
            }

        })
    </script>
    @endpush

</x-app-layout>