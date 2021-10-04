@extends('layouts.public-plantilla')

@section('title', 'Inbionova - Crea con nosotros un mundo mejor nutrido')
@section('description', 'Tomas mejores decisiones al comer, y mejoras la calidad nutricional de tu alimentación.')
@section('canonicalUrl', 'http://inbionova.com.co/contactenos')
@section('pagina', 'contactenos')

@section('content')

    <section class="contacto-header">
        <div class="left">
            <img src="/imagenes/contacto/fondo-header.png">
        </div>
        <div class="right">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3977.334032498343!2d-75.67303478523826!3d4.533736396705947!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e38f5ac52dafc4d%3A0xdf72747e6a1eec47!2sCra.%2013%20%2316-57%2C%20Armenia%2C%20Quind%C3%ADo%2C%20Colombia!5e0!3m2!1ses!2sde!4v1631168628193!5m2!1ses!2sde" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>

    <section class="contact-form">
        <div class="left">
            <form action="" method="post">
                <h2>Comunícate con nosotros</h2>

                <div class="form-element">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre">
                </div>
                <div class="form-element">
                    <label for="email">E-mail:</label>
                    <input type="text" name="email" id="email">
                </div>
                <div class="form-element">
                    <label for="subject">Motivo de la consulta</label>
                    <select name="subject" id="subject">
                        <option value="Agendar cita para la granja">Agendar cita para la granja</option>
                        <option value="Consulta Nutricional personalizada">Consulta Nutricional personalizada</option>
                        <option value="Coaching de Huertas familiares">Coaching de Huertas familiares</option>
                        <option value="Coaching en agroecología">Coaching en agroecología</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
                <div class="form-element">
                    <label for="message">¿Cómo podemos ayudarte?</label>
                    <textarea name="message" id="message"></textarea>
                </div>
                <button type="submit" class="button">Enviar</button>
            </form>
        </div>
        <div class="right">
            <h4>Dirección y Horarios de Atención</h4>

            <p><strong>Eco-Granja La Esperanza</strong></p>
            <p>Km2 Vereda Bohemia, Calarcá, Quindío</p>
            <p>Planta de fabricación de Fertilizantes y Acondicionadores de Suelos (Resolución ICA No102867)</p>
            <p>Lunes a Viernes de 7:00 am a 4:00 p.m. (Jornada contínua)</p>
            <br>
            <p><strong>Centro Nutricional Inbionova</strong></p>
            <p>Calle 13 # 16-57 Esquina, Local 1, Armenia, Quindío</p>
            <p>Lunes a Viernes de 8:00 am a 5:00 p.m. (Jornada contínua)</p>

            <h4>Contacto por departamento</h4>
            <div class="department">
                <p><strong>Servicio al Cliente</strong></p>
                <p>Tel.: +57 3015047391</p>
                <p>marketing@agrosol.com.co</p>
                <p>servicioalcliente@agrosol.com.co</p>
            </div>
            <div class="department">
                <p><strong>Departamento Comercial</strong></p>
                <p>Olga Liliana García</p>
                <p>Directora Comercial</p>
                <p>Tel.: +57 304 6519753</p>
                <p>fidelizacioninbionova@gmail.com</p>
            </div>
            <div class="department">
                <p><strong>Coaching Huertas</strong></p>
                <p>Tel.: +57 3015047391</p>
                <p>coachuertasinbionova@gmail.com</p>
            </div>
            <div class="department">
                <p><strong>Coaching Nutrición</strong></p>
                <p>Tel.: +57 3015047391</p>
                <p>coachnutricion@agrosol.com.co</p>
            </div>
            <div class="department">
                <p><strong>Conviértete en distribuidor</strong></p>
                <p>Tel.: +57 3015047391</p>
                <p>gerencia@agrosol.com.co</p>
            </div>
            <div class="department">
                <p><strong>Contact in English and Other Countries</strong></p>
                <p>Tel.: +49 15257611885</p>
                <p>bdcinbionovasas@gmail.com</p>
            </div>
        </div>
    </section>

    <section class="distribution">
        <div class="left">
            <img src="/imagenes/contacto/img-2.png">
        </div>
        <div class="right">
            <h2>Nuestros Distribuidores</h2>

            <div class="accordeon">
                <div class="part active">
                    <div class="header">
                        <span>Armenia</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M492,236H20c-11.046,0-20,8.954-20,20c0,11.046,8.954,20,20,20h472c11.046,0,20-8.954,20-20S503.046,236,492,236z"/></svg>
                    </div>
                    <div class="info">
                        <p class="title">CASA MATRIZ / LORENA ARISTIZABAL</p>
                        <p>Calle 6 Norte #17-72</p>
                        <p>Tel.: +57 3008405349</p>
                        <p>lorearisgo@gmail.com</p>
                    </div>
                </div>

                <div class="part">
                    <div class="header">
                        <span>Bogotá</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M492,236H276V20c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v216H20c-11.046,0-20,8.954-20,20s8.954,20,20,20h216
			v216c0,11.046,8.954,20,20,20s20-8.954,20-20V276h216c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z"/></svg>
                    </div>
                    <div class="info">
                        <p class="title">CARLOS ZAMUDIO</p>
                        <p>CALLE 137 A #73-30 Casa 10, Bosques de Gratamira 2</p>
                        <p>Tel.: +57 3165214482</p>
                        <p>carloszamudiog@gmail.com</p>
                        <p class="title">FARMACIA HOMEOPATÍA SENDERO DEL SER</p>
                        <p>Calle 106 No 54-81</p>
                        <p>Tels: (1) 6242332 / 6242335</p>
                        <p>farmaciaser@gmail.com</p>
                    </div>
                </div>
                <div class="part">
                    <div class="header">
                        <span>Puerto Colombia</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M492,236H276V20c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v216H20c-11.046,0-20,8.954-20,20s8.954,20,20,20h216
			v216c0,11.046,8.954,20,20,20s20-8.954,20-20V276h216c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z"/></svg>

                    </div>
                    <div class="info">
                        <p class="title">PAOLA VILLADIEGO</p>
                        <p>Ing. De procesos Químicos</p>
                        <p>Coach en Hábitos saludables</p>
                        <p>Tel.: +57 3012205572</p>
                        <p>pvilladi@hotmail.com</p>
                        <p>Instagram: @paotequierebien</p>
                        <p>Facebook: @paolavilladiegoblog</p>
                    </div>
                </div>
                <div class="part">
                    <div class="header">
                        <span>Ibagué</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M492,236H276V20c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v216H20c-11.046,0-20,8.954-20,20s8.954,20,20,20h216
			v216c0,11.046,8.954,20,20,20s20-8.954,20-20V276h216c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z"/></svg>

                    </div>
                    <div class="info">
                        <p class="title">HECTOR EDUARDO VARGAS / AGRODESPENSA</p>
                        <p>Médico veterinario / Tienda agropecuaria</p>
                        <p>CALLE 28 # 4D – 04 LOCAL 3 Barrio Hipódromo</p>
                        <p>Tels.: +57 3153108120 - +57 3176434802</p>
                        <p>agrodespensa@gmail.com</p>
                    </div>
                </div>
                <div class="part">
                    <div class="header">
                        <span>Medellín</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M492,236H276V20c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v216H20c-11.046,0-20,8.954-20,20s8.954,20,20,20h216
			v216c0,11.046,8.954,20,20,20s20-8.954,20-20V276h216c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z"/></svg>

                    </div>
                    <div class="info">
                        <p class="title">ANDRÉS FELIPE FORBES PAREJA</p>
                        <p>CLL. 80 # 72 A -411 BL. 54 APT 215</p>
                        <p>Tels.: (4) 4416074 - +57 3128319398</p>
                        <p>pipeforbes@gmail.com</p>
                    </div>
                </div>
                <div class="part">
                    <div class="header">
                        <span>Santiago de Cali</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M492,236H276V20c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v216H20c-11.046,0-20,8.954-20,20s8.954,20,20,20h216
			v216c0,11.046,8.954,20,20,20s20-8.954,20-20V276h216c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z"/></svg>

                    </div>
                    <div class="info">
                        <p class="title">FUNDACION JUAN MANUEL COLLAZOS</p>
                        <p>Av. Pasoancho con CRA 80 C.C. San Andresito del Sur Of 301</p>
                        <p>Tel.: +57 3113682907</p>
                        <p>fundacionjuanmanuelcollazos@gmail.com</p>

                        <p class="title">EDGAR IGNACIO CASTILLO BERMÚDEZ</p>
                        <p>Calle 49 Nte.#3CN-79</p>
                        <p>Tel.: +57 3154791156</p>
                        <p>castillobermudez64@gmail.com</p>
                    </div>
                </div>
                <div class="part">
                    <div class="header">
                        <span>Villavicencio</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M492,236H276V20c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v216H20c-11.046,0-20,8.954-20,20s8.954,20,20,20h216
			v216c0,11.046,8.954,20,20,20s20-8.954,20-20V276h216c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z"/></svg>

                    </div>
                    <div class="info">
                        <p class="title">SANTOS AMIN RIOS CERON</p>
                        <p>CALLE 34 # 49 – 59, La Azotea</p>
                        <p>Tels.: +57 3125227640</p>
                        <p>Sarice_1@hotmail.com</p>
                    </div>
                </div>

                <div class="part">
                    <div class="header">
                        <span>Estados Unidos</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M492,236H276V20c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v216H20c-11.046,0-20,8.954-20,20s8.954,20,20,20h216
			v216c0,11.046,8.954,20,20,20s20-8.954,20-20V276h216c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z"/></svg>

                    </div>
                    <div class="info">
                        <p class="title">DANIELA TALERO</p>
                        <p>Tel.: +1 (786) 817-9463</p>
                        <p>Dtalero@live.com</p>
                    </div>
                </div>
                <div class="part">
                    <div class="header">
                        <span>México</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M492,236H276V20c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v216H20c-11.046,0-20,8.954-20,20s8.954,20,20,20h216
			v216c0,11.046,8.954,20,20,20s20-8.954,20-20V276h216c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z"/></svg>

                    </div>
                    <div class="info">
                        <p class="title">WISTON YANDÚN</p>
                        <p>Coach en Salud y Nutrición Inbionova</p>
                        <p>Dr. en Terapia Familiar Integral</p>
                        <p>Mentor Espiritual y Master en Liderazgo</p>
                        <p>Tel.: +52 1 33 3717 4220</p>
                        <p>wistonyandun@gmail.com</p>
                    </div>
                </div>

                <div class="part">
                    <div class="header">
                        <span>Alemania</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M492,236H276V20c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v216H20c-11.046,0-20,8.954-20,20s8.954,20,20,20h216
			v216c0,11.046,8.954,20,20,20s20-8.954,20-20V276h216c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z"/></svg>

                    </div>
                    <div class="info">
                        <p class="title">MARIA SCHUSTER</p>
                        <p>Consultora en Desarrollo de Negocio de Inbionova</p>
                        <p>Candidata a Coach Nutricional Vegano</p>
                        <p>Tel.: +49 15257611885</p>
                    </div>
                </div>

            </div>
        </div>
    </section>


@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){

            $('.part').click(function(){
                if (!$(this).hasClass('active')) {
                    $('.part.active .info').slideUp(300);
                    $('.part').removeClass('active');
                    $(this).children('.info').slideDown(300);
                    $(this).addClass('active');
                }
            });

        });
    </script>
@endsection