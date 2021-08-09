<?php

namespace App\Http\Controllers;

use App\Models\Alimento;
use App\Models\Enfermedad;
use App\Models\LecturaUser;
use App\Models\Plan;
use App\Models\Producto;
use App\Models\Receta;
use App\Models\EnfermedadRegulada;
use App\Models\ZonaCuerpo;
use App\Models\Users_datos;
use DateTime;

class AdminUsuarioInformacionController extends Controller
{
    public function index()
    {
        $users_datos = Users_datos::select('nombre', 'apellido', 'created_at', 'fecha_nacimiento', 'users_id')
            ->orderBy('id', 'asc')->get();

        foreach ($users_datos as $key => $value) {

            $fecha_creacion_usuario = date("d-m-Y", strtotime($value['created_at']));

            $users_datos[$key]['fecha_creacion_usuario'] = $fecha_creacion_usuario;

            $plan_users = Plan::join('plan_users', 'plan_id', '=', 'plans.id')
                ->select('titulo', 'plan_users.created_at', 'plan_id')->where('user_id', '=', $value['users_id'])->orderBy('plan_users.id', 'asc')
                ->get();

            foreach ($plan_users as $item => $value) {

                $users_datos[$key]['fecha_inscripcion'] = $fecha_plan = date("d-m-Y", strtotime($value['created_at']));

                if ($value['plan_id'] == 1) {
                    $fecha_terminacion = "No posee terminacion";
                    $users_datos[$key]['fecha_terminacion'] = $fecha_terminacion;

                } else {
                    $fecha_terminacion = date("d-m-Y", strtotime($value['created_at'] . "+ 3 month"));

                    $users_datos[$key]['fecha_terminacion'] = $fecha_terminacion;

                    $fecha_final = new DateTime($fecha_terminacion);
                    $fecha_inicial = new DateTime();

                    $dias = $fecha_inicial->diff($fecha_final);

                    $users_datos[$key]['dias_restantes'] = $dias->format('%R%a días');
                }

                $users_datos[$key]['titulo'] = $value['titulo'];
            }
        }

        // dd($users_datos);
        return view('livewire.admin.usuario-informacion.usuario-informacion', ['users_datos' => $users_datos]);
    }

    public function estadisticas_lecturas($user_id)
    {
        $lecturas = LecturaUser::join('tipo_lecturas', 'tipo_lectura_id', '=', 'tipo_lecturas.id')
            ->select('lectura_users.id', 'datos_leidos', 'tipo_lecturas.nombre', 'lectura_users.tipo_lectura_id', 'lectura_users.created_at')
            ->where('lectura_users.user_id', '=', $user_id)
            ->get();

        foreach ($lecturas as $key => $value) {

            $data = json_decode($value['datos_leidos'], true);

            switch ($value['tipo_lectura_id']) {

                //***Regular sueño***//
                case 1:
                    $lecturas[$key]['calidad_sueño'] = $data['calidad_sueño'];
                    $lecturas[$key]['hora_inicio'] = $data['hora_inicio'];
                    $lecturas[$key]['hora_fin'] = $data['hora_fin'];
                    $lecturas[$key]['total_horas'] = $data['total_horas'];
                    break;

                //***Peso actual***//
                case 2:
                    $lecturas[$key]['peso_actual'] = $data['peso_actual'];
                    break;
                
                //***Actividad fisica***//
                case 3:
                    $lecturas[$key]['actividad_fisica'] = $data['actividad_fisica'];
                    $lecturas[$key]['tiempo'] = $data['tiempo'];
                    $lecturas[$key]['distancia'] = $data['distancia'];
                    $lecturas[$key]['nivel_fatiga'] = $data['nivel_fatiga'];
                    $lecturas[$key]['nivel_energia'] = $data['nivel_energia'];
                    break;

                //***¿Qué comiste?***//
                case 4:
                    $desayuno = $data['desayuno'];
                    $almuerzo = $data['almuerzo'];
                    $cena = $data['cena'];
                    $snack = $data['mi_snack'];
                    $otro = $data['otro'];

                    $recetas_desayuno = Receta::select('titulo')
                        ->where('recetas.id', '=', $desayuno)
                        ->get();

                    $recetas_almuerzo = Receta::select('titulo')
                        ->where('recetas.id', '=', $almuerzo)
                        ->get();

                    $recetas_cena = Receta::select('titulo')
                        ->where('recetas.id', '=', $cena)
                        ->get();

                    $recetas_snack = Receta::select('titulo')
                        ->where('recetas.id', '=', $snack)
                        ->get();

                    $recetas_otro = Receta::select('titulo')
                        ->where('recetas.id', '=', $otro)
                        ->get();

                    $lecturas[$key]['desayuno'] = $recetas_desayuno;
                    $lecturas[$key]['almuerzo'] = $recetas_almuerzo;
                    $lecturas[$key]['cena'] = $recetas_cena;
                    $lecturas[$key]['snack'] = $recetas_snack;
                    $lecturas[$key]['otro'] = $recetas_otro;

                    break;
                
                //***Vasos de agua***//
                case 5:
                    $lecturas[$key]['vasos_agua'] = $data['vasos_agua'];
                    break;
                
                //***Incomodidad alimento***//
                case 6:

                    if ($data['estado'] == false) {

                        $lecturas[$key]['estado'] = "No";

                    } else {

                        $alimentos = $data['alimentos'];

                        $lista = [];

                        foreach ($alimentos as $item => $value) {

                            $resultado = Alimento::select('nombre')
                                ->where('alimentos.id', '=', $value)
                                ->get();

                            array_push($lista, $resultado);
                        }

                        $lecturas[$key]['estado'] = "Si";

                        $lecturas[$key]['incomodidades'] = $lista;
                    }

                    break;
                
                //***Suplementos***//
                case 7:

                    if ($data['estado'] == false) {

                        $lecturas[$key]['estado'] = "No";

                    } else {

                        $productos = $data['productos'];

                        $lista = [];

                        foreach ($productos as $item => $value) {

                            $resultado = Producto::select('title')
                                ->where('productos.id', '=', $value)
                                ->get();

                            array_push($lista, $resultado);
                        }

                        $lecturas[$key]['estado'] = "Si";

                        $lecturas[$key]['productos'] = $lista;
                    }

                    break;
                
                //***Deposiciones***//
                case 8:

                    if ($data['estado'] == false) {

                        $lecturas[$key]['estado'] = "No";
                        $lecturas[$key]['otros'] = $data['otros'];
                        $productos = $data['productos'];

                        $lista = [];

                        foreach ($productos as $item => $value) {

                            $resultado = Producto::select('title')
                                ->where('productos.id', '=', $value)
                                ->get();

                            array_push($lista, $resultado);
                        }

                        $lecturas[$key]['productos'] = $lista;

                    } else {

                        $lecturas[$key]['tipo_deposicion'] = $data['tipo_deposicion'];
                        
                        $lecturas[$key]['color'] = $data['color'];

                        $productos = $data['productos'];

                        $lista = [];

                        foreach ($productos as $item => $value) {

                            $resultado = Producto::select('title')
                                ->where('productos.id', '=', $value)
                                ->get();

                            array_push($lista, $resultado);
                        }

                        $lecturas[$key]['estado'] = "Si";

                        $lecturas[$key]['productos'] = $lista;
                    }

                    break;
                
                //***Enfermedades estacionales***//
                case 9:

                    if ($data['estado'] == false) {

                        $lecturas[$key]['estado'] = "No";

                    } else {

                        $enfermedades_estacionales = $data['enfermedades_estacionales'];

                        $lista = [];

                        foreach ($enfermedades_estacionales as $item => $value) {

                            $resultado = Enfermedad::select('enfermedad')
                                ->where('enfermedades.id', '=', $value)
                                ->get();

                            array_push($lista, $resultado);
                        }

                        $lecturas[$key]['estado'] = "Si";

                        $lecturas[$key]['enfermedades_estacionales'] = $lista;
                    }

                    break;
                
                //***Regular enfermedad***//
                case 10:

                    $lecturas[$key]['hora_medicion'] = $data['hora_medicion'];

                    $id = $data['enfermedad_regulada_id'];

                    //***Glucosa****//
                    if ($id === 1) {

                        $resultado = EnfermedadRegulada::select('enfermedad_regulada')
                            ->where('enfermedad_reguladas.id', '=', $id)
                            ->get();

                        foreach ($resultado as $item => $value) {

                            $lecturas[$key]['enfermedad'] = $value['enfermedad_regulada'];
                        }

                        $lecturas[$key]['mgdl'] = $data['mgdl'];

                    } else {

                        //***Presion Arterial***//
                        if ($id === 2) {

                            $resultado = EnfermedadRegulada::select('enfermedad_regulada')
                                ->where('enfermedad_reguladas.id', '=', $id)
                                ->get();

                            foreach ($resultado as $item => $value) {

                                $lecturas[$key]['enfermedad'] = $value['enfermedad_regulada'];
                            }

                            $lecturas[$key]['sys'] = $data['sys'];
                            $lecturas[$key]['dia'] = $data['dia'];
                            $lecturas[$key]['pul'] = $data['pul'];
                        } else {

                            //***Oxigeno***//
                            if ($id === 3) {

                                $resultado = EnfermedadRegulada::select('enfermedad_regulada')
                                    ->where('enfermedad_reguladas.id', '=', $id)
                                    ->get();

                                foreach ($resultado as $item => $value) {

                                    $lecturas[$key]['enfermedad'] = $value['enfermedad_regulada'];
                                }

                                $lecturas[$key]['spo'] = $data['spo'];
                                $lecturas[$key]['prbpm'] = $data['prbpm'];
                            }
                        }
                    }
                    break;
                
                //***Enfermedad en la visión***//
                case 11:

                    $enfermedad_vision = $data['enfermedades_vision'];

                    $lista = [];

                    foreach ($enfermedad_vision as $item => $value) {

                        $resultado = Enfermedad::select('enfermedad')
                            ->where('enfermedades.id', '=', $value)
                            ->get();

                        array_push($lista, $resultado);
                    }

                    $lecturas[$key]['vision'] = $lista;

                    break;
                
                //***Enfermedades gastricas***//
                case 12:

                    $enfermedades_gastricas = $data['enfermedades_gastricas'];

                    $lista = [];

                    foreach ($enfermedades_gastricas as $item => $value) {

                        $resultado = Enfermedad::select('enfermedad')
                            ->where('enfermedades.id', '=', $value)
                            ->get();

                        array_push($lista, $resultado);
                    }

                    $lecturas[$key]['gastricas'] = $lista;

                    break;
                
               //***Dolencias cuerpo***//
                case 13:

                    $zona = $data['zona_cuerpo_id'];

                    $zonas = ZonaCuerpo::select('zona')
                        ->where('zona_cuerpos.id', '=', $zona)
                        ->get();

                    foreach ($zonas as $item => $value) {

                        $lecturas[$key]['zona'] = $value['zona'];
                    }

                    $dolencias_cuerpo = $data['dolencias_cuerpo'];

                    $lista = [];

                    foreach ($dolencias_cuerpo as $item => $value) {

                        $resultado = Enfermedad::select('enfermedad')
                            ->where('enfermedades.id', '=', $value)
                            ->get();

                        array_push($lista, $resultado);
                    }

                    $lecturas[$key]['dolencias'] = $lista;

                    break;
                
                //***Señales en el organismo***//
                case 14:

                    $señales = $data['señales'];

                    $lista = [];

                    foreach ($señales as $item => $value) {

                        $resultado = Enfermedad::select('enfermedad')
                            ->where('enfermedades.id', '=', $value)
                            ->get();

                        array_push($lista, $resultado);
                    }

                    $lecturas[$key]['señales'] = $lista;

                    break;
                
                //***Alergias***//
                case 15:

                    $alergias = $data['alergias'];

                    $lista = [];

                    foreach ($alergias as $item => $value) {

                        $resultado = Enfermedad::select('enfermedad')
                            ->where('enfermedades.id', '=', $value)
                            ->get();

                        array_push($lista, $resultado);
                    }

                    $lecturas[$key]['alergias'] = $lista;

                    break;
                default:
                    # code...
                    break;
            }

        }
        return view('livewire.admin.usuario-informacion.estadisticas', ['lecturas' => $lecturas]);
    }

}
