<x-app-layout>

    @section('title', 'Nuevo producto')

    <div class="p-2 bg-white">
        <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Nuevo producto</h2>
        <form method="post" action="{{ route('producto.store')  }}" enctype="multipart/form-data">
            @csrf
            @include('livewire.admin.product.formulario', ['btnText' => 'Crear producto'])
        </form>

    </div>

    @push('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>

        <script>
            document.addEventListener('livewire:load', function () {
                const title = document.getElementById('title');
                const slug = document.getElementById('slug');
                title.onblur = function () {
                    slug.value = slugify(title.value);
                }
                title.onkeydown = function () {
                    slug.value = slugify(title.value);
                }
                title.onkeyup = function () {
                    slug.value = slugify(title.value);
                }

                ClassicEditor
                    .create(document.querySelector('#description'))
                    .catch(error => {
                        console.error(error);
                    });

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
</x-app-layout>
