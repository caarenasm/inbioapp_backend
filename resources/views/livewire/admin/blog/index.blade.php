<x-app-layout>

    @section('title', 'Entradas del blog')

    <div class="p-2 bg-white">
        <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Entradas del blog</h2>

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Titulo
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Slug
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Estado
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fecha publicación
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Editar</span>
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Eliminar</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($posts as $post)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10"
                                                     src="{{$post->image_url!=null?'/storage/'.$post->image_url:''}}"
                                                     alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{$post->title}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$post->title}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($post->published)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Publicada
                                        </span>
                                        @else
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            No publicada
                                        </span>
                                        @endif

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{date('d/m/Y', strtotime($post->start_date))}}
                                    </td>
                                    <td class="px-1 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <x-html.link text="Editar" href="{{ route('blog.edit', $post) }}"
                                                     isButton="true"/>
                                    </td>
                                    <td class="px-2 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{route('blog.delete', $post->id)}}"
                                           x-on:click="confirmDialog = confirmDialog !== true"
                                           class="justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-color-peligro hover:bg-color-peligro-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-color-peligro-300 eliminar">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach

                            <tr>
                                <td colspan="6">
                                    {{ $posts->links() }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @push('modals')

            <div class="fixed z-10 inset-0 overflow-y-auto hidden" id="modalConfirm" x-show="confirmDialog">
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
                                        Eliminar entrada
                                    </h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">
                                            ¿Estás totalmente seguro/a de eliminar esta entrada? Esta acción no se puede
                                            deshacer.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="button" id="confirmarEliminado"
                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-color-peligro text-base font-medium text-white hover:bg-color-peligro-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-color-peligro-300 sm:ml-3 sm:w-auto sm:text-sm">
                                Eliminar entrada
                            </button>
                            <button type="button"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                    x-on:click="confirmDialog = confirmDialog !== true">
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
            document.addEventListener('livewire:load', function () {
                let enlace = "";
                const modalConfirm = document.getElementById('modalConfirm');
                const botonEliminar = document.getElementById('confirmarEliminado');
                const formEliminar = document.getElementById('deleteForm');
                const deleteLinks = document.querySelectorAll(".eliminar");
                deleteLinks.forEach(function (element) {
                    element.onclick = function (evt) {
                        evt.preventDefault();
                        modalConfirm.classList.remove('hidden');
                        enlace = this.href;
                    }
                });

                botonEliminar.onclick = function () {
                    if (enlace !== "") {
                        formEliminar.action = enlace;
                        formEliminar.submit();
                    }
                }

            })
        </script>
    @endpush

</x-app-layout>
