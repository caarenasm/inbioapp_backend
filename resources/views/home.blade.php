@extends('layouts.public-plantilla')

@section('title', 'Inbionova - Crea con nosotros un mundo mejor nutrido')
@section('description', 'Tomas mejores decisiones al comer, y mejoras la calidad nutricional de tu alimentación.')
@section('canonicalUrl', 'http://inbionova.com.co/')
@section('pagina', 'home')

@section('content')

    <section class="home-newsletter">
        <div class="fondo">
            <p class="title">Crea con nosotros un mundo mejor nutrido más saludable y sostenible todos los días</p>
            <form action="" method="POST">
                <input type="text" placeholder="Digita tu correo electrónico">

                <button>Enviar</button>
            </form>
        </div>
    </section>

    <section class="home-timeline">
        <hr>
        <div class="top">
            <div class="circle special">
                <div class="content">
                    <p><strong>Tienes un reto: Cambiar tus hábitos nutricionales y de vida;</strong> y de paso crear un
                        impacto real en el mundo.</p>
                </div>
            </div>
            <div class="circle">
                <img src="/imagenes/home/timeline/evento-1.png">
            </div>
            <div class="circle">
                <img src="/imagenes/home/timeline/evento-2.png">
            </div>
            <div class="circle">
                <img src="/imagenes/home/timeline/evento-3.png">
            </div>
            <div class="circle">
                <img src="/imagenes/home/timeline/evento-4.png">
            </div>
            <div class="circle">
                <img src="/imagenes/home/timeline/evento-5.png">
            </div>
            <div class="circle">
                <img src="/imagenes/home/timeline/evento-6.png">
            </div>
        </div>
        <div class="bottom">
            <div class="text">

            </div>
            <div class="text">
                <p>Los alimentos que se producen en el campo son de baja calidad nutricional, debido a la
                    desmineralización de suelos y trazas de plaguicidas en ellos.</p>
            </div>
            <div class="text">
                <p>Te das cuenta que tu nutrición y estilo de vida estan afectando tu salud, tu mente y el medio
                    ambiente.</p>
            </div>
            <div class="text">
                <p>Comienzas a cambiar tus hábitos nutricionales y de vida por unos mas saludables y sostenibles.</p>
            </div>
            <div class="text">
                <p>Tomas mejores decisiones al comer, y mejoras la calidad nutricional de tu alimentación con nuestros
                    Bioproductos.</p>
            </div>
            <div class="text">
                <p>Te empoderas de tu nutrición, eres un consumidor más consciente y también produces alimentos de
                    calidad, diversos, frescos y saludables para tu familia.</p>
            </div>
            <div class="text">
                <p>Al nutrirte y consumir de forma más consciente, generas un impacto positivo: se producen más
                    alimentos agroecológicos en el campo, mejoras la calidad del suelo y del agua, además, promueves la
                    biodiversidad y disminuyes la pobreza y el hambre. </p>
            </div>
        </div>
    </section>

    <section class="home-bioinsumos">

        <h2>Nuestros Bioinsumos para producir ecológicamente</h2>

        <p>Línea Fertilizantes y Acondicionadores de suelos: Remineralizamos los suelos y el cultivo, para mejorar la
            calidad nutricional de los alimentos, capturando CO2 y nutriendo la microbiología del suelo gracias a las
            fórmulas minerales.</p>

        <div class="productos">
            <div class="image-text-card">
                <div class="image-container">
                    <img src="/imagenes/objetivos/placeholder.png">
                </div>
                <p class="title">AZ MON</p>
                <p class="price">30.000 COP</p>
                <button>Quiero este producto</button>
            </div>

            <div class="image-text-card">
                <div class="image-container">
                    <img src="/imagenes/objetivos/placeholder.png">
                </div>
                <p class="title">AZ MON</p>
                <p class="price">30.000 COP</p>
                <button>Quiero este producto</button>
            </div>
        </div>

    </section>

    <section class="coach-agro">
        <div class="text">
            <h2>Coaching en agroecología</h2>
            <p>Ofrecemos acompañamiento a pequeños y medianos productores en la transición de agricultura convencional a
                una agroecológica.</p>
            <button>Quiero saber más</button>
        </div>
        <div class="image">
            <img src="/imagenes/home/coach-agroecologia.png">
            <p>"La nutrición está en la roca madre, y el único nutriente que no está en ella es el nitrógeno"
                Julius Hensel (Padre de la agricultura Moderna)</p>
        </div>
    </section>

    <section class="nutri-coach">
        <div class="image">
            <img src="/imagenes/home/coach-nutricional.png">
            <p>"Que tu medicina sea tu alimento, y que tu alimento sea tu medicina" Hipócrates (Padre de la
                medicina)</p>
        </div>
        <div class="text">
            <h2>Coaching nutricional personalizado</h2>
            <p>Te das cuenta que tu nutrición y estilo de vida está afectando tu salud, tu mente y el medio
                ambiente.</p>
            <p>Comienzas a cambiar tus hábitos nutricionales y de vida por unos más saludables y sostenibles.</p>
            <button>Quiero saber más</button>
        </div>
    </section>

    <section class="home-productos">

        <h2>Nuestros Bioproductos para complementar tu alimentación.</h2>

        <p>Tomas mejores decisiones al comer, y mejoras la calidad nutricional de tu alimentación con nuestros
            Bioproductos.</p>

        <p>1. Línea Alimentos Funcionales: Remineralizamos tu nutrición para mejorar la calidad nutricional de tu
            alimentación, gracias a la combinación de superalimentos y fórmulas minerales inspiradas en la dinámica de
            la naturaleza. <br>
            2. Línea Cosmética: Remineralizamos las células y la microbiología de tu piel, para mejorar la regeneración
            natural.<br>
            3. Línea de Bioregeneración: Repotenciamos tu microbiología para mejorar la regeneración natural.</p>

        <div class="productos">
            <div class="image-text-card">
                <div class="image-container">
                    <img src="/imagenes/objetivos/placeholder.png">
                </div>
                <p class="title">AZ MON</p>
                <p class="price">30.000 COP</p>
                <button>Quiero este producto</button>
            </div>

            <div class="image-text-card">
                <div class="image-container">
                    <img src="/imagenes/objetivos/placeholder.png">
                </div>
                <p class="title">AZ MON</p>
                <p class="price">30.000 COP</p>
                <button>Quiero este producto</button>
            </div>

            <div class="image-text-card">
                <div class="image-container">
                    <img src="/imagenes/objetivos/placeholder.png">
                </div>
                <p class="title">AZ MON</p>
                <p class="price">30.000 COP</p>
                <button>Quiero este producto</button>
            </div>

            <div class="image-text-card">
                <div class="image-container">
                    <img src="/imagenes/objetivos/placeholder.png">
                </div>
                <p class="title">AZ MON</p>
                <p class="price">30.000 COP</p>
                <button>Quiero este producto</button>
            </div>
        </div>

    </section>

    <section class="coach-security">
        <div class="text">
            <h2>Coaching de seguridad y soberanía alimentaria</h2>
            <p>Te empoderas de tu nutrición, eres un consumidor más consciente y también produces alimentos de calidad,
                diversos, frescos y saludables para tu familia.</p>
            <button>Quiero saber más</button>
        </div>
        <div class="image">
            <img src="/imagenes/home/coach-seguridad-alimentaria.png">
            <p>"Un organismo saludable, bien nutrido, difícilmente será atacado por plagas y enfermedades. Dichas plagas y enfermedades, mueren de hambre en una planta sana"
                                Francois Chaboussou (Biólogo Francés)
            </p>
        </div>
    </section>

    <section class="home-benefits">

        <h2>Nuestros beneficios</h2>

        <p>Cada ingrediente es cuidadosamente seleccionado tomando en cuenta nuestros principios:</p>

        <div class="benefits">
            <div class="benefit">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 600">
                    <path d="M419.76,183.54A169.87,169.87,0,0,0,179,182.87C97.25,264,117.73,399.68,218.21,453.74A18.94,18.94,0,0,1,228,470.5v65.9a57.67,57.67,0,0,0,57.6,57.6H312a57.67,57.67,0,0,0,57.6-57.6V470.5a19.38,19.38,0,0,1,10.26-17c100-54.15,120-189.28,39.86-270ZM312,555.6h-26.4a19.22,19.22,0,0,1-19.2-19.2V489.6h64.8v46.8A19.22,19.22,0,0,1,312,555.6Zm49.57-135.85a58,58,0,0,0-27,31.45H263.14a57,57,0,0,0-26.74-31.27c-77.58-41.75-94-146.68-30.35-209.81,83.17-82.54,224.79-23.68,224.79,93.48A132,132,0,0,1,361.61,419.75ZM86.4,303.56a19.2,19.2,0,0,1-19.2,19.2H21.6a19.2,19.2,0,1,1,0-38.4H67.2A19.2,19.2,0,0,1,86.4,303.56Zm62.53,151.05a19.19,19.19,0,0,1,0,27.15L116.69,514a19.17,19.17,0,0,1-13.58,5.62c-17,0-25.71-20.65-13.57-32.78l32.24-32.24a19.19,19.19,0,0,1,27.15,0ZM280.84,70.8V25.2a19.2,19.2,0,1,1,38.4,0V70.8a19.2,19.2,0,1,1-38.4,0ZM89.59,120.29a19.2,19.2,0,0,1,27.16-27.15L149,125.38c12.14,12.13,3.37,32.78-13.57,32.78a19.14,19.14,0,0,1-13.58-5.63Zm361.48,5.15,32.24-32.25a19.2,19.2,0,0,1,27.15,27.16l-32.24,32.24a19.14,19.14,0,0,1-13.58,5.63c-16.95,0-25.7-20.65-13.57-32.78ZM597.6,303.64a19.2,19.2,0,0,1-19.2,19.2H532.8a19.2,19.2,0,1,1,0-38.4h45.6A19.2,19.2,0,0,1,597.6,303.64ZM510.41,486.91a19.2,19.2,0,1,1-27.16,27.15L451,481.82a19.2,19.2,0,0,1,27.15-27.15Zm-136-202.51h-7.51a69.36,69.36,0,0,0-6-14.51l5.32-5.32a19.2,19.2,0,0,0-27.15-27.16l-5.33,5.33a69.39,69.39,0,0,0-14.51-6V229.2a19.2,19.2,0,1,0-38.4,0v7.51a69.39,69.39,0,0,0-14.51,6L261,237.41a19.2,19.2,0,0,0-27.15,27.16l5.32,5.32a68.83,68.83,0,0,0-6,14.51h-7.52a19.2,19.2,0,1,0,0,38.4h7.52a68.83,68.83,0,0,0,6,14.51l-5.32,5.32c-12.14,12.14-3.37,32.78,13.57,32.78,9.16,0,13.34-5.39,18.9-11a69.39,69.39,0,0,0,14.51,6V378a19.2,19.2,0,1,0,38.4,0v-7.51a69.39,69.39,0,0,0,14.51-6c5.37,5.37,9.6,11,18.9,11,17,0,25.71-20.65,13.58-32.78l-5.33-5.32a69.39,69.39,0,0,0,6-14.51h7.51a19.2,19.2,0,0,0,0-38.4Zm-105.6,19.2A31.2,31.2,0,1,1,300,334.8a31.24,31.24,0,0,1-31.2-31.2Z"/>
                </svg>
                <p>Formulaciones propias innovadoras.</p>
            </div>
            <div class="benefit">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 600">
                    <path d="M444,237.09,549.38,402.64a17.22,17.22,0,0,0,14.53,8c.53,0,1.07,0,1.6-.08a17.24,17.24,0,0,0,14.4-10.75,197.07,197.07,0,0,0-12.43-171.93l-40.86-70.57,10.84-21.68,22.39-22.38a51.68,51.68,0,1,0-73.09-73.09L464.38,62.53,442.7,73.37,372.13,32.51A197.07,197.07,0,0,0,200.2,20.08a17.23,17.23,0,0,0-2.85,30.53L362.9,156l-8,16.09L21.14,505.77a51.68,51.68,0,0,0,73.08,73.08L427.94,245.13ZM511.13,64.5a17.23,17.23,0,0,1,24.36,24.37l-12.18,12.18L498.94,76.68Zm-441.27,490A17.23,17.23,0,1,1,45.5,530.13L369,206.62,393.38,231ZM390,178.85l10.69-21.38a17.21,17.21,0,0,0-6.16-22.23l-146-92.94a161.53,161.53,0,0,1,106.4,20l78.6,45.5a17.17,17.17,0,0,0,16.33.5l21.38-10.68,31.17,31.16-10.69,21.38a17.2,17.2,0,0,0,.5,16.33l45.5,78.6a161.6,161.6,0,0,1,20,106.4l-92.94-146a17.21,17.21,0,0,0-22.23-6.16L421.14,210Z"/>
                    <path d="M507,491.15a138,138,0,0,0-239.52,0c-48.83,4.7-87,41.31-87,85.62A17.23,17.23,0,0,0,197.79,594h379A17.22,17.22,0,0,0,594,576.77C594,532.46,555.87,495.85,507,491.15Zm-288.42,68.4c8.69-20.06,32.11-34.46,59.56-34.46a17.22,17.22,0,0,0,15.41-9.52l1.07-2.14a103.55,103.55,0,0,1,185.24,0l1.07,2.14a17.23,17.23,0,0,0,15.41,9.52c27.45,0,50.87,14.4,59.56,34.46Z"/>
                </svg>
                <p>Minerales extraídos legalmente.</p>
            </div>
            <div class="benefit">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 600">
                    <path d="M559.37,128.93c18.29-23.54,15.71-59.89-5.91-80.61a62.24,62.24,0,0,0-80.91-5.76c-29-58-116.73-38.65-117.65,27.09v84.7a107.9,107.9,0,0,0-45.19,3.12,82,82,0,0,1-3.92-27.4c2-67.86-54.5-124.9-122.68-124.06C117.39,5.31,60.07,64.17,63,129.87A79.45,79.45,0,0,1,50,176.1C.31,248,22.65,353.36,96.74,399.31A1067,1067,0,0,0,7.41,570.21a17.23,17.23,0,0,0,22.52,22.48l2.21-.91A1075.48,1075.48,0,0,0,293.05,437.35l114.59-91.9c29.5-23.42,44.87-62.07,39.36-99.27h85.14c65.9-.91,85.36-88.23,27.23-117.25ZM57.67,265.7a125,125,0,0,1,21-70.5,113.74,113.74,0,0,0,18.8-66.15c-1.23-47.93,37.84-88.15,86-88.59,48.85-.62,89.31,40.2,87.87,88.73a116.23,116.23,0,0,0,7,43,108.17,108.17,0,0,0-23.13,21.31L241.87,210c-51.2-50.43-139.68-13.73-139.54,58.39A82,82,0,0,0,140,337.13q-12.37,16.53-24.1,33.51A125.73,125.73,0,0,1,57.67,265.7ZM164.6,305.48c-1.14,1.41-2.27,2.83-3.4,4.24a47.46,47.46,0,0,1-24.42-41.34c0-43.38,54.56-63.73,83.25-31.41Zm248.93-40.27a73.51,73.51,0,0,1-22,48.51l-40.07-39.89c-16.84-15.48-39.85,7.66-24.3,24.41l37.59,37.43-93.27,74.8A1039.92,1039.92,0,0,1,56.73,543.39,1033.93,1033.93,0,0,1,179.05,342.73l24.46,24.35a17.23,17.23,0,0,0,24.31-24.41l-27.13-27L282,215.16a74.27,74.27,0,0,1,110-5.87,73.46,73.46,0,0,1,21.53,55.92Zm118.61-53.49H436a107.86,107.86,0,0,0-46.61-46.42V69.65c1.51-36.24,53.52-36.22,55,0v7.23a17.23,17.23,0,0,0,29.38,12.2l16.42-16.34a27.69,27.69,0,0,1,39,0c10.63,10.16,10.64,28.41,0,38.57l-16.42,16.35a17.22,17.22,0,0,0,12.15,29.43h7.26c36.51,1.51,36.49,53.14,0,54.63Z"/>
                </svg>
                <p>Ingredientes naturales y libres de GMO.</p>
            </div>
            <div class="benefit">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 600">
                    <path class="cls-1"
                          d="M244.77,208.53a8.62,8.62,0,0,0-8.62,8.61v9.21a8.62,8.62,0,0,0,17.23,0v-9.21A8.62,8.62,0,0,0,244.77,208.53Z"/>
                    <path class="cls-1"
                          d="M355.24,208.53a8.62,8.62,0,0,0-8.62,8.61v9.21a8.62,8.62,0,0,0,17.23,0v-9.21A8.61,8.61,0,0,0,355.24,208.53Z"/>
                    <path class="cls-1"
                          d="M477.75,444.58,464.88,440c-5.61-30.4-14.05-46.31-21.52-60.39-5.72-10.78-10.77-20.33-13.74-35.31a45.41,45.41,0,0,0,13.13-83.45c11.91-3.93,21-14.26,22.2-26.7a31.7,31.7,0,0,0-8-24.44c-.33-.37-.68-.72-1-1.08V161.91C455.91,75.94,386,6,300,6S144.09,75.94,144.09,161.91v46.74c-.35.36-.7.72-1,1.09a31.74,31.74,0,0,0-8,24.44c1.24,12.44,10.3,22.77,22.2,26.7a45.42,45.42,0,1,0,56.61,69.74,129,129,0,0,0,22.29,16.23v37.56A28.26,28.26,0,0,1,217.33,411l-95.08,33.56a63.93,63.93,0,0,0-42.6,60.2v80.6a8.61,8.61,0,0,0,17.22,0v-80.6a46.7,46.7,0,0,1,31.11-44l24.94-8.8c4.66,26.7,9.73,54.48,15.35,80a8.61,8.61,0,1,0,16.82-3.72c-5.75-26.08-10.94-54.72-15.7-82.09l13.06-4.6c16.36,53.42,36.8,111.85,64.63,148.95a8.61,8.61,0,0,0,13.78-10.33C231.47,541,209.25,470.51,198.7,435.86l17.12-6c5.32,10.19,17,30.07,37.78,53.93C280.78,515,329.47,559.34,407,593.27a8.42,8.42,0,0,0,3.45.73,8.62,8.62,0,0,0,3.45-16.51c-44.17-19.32-78.54-42.1-104.6-63.64,44.56-36.67,66.56-70.07,74.6-84.12l17.36,6.13c-9.51,30.68-19.95,58.21-31.08,81.87a8.61,8.61,0,1,0,15.59,7.33c11.39-24.22,22.06-52.27,31.75-83.47L472,460.82a46.72,46.72,0,0,1,31.11,44v80.59a8.61,8.61,0,1,0,17.22,0V504.79A64,64,0,0,0,477.75,444.58ZM447.89,300a28.19,28.19,0,0,1-49.75,18.19A127.72,127.72,0,0,0,423,272,28.25,28.25,0,0,1,447.89,300ZM300.81,23.23c76.53.44,137.87,63.68,137.87,140.2v35.89H427.34a63.2,63.2,0,0,1-16.86-2.21c-18.88-5.23-65.07-23.13-98.56-77.93a22.79,22.79,0,0,1-3.31-11.88V88.62a8.84,8.84,0,0,0-8.34-9,8.62,8.62,0,0,0-8.88,8.61v19a22.79,22.79,0,0,1-3.31,11.88c-33.49,54.8-79.68,72.7-98.56,77.93a63.2,63.2,0,0,1-16.86,2.21h-6.15a32.08,32.08,0,0,0-5.19.44V161.91h0C161.32,85.17,224,22.79,300.81,23.23Zm-120.49,305A28.21,28.21,0,0,1,177,272a127.72,127.72,0,0,0,24.9,46.2A28.31,28.31,0,0,1,180.32,328.21Zm44-11.34a110.72,110.72,0,0,1-35.08-72.76,8.61,8.61,0,0,0-17.18,1.24h-4.25c-8.05,0-14.92-5.66-15.64-12.88a14.41,14.41,0,0,1,14.33-15.92h6.14a80.25,80.25,0,0,0,21.46-2.84c20.37-5.64,69.44-24.51,105.88-81.07,36.45,56.56,85.51,75.43,105.89,81.07a80.53,80.53,0,0,0,21.45,2.84h6.15a14.43,14.43,0,0,1,14.33,15.92c-.73,7.22-7.6,12.88-15.64,12.88h-4.26a8.61,8.61,0,0,0-17.18-1.24,111.07,111.07,0,0,1-186.4,72.76ZM296.1,502.42a354.76,354.76,0,0,1-28.94-29.33c-19.11-21.85-30.2-40.3-35.39-50a45.53,45.53,0,0,0,21.61-38.67V355.11a128.71,128.71,0,0,0,93.24,0v29.31a45.52,45.52,0,0,0,21.32,38.49C359.74,436.74,338.28,468.22,296.1,502.42ZM382.67,411a28.24,28.24,0,0,1-18.82-26.6V346.85a127.94,127.94,0,0,0,22.29-16.23,45.72,45.72,0,0,0,26,14.16c3.34,19.11,9.48,30.73,16,42.93,6.31,11.9,12.81,24.15,17.77,45.63Z"/>
                    <path class="cls-1"
                          d="M199.6,582.6c-1.83-5.34-3.69-11.38-5.54-18a8.61,8.61,0,0,0-16.58,4.66c1.93,6.89,3.89,13.24,5.82,18.87a8.61,8.61,0,0,0,8.15,5.83,8.46,8.46,0,0,0,2.78-.47A8.6,8.6,0,0,0,199.6,582.6Z"/>
                    <path class="cls-1"
                          d="M341.43,259.13H258.57a8.62,8.62,0,0,0-8.61,8.61c0,25.06,22.45,45.44,50,45.44s50-20.38,50-45.44A8.61,8.61,0,0,0,341.43,259.13ZM300,296c-14.6,0-27-8.24-31.25-19.59h62.5C327,287.71,314.6,296,300,296Z"/>
                </svg>
                <p>Superalimentos producidos por asociaciones campesinas del Urabá y comunidades indígenas del
                    Cauca.</p>
            </div>

            <div class="benefit">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 600">
                    <path d="M576.77,225a17.23,17.23,0,1,0,0-34.45H537.63A145.31,145.31,0,0,0,526.76,150l33.91-19.58a17.22,17.22,0,1,0-17.22-29.83l-34,19.6a147.55,147.55,0,0,0-29.66-29.66l19.6-33.94A17.22,17.22,0,1,0,469.6,39.34L450,73.24a145.33,145.33,0,0,0-40.53-10.87V23.23a17.23,17.23,0,0,0-34.46,0V62.37A145.33,145.33,0,0,0,334.5,73.24l-19.58-33.9a17.23,17.23,0,1,0-29.84,17.22l19.6,34A147.5,147.5,0,0,0,275,120.17l-34-19.61a17.23,17.23,0,0,0-17.22,29.84L257.76,150a145.45,145.45,0,0,0-11.89,57.76A38.07,38.07,0,0,1,244,219.62l-24.06-24.06a17.23,17.23,0,0,0-24.36,24.36L219.62,244a38.12,38.12,0,0,1-11.88,1.89A145.63,145.63,0,0,0,150,257.76L130.4,223.85a17.22,17.22,0,0,0-29.83,17.23L120.17,275a147.76,147.76,0,0,0-29.66,29.65l-34-19.6a17.23,17.23,0,0,0-17.22,29.84L73.24,334.5A145.33,145.33,0,0,0,62.37,375H23.23a17.23,17.23,0,1,0,0,34.45H62.37A145.31,145.31,0,0,0,73.24,450L39.33,469.6a17.22,17.22,0,1,0,17.22,29.83l34-19.6a147.55,147.55,0,0,0,29.66,29.66l-19.6,34a17.22,17.22,0,1,0,29.83,17.23L150,526.76a145.33,145.33,0,0,0,40.53,10.87v39.14a17.23,17.23,0,1,0,34.46,0V538.19a328.47,328.47,0,0,0,51.66-6.79l10,37.26a17.23,17.23,0,0,0,33.28-8.92l-10-37.27q12.36-4,24.46-9t23.68-10.93l19.29,33.41a17.23,17.23,0,0,0,29.84-17.22l-19.29-33.4a329.35,329.35,0,0,0,41.34-31.73l27.27,27.28a17.23,17.23,0,0,0,24.37-24.36l-27.28-27.28a328.4,328.4,0,0,0,31.73-41.34l33.4,19.28A17.22,17.22,0,1,0,536,377.34l-33.41-19.29q5.9-11.58,10.92-23.67t9-24.47l37.26,10a17.23,17.23,0,0,0,8.92-33.28l-37.26-10A327.58,327.58,0,0,0,538.19,225Zm-95.14,96.22a296.43,296.43,0,0,1-273.89,183,111.94,111.94,0,0,1,0-223.87,72.55,72.55,0,0,0,72.58-72.58,111.94,111.94,0,0,1,223.87,0,295.05,295.05,0,0,1-22.56,113.45Z"/>
                    <path d="M392.26,135.16a72.54,72.54,0,0,0-72.58,72.58A112.07,112.07,0,0,1,207.74,319.68a72.58,72.58,0,0,0,0,145.16,257.11,257.11,0,0,0,257.1-257.1,72.55,72.55,0,0,0-72.58-72.58ZM207.74,430.39a38.13,38.13,0,0,1,0-76.26c80.72,0,146.39-65.67,146.39-146.39a38.13,38.13,0,0,1,76.26,0c0,122.77-99.88,222.65-222.65,222.65Z"/>
                </svg>
                <p>Microorganismos producidos en una fermentación natural orgánica.</p>
            </div>
            <div class="benefit">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 600">
                    <path d="M437.81,6H162.19a51.76,51.76,0,0,0-51.68,51.68V125a687,687,0,0,0-34.46,215.1V576.77A17.21,17.21,0,0,0,93.28,594H506.72A17.21,17.21,0,0,0,524,576.77V340.08A688,688,0,0,0,489.49,125V57.68A51.76,51.76,0,0,0,437.81,6ZM455,57.68v52.83H351.68V40.45h86.13A17.21,17.21,0,0,1,455,57.68ZM282.77,40.45h34.46V155.07L300,172.29l-17.23-17.22ZM145,57.68a17.21,17.21,0,0,1,17.23-17.23h86.13v70.06H145ZM140.25,145H248.32v17.23a17.22,17.22,0,0,0,5.05,12.17l34.46,34.45a17.17,17.17,0,0,0,24.34,0l34.46-34.45a17.22,17.22,0,0,0,5.05-12.17V145H459.75a652.71,652.71,0,0,1,29.74,195.12V489.49h-379V340.08A652.71,652.71,0,0,1,140.25,145ZM110.51,559.55V524h379v35.6Z"/>
                </svg>
                <p>Empaques de Bioproductos de caña Biodegradable.</p>
            </div>
            <div class="benefit">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 600">
                    <path d="M298,30.22c78.42-.71,157.78,39.1,209.1,99.23l-70.95-2.29a15.11,15.11,0,0,0-1,30.21l98.15,3.27c11.92,5.26,25.08-7.77,19.7-19.71l-3.26-98.14a15.12,15.12,0,1,0-30.22,1.09l1.81,56.56C336.3-105.18,1.36,29.82-2.11,300.13a15.11,15.11,0,1,0,30.21,0C26.94,161.13,154.35,25.34,298,30.22Z"/>
                    <path d="M586.76,285a15.11,15.11,0,0,0-15.1,15.11c-4.21,249.3-315.82,366.19-479,170.55L163.6,473a15.12,15.12,0,0,0,1-30.22l-98.14-3.27c-11.92-5.26-25.08,7.77-19.7,19.71L50,557.33a15.12,15.12,0,1,0,30.22-1.09l-1.82-56.56c114.07,129.19,329.94,134.81,443.11,2.17,50.53-56.08,80.63-131.5,80.63-202A15.46,15.46,0,0,0,586.76,285Z"/>
                    <path class="cls-1"
                          d="M424.8,258.06c65.07-63.55,50.1-38.28-56.69-76.63-15.29-56.24-100.46-59.52-120.39-4.84-1.28,1.77-115.29,32.45-110.59,37.71-4.29,4.47,38.75,41.41,40.37,44.72-27.57,52.21-44.69,42.89,14.5,61.89,1.92,3.34-4.63,106.68,4.11,104.31,21.64,8.1,102,38.2,102.38,38.44a6,6,0,0,0,4.11,0l115.07-38.32c9.28,3.09,2.32-104.07,4.35-107C488.4,299.27,466.74,304.93,424.8,258.06ZM371,200.52c0-1.57-.12-3.26-.24-4.83l75.06,23.21-31.91,31.91L361.83,233.4A64.23,64.23,0,0,0,371,200.52ZM258.72,183.84c30.35-73.72,134.51-15.79,88.12,48.84C311.4,276.7,240.16,237.21,258.72,183.84ZM155.38,218.78l88.35-27.56a62.87,62.87,0,0,0,6.41,38.55l-62.85,20.91Zm12.81,80.62,20.19-33.73L291,299.88,270.81,333.6C259.93,330,179.92,303.26,168.19,299.4ZM294.26,448.31l-89.45-33.6V325c94.87,28.24,60.48,34.51,89.45-5.68Zm6.4-158.7-94.88-31.55,51.61-17.17c23,29.75,71.42,31.35,96.34,3.27l41.7,13.9ZM409.33,414.46,307.07,448.55V314.63l22.6,28.28c.39,8.53,76.15-21.44,79.66-20.79v92.34Zm-72.4-82.91-25.51-32L414,265.31,446,297.22Z"/>
                    <path class="cls-1"
                          d="M343.57,176.83a6.34,6.34,0,0,0-9.06,0l-33.85,33.85-8.21-8.22c-5.77-6-15.1,3.29-9.07,9.06,4.8,3.27,14.86,20.31,21.88,12.82l38.31-38.44A6.57,6.57,0,0,0,343.57,176.83Z"/>
                </svg>
                <p>Programa de economía circular con nuestros empaques plásticos de Bioinsumos.</p>
            </div>
            <div class="benefit">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 600">
                    <path class="cls-1"
                          d="M184.35,284A6.59,6.59,0,1,0,173,277.23a85.26,85.26,0,0,0-11.69,43.25v.72a96.73,96.73,0,0,0,3.38,25.66,6.79,6.79,0,0,0,6.38,4.94,8.29,8.29,0,0,0,1.69-.24,6.63,6.63,0,0,0,4.69-8.07,86.71,86.71,0,0,1-2.89-22.29v-.72A72.67,72.67,0,0,1,184.35,284Z"/>
                    <path class="cls-1"
                          d="M186.4,364.57h0a6.55,6.55,0,0,0-9-2.29,6.65,6.65,0,0,0-2.28,9v.12a6.44,6.44,0,0,0,5.66,3.13,6.82,6.82,0,0,0,3.37-1A6.63,6.63,0,0,0,186.4,364.57Z"/>
                    <path class="cls-1"
                          d="M457.45,335.9l-19-41.8a52.38,52.38,0,0,1,2.29-47.83,6.66,6.66,0,0,0-2.41-9l-14.82-8.56a6.78,6.78,0,0,0-5.06-.6,6.5,6.5,0,0,0-4,3.13,52.3,52.3,0,0,1-40.23,25.9l-45.78,4.46a89.36,89.36,0,0,0-68.55,44.09l-.36.72a102.42,102.42,0,0,0-.48,101.2v.12a103,103,0,0,0,8.55,12.77H240.73A100.26,100.26,0,0,1,190,406.61h-.12a100.39,100.39,0,0,1-49.15-86v-.84a85.67,85.67,0,0,1,35.78-69.51l41.68-29.76a72.43,72.43,0,0,0,30.24-58.79v-17h8.43v17a72.45,72.45,0,0,0,30.24,58.79l37.59,26.87a6.57,6.57,0,0,0,7.59-10.73L294.7,209.77A59,59,0,0,1,270,161.7V138.09a6.68,6.68,0,0,0-6.62-6.62H241.69a6.68,6.68,0,0,0-6.62,6.62V161.7a59.36,59.36,0,0,1-24.7,48.07l-41.68,29.76a98.59,98.59,0,0,0-41.32,80.23v.84a112.69,112.69,0,0,0,14.94,56A114.46,114.46,0,0,0,183,417.94h.12A111.08,111.08,0,0,0,231,433.12v12.52a6.63,6.63,0,1,0,13.25,0v-12h7.95v29a6.63,6.63,0,1,0,13.26,0v-29h7.95v12a6.63,6.63,0,1,0,13.25,0V439a112.64,112.64,0,0,0,10.12,6.75l16.86,9.75a102.44,102.44,0,0,0,51,13.62h1a102.49,102.49,0,0,0,87.34-51l.36-.72A88.76,88.76,0,0,0,457.45,335.9ZM442,410.83l-.36.72a88.69,88.69,0,0,1-121.31,32.53l-16.87-9.76a88.85,88.85,0,0,1-32.88-33.25V401a89.22,89.22,0,0,1,.36-88.18l.36-.72a75.94,75.94,0,0,1,58.43-37.59L375.53,270a65.62,65.62,0,0,0,46.86-26.86l4,2.29a65.39,65.39,0,0,0,.12,54l19,41.8A76.77,76.77,0,0,1,442,410.83Z"/>
                    <path class="cls-1"
                          d="M433.48,346.86h0a6.56,6.56,0,0,0-8.8-3.25,6.65,6.65,0,0,0-3.25,8.79v.12a6.6,6.6,0,0,0,6,3.86,7.72,7.72,0,0,0,2.78-.6A7,7,0,0,0,433.48,346.86Z"/>
                    <path class="cls-1"
                          d="M432.88,372.52a6.52,6.52,0,0,0-7.23,5.78,49.11,49.11,0,0,1-6.27,19.28l-.36.72a62.65,62.65,0,0,1-53.49,31.2h-.6a63,63,0,0,1-31.2-8.31l-16.86-9.76a61.51,61.51,0,0,1-23.13-23.37h0a62.66,62.66,0,0,1,.24-61.92l.36-.72a49.49,49.49,0,0,1,38.07-24.58l45.77-4.45a85.39,85.39,0,0,0,18.31-3.74,83.15,83.15,0,0,0,6,17.71l6.26,13.73a6.63,6.63,0,1,0,12.05-5.54l-6.27-13.73a81.37,81.37,0,0,1-6.38-22.05,6.31,6.31,0,0,0-3.25-4.82,6.56,6.56,0,0,0-5.79-.36A78.62,78.62,0,0,1,377,283.13l-45.78,4.46a62.68,62.68,0,0,0-48.31,31.08l-.36.73a75.82,75.82,0,0,0-.36,75.05h0a75.45,75.45,0,0,0,28.07,28.31l16.87,9.75a75.63,75.63,0,0,0,37.82,10.12h.72a75.94,75.94,0,0,0,64.82-37.82l.36-.73a62.45,62.45,0,0,0,7.95-24.45A6.67,6.67,0,0,0,432.88,372.52Z"/>
                    <path class="cls-1"
                          d="M409.38,357.82l-19-41.8c-.36-1-.84-1.8-1.2-2.77a6.56,6.56,0,0,0-6.87-4l-3,.36-45.78,4.45a36.32,36.32,0,0,0-27.95,18l-.36.73a49.31,49.31,0,0,0-.24,48.79h0v.12a49.49,49.49,0,0,0,18.19,18.43L340,409.87a49.29,49.29,0,0,0,24.69,6.62h.48a49.48,49.48,0,0,0,42.17-24.57l.36-.73A36.73,36.73,0,0,0,409.38,357.82Zm-13,26.63-.36.72a36.36,36.36,0,0,1-30.84,18.07h-.36a36.92,36.92,0,0,1-18.07-4.82l-16.86-9.76a36,36,0,0,1-13.38-13.49v-.12h0a35.91,35.91,0,0,1,.24-35.66l.37-.72a23,23,0,0,1,17.83-11.44L379.15,323l18.43,40.48A23.44,23.44,0,0,1,396.37,384.45Z"/>
                    <path d="M298.07,31.12c47.35,0,94.69,13.37,137,38.79A297.43,297.43,0,0,1,506.48,130l-70.71-2.29a15.07,15.07,0,0,0-1,30.12l97.82,3.25A15.28,15.28,0,0,0,549,157.85a15,15,0,0,0,3.25-16.39L549,43.65a15.06,15.06,0,1,0-30.12.72v.36l1.81,56.38a323.51,323.51,0,0,0-70.24-57C403.48,15.94,350.72,1,298,1c-84.33,0-162,34.69-218.77,97.82C28.83,154.72-1.17,229.89-1.17,300.12a15.06,15.06,0,0,0,30.12,0c0-62.88,27.1-130.59,72.64-181.06C152.67,62.32,222.42,31.12,298.07,31.12Z"/>
                    <path d="M585.87,285.06a15.07,15.07,0,0,0-15.06,15.06c0,62.88-27.1,130.59-72.64,181.06C447.21,537.8,377.46,569,301.81,569c-47.35,0-94.69-13.37-137-38.79A297.43,297.43,0,0,1,93.4,470.1l70.71,2.29a15.07,15.07,0,0,0,1-30.12L67.26,439a15.28,15.28,0,0,0-16.39,3.25,15,15,0,0,0-3.25,16.39l3.25,97.81A15.06,15.06,0,0,0,81,555.75v-.36L79.18,499a323,323,0,0,0,70.36,56.86c47,28.19,99.74,43.13,152.51,43.13,84.33,0,162-34.69,218.77-97.82,50.35-55.9,80.35-131.07,80.35-201.3A15.39,15.39,0,0,0,585.87,285.06Z"/>
                    <path d="M372.52,337.83a6.44,6.44,0,0,0-3.61-2.05c-5.18-1-31.57-5.3-41.44,7.47-4.34,5.66-6,11.44-4.82,17.35,1.68,8.19,8.67,15.54,21.92,22.88,9.52,5.3,17.23,7.95,23.86,7.95a20.73,20.73,0,0,0,7.22-1.2c5.55-2.05,9.76-6.51,12.29-13.13C393.6,362,376.14,341.68,372.52,337.83Zm3,34.57c-1.68,4.46-3.73,5.18-4.45,5.42-2.65,1-8.32.72-20.12-5.78h0c-11.81-6.63-14.94-11.32-15.42-14.1-.12-.72-.6-2.89,2.29-6.62,2-2.77,8.43-3.74,15.3-3.74a82.91,82.91,0,0,1,11.08.85C370.59,355.9,377.46,367.34,375.53,372.4Z"/>
                </svg>
                <p>Programa de apadrinamiento a familias vulberables para garantizar su seguridad alimentaria.</p>
            </div>

        </div>

    </section>


    <section class="who-are">
        <div class="text">
            <h2>Quienes somos</h2>
            <p>Somos la única empresa que reúne bioproductos y servicios enfocados a mejorar la nutrición en todos
                los niveles: humano, animal y vegetal; del campo a la mesa. Es toda la sabiduría de la observancia atenta,
                detallada y creativa puesta a tu servicio a través de una organización familiar que sueña y trabaja cada
                día por el bienestar de las personas, creando consciencia en mejorar hábitos alimenticios y
                una agricultura sostenible y sana.</p>
            <button>Quiero saber más</button>
        </div>
        <div class="image">
            <img src="/imagenes/home/nosotros.png">
            <p>"En Inbionova, las ideas son importantes; pero las personas que tienen las ideas son más importantes"</p>
        </div>
    </section>

    <section class="testimonials">
        <div class="text">
            <h2>Lo que dicen nuestros clientes</h2>
            <p>Sembramos ideas que impactan vidas y nuestra familia nos respalda</p>
        </div>
        <div class="testimonials-content">

            <div class="image-text-card">
                <div class="image-popup">
                    <img src="/imagenes/testimonials/testimonial-1.png">
                </div>
                <p>Yo presentaba problemas para respirar normalmente debido a un enfermedad pulmonar obstructiva crónica (EPOC) y gracias a los productos Inbionova logré mejorar mi calidad de vida</p>
                <p class="name">Néstor Ospina</p>
                <a href="https://youtu.be/CHCQHfRAp6I" class="button" target="_blank">Ver video</a>
            </div>

            <div class="image-text-card">
                <div class="image-popup">
                    <img src="/imagenes/testimonials/testimonial-2.png">
                </div>
                <p>Yo presentaba problemas de mobilidad debido a una fibromialgia y gracias a los productos Inbionova logré volver a caminar sin bastón</p>
                <p class="name">Gloria Cecilia Hernández</p>
                <a href="https://youtu.be/7cEw7DvFwBo" class="button" target="_blank">Ver video</a>
            </div>

            <div class="image-text-card">
                <div class="image-popup">
                    <img src="/imagenes/testimonials/testimonial-3.png">
                </div>
                <p>Queria mejorar las deficiencias de vitaminas y minerales y tambien conoci una alternativa de inhaladores para mis crisis asmáticas que he sufrido desde la niñez y adolescencia. Gracias a los productos Inbionova dejé de inhalarme y una mejor manera de alimentarme hoy tengo calidad de vida, mejor energía</p>
                <p class="name">Nelson García</p>
                <a href="https://youtu.be/ZSVA-YpCsWQ" class="button" target="_blank">Ver video</a>
            </div>

            <div class="image-text-card">
                <div class="image-popup">
                    <img src="/imagenes/testimonials/testimonial-4.png">
                </div>
                <p>Hace 2 años me diagnosticaron con endometriocis 4, me dijeron que no podia tener hijos. Comencé a consumir más consiente, y a usar los productos Inbionova y gracias a ello, hoy tengo mi milagro Pascal, y recomiendo los productos a toda mi familia</p>
                <p class="name">Daniela Talero</p>
                <a href="https://youtu.be/Gmfx6Q0c0R0" class="button" target="_blank">Ver video</a>
            </div>

        </div>
    </section>

    <section class="awards">
        <div class="text">
            <h2>Reconocimientos</h2>
            <p>Somos reconocidos a nivel local, regional y nacional; con más de 20 años de trayectoria en nutrición y
                salud del agro, a su vez, 15 años de trayectoria en bienestar y nutrición humana.</p>

        </div>
        <div class="award-content">

            <div class="image-text-card">
                <div class="image-container">
                    <img src="/imagenes/awards/award-1.png">
                </div>
                <p>Sello de Responsabilidad Social Empresarial 3er año consecutivo. Fenalco (2018)</p>
            </div>

            <div class="image-text-card">
                <div class="image-container">
                    <img src="/imagenes/awards/award-2.png">
                </div>
                <p>Premio de Innovacion en Investigacion, Desarrollo e innovacion. Cronica del Quindio (2018)</p>
            </div>

            <div class="image-text-card">
                <div class="image-container">
                    <img src="/imagenes/awards/award-3.png">
                </div>
                <p>Premio de Emprendimiento. Envento: Noche de los Mejores. Fenalco Quindio (2019)</p>
            </div>

            <div class="image-text-card">
                <div class="image-container">
                    <img src="/imagenes/awards/award-4.png">
                </div>
                <p>IV Puesto. Premio Alianzas para la Innovación. Cámara de Comercio del Quindío (2017)</p>
            </div>
        </div>
    </section>

    <section class="allies">
        <div class="text">
            <h2>Nuestros aliados</h2>
            <p>Somos una familia con una misma visión: Queremos ver a Colombia como una despensa de alimentos sanos, que
                pueda proveer a su propia población con nutrición saludable en diversidad, calidad y cantidad, sin
                maltratar el ecosistema.</p>
        </div>
    </section>
@endsection