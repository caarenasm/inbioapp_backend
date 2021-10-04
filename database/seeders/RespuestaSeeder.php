<?php

namespace Database\Seeders;
use App\Models\Respuesta;
use Illuminate\Database\Seeder;

class RespuestaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'respuesta' => 'Duermo muy bien y me levanto descansado',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 1
            ],
            [
                'respuesta' => 'Me despierto una o más veces en la noche y me cuesta dormir de nuevo',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 1
            ],
            [
                'respuesta' => 'Padezco de insomnio',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 1
            ],
            [
                'respuesta' => 'Todos los días',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 2
            ],
            [
                'respuesta' => 'A veces',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 2
            ],
            [
                'respuesta' => 'Nunca',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 2
            ],
            [
                'respuesta' => 'Comidas altas en carbohidratos',
                'ayuda' => 'Son comidas como pan blanco, la pasta, la pasteleria.',
                'otro' => 0,
                'pregunta_id' => 3
            ],
            [
                'respuesta' => 'Comidas dulces',
                'ayuda' => 'Son endulzantes, galletas, helado, chocolate.',
                'otro' => 0,
                'pregunta_id' => 3
            ],
            [
                'respuesta' => 'Comidas saladas',
                'ayuda' => 'Son el maní, alimentos de paquetes, embutidos.',
                'otro' => 0,
                'pregunta_id' => 3
            ],
            [
                'respuesta' => 'Comidas fritas y bebidas con gas ',
                'ayuda' => 'Son comidas grasosas como las papas fritas, fritos de paquete, nutela.
                Y bebidas con gas como jugos y bebidas carbonadas',
                'otro' => 0,
                'pregunta_id' => 3
            ],
            [
                'respuesta' => 'Comidas frías o heladas',
                'ayuda' => 'Como el hielo, bebidas carbonadas frias.',
                'otro' => 0,
                'pregunta_id' => 3
            ],
            [
                'respuesta' => 'Carnes rojas / proteina animal',
                'ayuda' => 'Son las carnes rojas, hamburguesas, proteína animal.',
                'otro' => 0,
                'pregunta_id' => 3
            ],
            [
                'respuesta' => 'Ningun antojo',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 3
            ],
            [
                'respuesta' => 'Otro',
                'ayuda' => '',
                'otro' => 1,
                'pregunta_id' => 3
            ],
            [
                'respuesta' => 'Ninguna, no practico deporte actualmente. Soy sendentario.',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 4
            ],
            [
                'respuesta' => 'A veces hago actividades de resistencia y cardio / fuerza y poder (1-2 veces por semana)',
                'ayuda' => 'Resistencia y cardio: Como trotar, correr, bicileta, nadar, caminar, bailar, patinaje
                Fuerza y poder: yoga, pilates, pesas, subir escaleras, jardinería.',
                'otro' => 0,
                'pregunta_id' => 4
            ],
            [
                'respuesta' => 'Moderadamente hago actividades de resistencia y cardio / fuerza y poder (2-3 veces por semana)',
                'ayuda' => 'Resistencia y cardio: Como trotar, correr, bicileta, nadar, caminar, bailar, patinaje
                Fuerza y poder: yoga, pilates, pesas, subir escaleras, jardinería.',
                'otro' => 0,
                'pregunta_id' => 4
            ],
            [
                'respuesta' => 'Me siento cómodo(a) con las dos actividades físicas anteriores Tengo una vida muy activa 4-5 veces por semana.',
                'ayuda' => 'Como: hipertensión arterial(presión alta), cardiopatía coronaria (infarto de miocardio), enfermedad cerebrovascular (apoplejía), enfermedad vascular periférica, insuficiencia cardíaca, cardiopatía reumática, cardiopatía congénita, miocardiopatías.',
                'otro' => 0,
                'pregunta_id' => 4
            ],
            [
                'respuesta' => 'Tengo una vida extremadamente activa 6-7 veces por semana.',
                'ayuda' => 'Trabajo físico, fitness',
                'otro' => 0,
                'pregunta_id' => 4
            ],
            [
                'respuesta' => 'Soy deportista de alto rendimiento, atleta profesional.',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 4
            ],
            [
                'respuesta' => 'Diabetes tipo 1 o 2',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 5
            ],
            [
                'respuesta' => 'Cáncer',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 5
            ],
            [
                'respuesta' => 'Enfermedades alérgicas',
                'ayuda' => 'Como: Renitis alérgica, Asma alérgica, Urticaria, Dermatitis atopica, Dermatitis alergica de contacto, Alergia alimentaria, anafilaxia',
                'otro' => 0,
                'pregunta_id' => 5
            ],
            [
                'respuesta' => 'Enfermedades cardiovasculares ',
                'ayuda' => 'Como: hipertensión arterial(presión alta), cardiopatía coronaria (infarto de miocardio), enfermedad cerebrovascular (apoplejía), enfermedad vascular periférica, insuficiencia cardíaca, cardiopatía reumática, cardiopatía congénita, miocardiopatías.',
                'otro' => 0,
                'pregunta_id' => 5
            ],
            [
                'respuesta' => 'Enfermedades respiratorias',
                'ayuda' => 'Como: gripe, rinitis, Rinosinusitis, Faringitis, Amigdalitis, Bronquitis, Enfisema pulmonar, Asma, Neumonía, Cáncer de pulmón, Epoc, tosferina, fibrosis quistica, tuberculosis, tabaquismo.',
                'otro' => 0,
                'pregunta_id' => 5
            ],
            [
                'respuesta' => 'Enfermedades autoinmunes',
                'ayuda' => 'Como: la enfermedad celíaca, la hepatitis autoinmune, la tiroiditis de Hashimoto, la artritis reumatoide, el lupus eritematoso sistémico y discoide, la psoriasis, el síndrome de Guillain-Barré, Vitiligo, Síndrome de anticuerpos antifosfolípidos, Miopatías inflamatorias, Esclerosis múltiple (EM), Esclerodermia, Enfermedad inflamatoria del intestino (EII), Cirrosis biliar primaria, Alopecia areata, Anemia hemolítica.',
                'otro' => 0,
                'pregunta_id' => 5
            ],
            [
                'respuesta' => 'Enfermedades musculares, óseas y/o articulares',
                'ayuda' => 'Como: osteoporosis, Osteopenia, Osteomielitis, Osteogénesis imperfecta, Enfermedad de Paget, Osteomalacia, Acromegalia, Raquitismo, Fracturas óseas, Enfermedad de Perthes, Artritis, Síndrome del túnel carpiano, Tendinitis, Desgarro del manguito rotatorio, Bursitis, Distrofia muscular, Miastenia grave, Lupus eritematoso.',
                'otro' => 0,
                'pregunta_id' => 5
            ],
            [
                'respuesta' => 'Enfermedades neuropsicologícas',
                'ayuda' => 'Como: Demencias (entre las que se incluye la enfermedad de Alzheimer), Ictus, Epilepsia, Parkinson, Esclerosis múltiple, Migraña. Lesion en medula espinal y cerebro, tumor cerebral, meningitis.',
                'otro' => 0,
                'pregunta_id' => 5
            ],
            [
                'respuesta' => 'Enfermedades endocrinas nutricionales y metabolicas',
                'ayuda' => 'Como : Diabetes, hipoglucemia, Hiper/hipotiroidismo, hiper/hipocalcemia, Sindrome de Cushing, Enfermedad de Addison, Obesidad, sobrepeso, enfermedades de las glandulas suprarrenales, prediabetes, síndrome metabólico, hígado graso, dislipidemia, hipertensión arterial, bulimia, anorexia.',
                'otro' => 0,
                'pregunta_id' => 5
            ],
            [
                'respuesta' => 'Enfermedades infecciosas',
                'ayuda' => 'Como: Faringitis estreptocócica, infecciones urinarias, infecciones virales, VIH/SIDA, Codiv 19, gripe, resfrío común, pie de atleta, malaria, tuberculosis, fiebre amarilla, brucelosis, amigdalitis aguda, neumonia, tetanos, salmonela, dengue, ébola, Hepatitis ABC, herpes, mononucleosis, Paperas, Rubeola, sarampion, varicela, viruela, candidiasis, amebiasis, toxoplasmosis.',
                'otro' => 0,
                'pregunta_id' => 5
            ],
            [
                'respuesta' => 'Ninguna',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 5
            ],
            [
                'respuesta' => 'Si, soy vegetariano(a)',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 6
            ],
            [
                'respuesta' => 'Si, soy vegano(a)',
                'ayuda' => '',
                'otro' => 0 ,
                'pregunta_id' => 6
            ],
            [
                'respuesta' => 'No, como casi de todo ',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 6
            ],
            [
                'respuesta' => 'Otra',
                'ayuda' => '',
                'otro' => 1,
                'pregunta_id' => 6
            ],
            [
                'respuesta' => 'Alimentos que contienen gluten',
                'ayuda' => 'Incluye el trigo, espelta, centeno, cebada, avena. Además podemos encontrarlos en otros alimentos elaborados con harina, levadura o en productos para hornear como pan, masas, tortas, pasteles y también en productos cárnicos y salsas.',
                'otro' => 0,
                'pregunta_id' => 7
            ],
            [
                'respuesta' => 'Crustáceos',
                'ayuda' => 'Incluye cangrejos, langosta, gambas, langostinos, cigalas. Además se puede encontrar en salsas, cremas o platos preparados.',
                'otro' => 0,
                'pregunta_id' => 7
            ],
            [
                'respuesta' => 'Huevos',
                'ayuda' => 'Además de en los huevos y productos lácteos se pueden encontrar en toras, pasteles, mayonesas, pasta, salsas preparadas.',
                'otro' => 0 ,
                'pregunta_id' => 7
            ],
            [
                'respuesta' => 'Pescado',
                'ayuda' => 'Además de en el pescado también en derivados y en salsas, aliños y cubos de sopa.',
                'otro' => 0,
                'pregunta_id' => 7
            ],
            [
                'respuesta' => 'Maní / frutos secos',
                'ayuda' => 'Cacahuetes y frutos secos pueden encontrarse en harinas, en diferentes tipos de pan, pasteles, pasta. Además de en galletas y chocolates.',
                'otro' => 0,
                'pregunta_id' => 7
            ],
            [
                'respuesta' => 'Soya',
                'ayuda' => 'Además de las semillas, también en los postres, yogur, helados, productos cárnicos, pastas',
                'otro' => 0,
                'pregunta_id' => 7
            ],
            [
                'respuesta' => 'Lácteos',
                'ayuda' => 'Lácteos y sus derivados, nata, queso, leche en polvo, yogures y en sopas, salsas, tortas, pasteles, pan, chocolate.',
                'otro' => 0,
                'pregunta_id' => 7
            ],
            [
                'respuesta' => 'Apio',
                'ayuda' => 'Incluye los tallos, raíces y semillas. Además puede encontrarse en los condimentos con sal de opio, ensaladas y algunos productos cárnicos, salsas.',
                'otro' => 0,
                'pregunta_id' => 7
            ],
            [
                'respuesta' => 'Otros tipos de alergias ',
                'ayuda' => 'Como al polen, polvo, lluvia, ácaros.',
                'otro' => 1,
                'pregunta_id' => 7
            ],
            [
                'respuesta' => 'Ninguna',
                'ayuda' => '',
                'otro' => 0 ,
                'pregunta_id' => 7
            ],
            [
                'respuesta' => '1 - 3 veces por semana',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 8
            ],
            [
                'respuesta' => 'Dia de por medio',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 8
            ],
            [
                'respuesta' => '1 vez al día',
                'ayuda' => '',
                'otro' => 0 ,
                'pregunta_id' => 8
            ],
            [
                'respuesta' => '2 veces al día',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 8
            ],
            [
                'respuesta' => '3 veces al día',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 8
            ],
            [
                'respuesta' => 'Más de 3 veces al día ',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 8
            ],
            [
                'respuesta' => 'Entre 5 y 10 veces al día',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 8
            ],
            [
                'respuesta' => 'Menos de 1L',
                'ayuda' => '3 vasos de agua, jugo o café u otra bebida al día.',
                'otro' => 0,
                'pregunta_id' => 9
            ],
            [
                'respuesta' => 'De 1L a 2L',
                'ayuda' => '4 - 6 vasos de agua, jugo o café u otra bebida al día.',
                'otro' => 0,
                'pregunta_id' => 9
            ],
            [
                'respuesta' => 'Más de 2L',
                'ayuda' => '7 en adelante vasos de agua, jugo o café u otra bebida al día.',
                'otro' => 0 ,
                'pregunta_id' => 9
            ],
            [
                'respuesta' => 'Productos Inbionova Minerales',
                'ayuda' => 'Bioremix, MegaEs, Purafib, Dolfin, Bioremix Maná, Armo300, etc.',
                'otro' => 0,
                'pregunta_id' => 10
            ],
            [
                'respuesta' => 'Vitaminas',
                'ayuda' => 'Suplementas con vitaminas en capsulas o en gotas, naturales y/o artificiales',
                'otro' => 0,
                'pregunta_id' => 10
            ],
            [
                'respuesta' => 'Aminoácidos esenciales',
                'ayuda' => 'Suplementas con aminos esenciales, no esenciales y condicionales como leucina, glutamin, etc.',
                'otro' => 0,
                'pregunta_id' => 10
            ],
            [
                'respuesta' => 'Proteínas',
                'ayuda' => 'Suplementas con suplemento proteico, Whey pritein, naturales y/o artificales.',
                'otro' => 0,
                'pregunta_id' => 10
            ],
            [
                'respuesta' => 'Fermentos o microorganismos',
                'ayuda' => 'Suplementas con fermentos, kombucha, kefir, etc.',
                'otro' => 0,
                'pregunta_id' => 10
            ],
            [
                'respuesta' => 'Minerales',
                'ayuda' => 'Suplementas con capsulas, jugos, polvos: hierro, calcio, magnesio, etc.',
                'otro' => 0,
                'pregunta_id' => 10
            ],
            [
                'respuesta' => 'Aceites esenciales ',
                'ayuda' => 'Suplementas con aceites esenciales',
                'otro' => 0,
                'pregunta_id' => 10
            ],
            [
                'respuesta' => 'Si, es un habito de muchos años',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 11
            ],
            [
                'respuesta' => 'Si, social',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 11
            ],
            [
                'respuesta' => 'No',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 11
            ],
            [
                'respuesta' => 'Si, es un habito de muchos años',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 12
            ],
            [
                'respuesta' => 'Si, social',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 12
            ],
            [
                'respuesta' => 'No',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 12
            ],
            [
                'respuesta' => 'Gripa',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 13
            ],
            [
                'respuesta' => 'Dolor de cabeza',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 13
            ],
            [
                'respuesta' => 'Ninguna ',
                'ayuda' => '',
                'otro' => 0,
                'pregunta_id' => 13
            ]
        ];

        foreach ($data as $respuestas) {
            Respuesta::create($respuestas);
        }
    }
}
