<!doctype html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="/vendor/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="/css/estilos.css">
        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')">
        <link rel="canonical" href="@yield('canonicalUrl')">
    </head>
    <body>
        <header>
            <div class="top">
                <div class="contact-buttons">
                    <a class="btn black-text black-hover normal-weight"><i class="fa fa-phone-alt"></i> Llámanos</a>
                    <a href="{{ route('contacto') }}" class="btn black-text black-hover normal-weight"><i class="fa fa-envelope"></i> Contáctanos</a>
                </div>
            </div>
            <div class="bottom">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="/imagenes/logo.png">
                    </a>
                </div>

                <input type="checkbox" id="nav-toggle" name="nav-toggle">

                <nav>
                    <ul>
                        <li>
                            <a href="#">Tienda</a>
                        </li>
                        <li>
                            <a href="#">Servicios</a>
                        </li>
                        <li>
                            <a href="#">Nuestra Granja</a>
                        </li>
                        <li>
                            <a href="{{ route('nosotros') }}">Quiénes Somos</a>
                        </li>
                        <li>
                            <a href="#">Artículos de interés</a>
                        </li>
                        <li>
                            <a href="#">Estudio de Caso</a>
                        </li>
                        <li>
                            <a href="#">Distribuidores</a>
                        </li>
                    </ul>
                </nav>

                <label for="nav-toggle" class="nav-toggle-label">
                    <span></span>
                </label>
            </div>
        </header>

        @yield('content')

        <footer>
            <section class="top">
                <div class="links">

                    <ul>
                        <li>
                            <a href="#">Preguntas frecuentes</a>
                        </li>
                        <li>
                            <a href="#">Términos de uso</a>
                        </li>
                        <li>
                            <a href="#">Políticas de privacidad</a>
                        </li>
                        <li>
                            <a href="#">Contáctenos</a>
                        </li>
                        <li>
                            <a href="#">Distribuidores</a>
                        </li>
                    </ul>
                </div>
                <div class="news">
                    <p>¡No te pierdas de todas nuestra novedades!</p>
                    <p>
                        <a><i class="fab fa-facebook"></i></a>
                        <a><i class="fab fa-instagram"></i></a>
                        <a><i class="fab fa-spotify"></i></a>
                        #NuticiónEsencial</p>
                </div>
                <div class="newsletter">
                    <div class="formNewsletterFooter">
                        <form action="" method="POST">
                            <p class="title"><strong>Suscríbete a nuestro boletín</strong> de correo electrónico</p>
                            <p>Digita aquí tu correo electrónico</p>
                            <input type="text">
                            <p>Al registrarte estás aceptando nuestros términos y políticas de privacidad</p>
                            <button>Enviar</button>
                        </form>
                    </div>
                </div>
            </section>
            <section class="bottom"></section>
        </footer>
        @yield('scripts')
    </body>
</html>
