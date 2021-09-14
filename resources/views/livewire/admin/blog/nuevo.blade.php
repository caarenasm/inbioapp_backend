<x-app-layout>

    @section('title', 'Nueva entrada')

    <div class="p-2 bg-white">
        <h2 class="text-2xl py-2 text-fondo-verde font-extrabold text-center">Blog</h2>
        <form method="post" action="{{ route('blog.store')  }}" enctype="multipart/form-data">
            @csrf
            @include('livewire.admin.blog.formulario', ['btnText' => 'Crear entrada','h2'=>'Nuevo entrada'])
        </form>
    </div>

    @push('scripts')
    <script>
        document.getElementById("image_url").addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }

    </script>
        <script src="/js/ckeditor5.js"></script>

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

                // CK Editor
                ClassicEditor
                    .create( document.querySelector( '#text' ), {
                        toolbar: {
                            items: [
                                'heading',
                                '|',
                                'bold',
                                'italic',
                                'link',
                                'bulletedList',
                                'numberedList',
                                '|',
                                'imageUpload',
                                'blockQuote',
                                'insertTable',
                                'mediaEmbed',
                                'undo',
                                'redo'
                            ]
                        },
                        language: 'es',
                        image: {
                            toolbar: [ 'imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight',
                                '|',
                                'resizeImage',
                                '|',
                                'imageTextAlternative' ],
                            styles: [
                                'alignLeft', 'alignCenter', 'alignRight'
                            ],
                        },
                        table: {
                            contentToolbar: [
                                'tableColumn',
                                'tableRow',
                                'mergeTableCells'
                            ]
                        },
                        simpleUpload: {
                            uploadUrl: '{{ route('blog.imagen') }}',
                            headers: {

                            }
                        },
                    } )
                    .then( editor => {
                        window.editor = editor;
                    } )
                    .catch( error => {
                        console.error( 'Oops, something went wrong!' );
                        console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
                        console.warn( 'Build id: smh51lc3zo1f-qavakagvqr26' );
                        console.error( error );
                    } );
                // CK Editor fin

                //Cambiar imagen
                document.getElementById("imagen").addEventListener('change', cambiarImagen);

                function cambiarImagen(event) {
                    var file = event.target.files[0];

                    var reader = new FileReader();
                    reader.onload = (event) => {
                        document.getElementById("imagenPrincipal").setAttribute('src', event.target.result);
                    };

                    reader.readAsDataURL(file);
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
</x-app-layout>
