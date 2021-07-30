<?php

namespace App\Http\Controllers;
use App\Models\Users_datos;
use App\Models\Plan;
use App\Models\TipoLectura;
use DateTime;
use Illuminate\Http\Request;

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
        return view('livewire.admin.usuario-informacion.usuario-informacion', ['users_datos' => $users_datos]);
    }

    public function indexEstadisticas($id)
    {
                $tipo_lectura = TipoLectura::join('lectura_users', 'tipo_lectura_id', '=', 'tipo_lecturas.id')
                ->select('tipo_lecturas.nombre')
                ->where('tipo_lecturas.user_id', '=', $id)
                ->get()->toArray();


        return view('livewire.admin.usuario-informacion.estadisticas');
    }


}
