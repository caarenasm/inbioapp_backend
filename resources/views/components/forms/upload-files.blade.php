<article aria-label="File Upload Modal" class="relative h-full flex flex-col bg-white shadow-xl rounded-md">

    <!-- scroll area -->
    <section class="h-full overflow-auto p-8 w-full h-full flex flex-col" ondrop="dropHandler(event);"
             ondragover="dragOverHandler(event);" ondragleave="dragLeaveHandler(event);"
             ondragenter="dragEnterHandler(event);">
        <header class="border-dashed border-2 border-gray-400 py-12 flex flex-col justify-center items-center">
            <p class="mb-3 font-semibold text-gray-900 flex flex-wrap justify-center">
                <span>Arrastra tus imágenes aquí</span>&nbsp;<span>para subirlas o</span>
            </p>
            <input id="hidden-input" type="file" name="imagenes[]" multiple class="hidden"/>
            <button type="button" id="button"
                    class="mt-2 rounded-sm px-3 py-1 bg-gray-200 hover:bg-gray-300 focus:shadow-outline focus:outline-none">
                Selecciona una imagen
            </button>
        </header>

        <h1 class="pt-8 pb-3 font-semibold sm:text-lg text-gray-900">
            Se subirán las imágenes
        </h1>

        <ul id="gallery" class="flex flex-1 flex-wrap -m-1">
            <li id="empty" class="h-full w-full text-center flex flex-col items-center justify-center items-center">
                <img class="mx-auto w-32"
                     src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png"
                     alt="no data"/>
                <span class="text-small text-gray-500">No has seleccionado archivos</span>
            </li>
        </ul>

    </section>

    @if($imagenes != null)
        <section class="h-full overflow-auto p-8 w-full h-full flex flex-col">

            <h1 class="pt-8 pb-3 font-semibold sm:text-lg text-gray-900">
                Imágenes existentes
            </h1>

            <ul id="imagenesExistentes" class="grid grid-cols-6 -m-1">
                @foreach($imagenes as $imagen)
                    <li class="h-full">
                        <img src="/storage/{{$imagen->url}}" alt="no data"/>
                        <input type="hidden" name="orden[]" value="{{$imagen->id}}">
                        <p class="text-center">
                            <svg class="w-1/6 mx-auto text-red-400 cursor-pointer eliminarImagen"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </p>
                    </li>
                @endforeach
            </ul>

        </section>
    @endif
</article>

<template id="image-template">
    <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">
        <article tabindex="0"
                 class="group hasImage w-full h-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-transparent hover:text-white shadow-sm">
            <img alt="upload preview" class="img-preview w-full h-full sticky object-cover rounded-md bg-fixed"/>

            <section class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                <h1 class="flex-1"></h1>
                <div class="flex">
              <span class="p-1">
                <i>
                  <svg class="fill-current w-4 h-4 ml-auto pt-" xmlns="http://www.w3.org/2000/svg" width="24"
                       height="24" viewBox="0 0 24 24">
                    <path
                        d="M5 8.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5zm9 .5l-2.519 4-2.481-1.96-4 5.96h14l-5-8zm8-4v14h-20v-14h20zm2-2h-24v18h24v-18z"/>
                  </svg>
                </i>
              </span>

                    <p class="p-1 size text-xs"></p>

                </div>
            </section>
        </article>
    </li>
</template>

@push('scripts')
    <script src="/js/sortable.min.js"></script>
    <script>
        @if($imagenes != null)
        const el = document.getElementById('imagenesExistentes');
        Sortable.create(el);

        // Eliminar imagen
        document.addEventListener('livewire:load', function () {
            const modalConfirm = document.getElementById('modalConfirm');
            const botonEliminar = document.getElementById('confirmarEliminado');
            const botonCancelar = document.getElementById('cancelarEliminado');
            const deleteLinks = document.querySelectorAll(".eliminarImagen");
            let elementoAEliminar = null;
            deleteLinks.forEach(function (element) {
                element.onclick = function (evt) {
                    evt.preventDefault();
                    elementoAEliminar = this.parentElement.parentElement;
                    modalConfirm.classList.remove('hidden');
                }
            });

            botonEliminar.onclick = function () {
                if (elementoAEliminar !== null) {
                    elementoAEliminar.remove();
                    elementoAEliminar = null;
                    modalConfirm.classList.add('hidden');
                }
            }
            botonCancelar.onclick = function(){
                modalConfirm.classList.add('hidden');
            }
        })

        @endif

        const imageTempl = document.getElementById("image-template"),
            empty = document.getElementById("empty");

        const gallery = document.getElementById("gallery");

        // click the hidden input of type file if the visible button is clicked
        // and capture the selected files
        const hidden = document.getElementById("hidden-input");

        // check if file is of type image and prepend the initialied
        // template to the target element
        function addFile(target, file) {
            const isImage = file.type.match("image.*"),
                objectURL = URL.createObjectURL(file);

            if (!isImage) {
                return;
            }

            const clone = imageTempl.content.cloneNode(true);

            clone.querySelector("h1").textContent = file.name;
            clone.querySelector("li").id = objectURL;
            clone.querySelector(".size").textContent =
                file.size > 1024
                    ? file.size > 1048576
                    ? Math.round(file.size / 1048576) + "mb"
                    : Math.round(file.size / 1024) + "kb"
                    : file.size + "b";

            isImage &&
            Object.assign(clone.querySelector("img"), {
                src: objectURL,
                alt: file.name
            });

            empty.classList.add("hidden");
            target.prepend(clone);
        }

        function clearUpload() {
            while (gallery.children.length > 0) {
                gallery.lastChild.remove();
            }
        }

        document.getElementById("button").onclick = () => hidden.click();
        hidden.onchange = (e) => {
            e.preventDefault();
            clearUpload();
            const maximoSubida = 10000000;
            let subido = 0;
            for (const file of e.target.files) {
                subido += file.size;
                if(subido < maximoSubida) {
                    addFile(gallery, file);
                }
            }
            if(subido > maximoSubida) {
                alert('Se ha limitado el número de imagenes a subir por cuestiones de servidor, si quiere subir más, primero guarde el producto y luego agregue más imágenes.');
            }
        };

        function dropHandler(ev) {
            ev.preventDefault();
            hidden.files = ev.dataTransfer.files;
            ev.target.files = ev.dataTransfer.files;
            hidden.onchange(ev);
        }

        function dragEnterHandler(e) {
            e.preventDefault();
        }

        function dragLeaveHandler(e) {
            e.preventDefault();
        }

        function dragOverHandler(e) {
            e.preventDefault();
        }

    </script>
@endpush

@push('modals')

    <div class="fixed z-10 inset-0 overflow-y-auto hidden" id="modalConfirm">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>


            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                Eliminar imagen
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    ¿Estás totalmente seguro/a de eliminar esta imagen? Igualmente debes guardar el producto para que se elimine completamente.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" id="confirmarEliminado"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-color-peligro text-base font-medium text-white hover:bg-color-peligro-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-color-peligro-300 sm:ml-3 sm:w-auto sm:text-sm">
                        Eliminar imagen
                    </button>
                    <button type="button" id="cancelarEliminado"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>

    </div>
@endpush
