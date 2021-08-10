<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\LecturaUser;
use App\Models\TipoLectura;

//*******agregar esta linea******//
use DB;
use Illuminate\Http\Request;
use Validator;

//*******************************//

class LecturaUserController extends Controller
{

    public function guardar(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'tipo_lectura_id' => 'required',
            'datos_leidos' => 'required',
        ]);

        $tipo_lectura = $request->tipo_lectura_id;
        $data = json_decode($request->datos_leidos, true);
        $validator = [];

        switch ($tipo_lectura) {

            //***Regular sueño***//
            case 1:
                $rules = [
                    'calidad_sueño' => 'required',
                    'hora_inicio' => 'required',
                    'hora_fin' => 'required',
                    'total_horas' => 'required',
                ];

                $validator = Validator::make($data, $rules);

                break;

            //***Peso actual***//
            case 2:
                $rules = [
                    'peso_actual' => 'required',
                ];

                $validator = Validator::make($data, $rules);

                break;

            //***Actividad fisica***//
            case 3:
                $rules = [
                    'actividad_fisica' => 'required',
                    'tiempo' => 'required',
                    'distancia' => 'required',
                    'nivel_energia' => 'required',
                    'nivel_fatiga' => 'required',
                ];

                $validator = Validator::make($data, $rules);

                break;

            //***¿Qué comiste?***//
            case 4:
                $rules = [
                    'desayuno' => 'required',
                    'almuerzo' => 'required',
                    'cena' => 'required',
                    'mi_snack' => 'required',
                ];

                $validator = Validator::make($data, $rules);
                break;

            //***Vasos de agua***//
            case 5:
                $rules = [
                    'vasos_agua' => 'required',
                ];

                $validator = Validator::make($data, $rules);
                break;

            //***Incomodidad alimento***//
            case 6:
                $rules = [
                    'estado' => 'required',
                ];

                if (!empty($data["estado"])) {
                    if ($data["estado"] == true) {
                        $rules = array_merge($rules, [
                            'alimentos' => 'required',
                        ]);
                    }
                }

                $validator = Validator::make($data, $rules);
                break;

            //***Suplementos***//
            case 7:
                $rules = [
                    'estado' => 'required',
                ];

                if (!empty($data["estado"])) {
                    if ($data["estado"] == true) {
                        $rules = array_merge($rules, [
                            'productos' => 'required',
                        ]);
                    }
                }

                $validator = Validator::make($data, $rules);
                break;

            //***Deposiciones***//
            case 8:
                $rules = [
                    'estado' => 'required',
                ];

                if (!empty($data["estado"])) {
                    if ($data["estado"] == false) {
                        $rules = array_merge($rules, [
                            'otros' => 'required',
                            'productos' => 'required',
                        ]);
                    } else {
                        $rules = array_merge($rules, [
                            'tipo_deposicion' => 'required',
                            'color' => 'required',
                            'productos' => 'required',
                        ]);
                    }
                }

                $validator = Validator::make($data, $rules);
                break;

            //***Enfermedades estacionales***//
            case 9:
                $rules = [
                    'estado' => 'required',
                ];

                if (!empty($data["estado"])) {
                    if ($data["estado"] == true) {
                        $rules = array_merge($rules, [
                            'enfermedades_estacionales' => 'required',
                        ]);
                    }
                }

                $validator = Validator::make($data, $rules);
                break;

            //***Regular enfermedad***//
            case 10:
                $rules = [
                    'enfermedad_regulada_id' => 'required',
                    'hora_medicion' => 'required',
                ];

                if (!empty($data["enfermedad_regulada_id"])) {
                    //***Glucosa****//

                    if ($data["enfermedad_regulada_id"] == 1) {
                        $rules = array_merge($rules, [
                            'mgdl' => 'required',
                        ]);
                    } else {
                        //***Presion Arterial***//
                        if ($data["enfermedad_regulada_id"] == 2) {
                            $rules = array_merge($rules, [
                                'sys' => 'required',
                                'dia' => 'required',
                                'pul' => 'required',
                            ]);
                        } else {
                            //***Oxigeno***//
                            if ($data["enfermedad_regulada_id"] == 3) {
                                $rules = array_merge($rules, [
                                    'spo' => 'required',
                                    'prbpm' => 'required',
                                ]);
                            }
                        }
                    }
                }
                $validator = Validator::make($data, $rules);
                break;

            //***Enfermedad en la visión***//
            case 11:
                $rules = [

                    'enfermedades_vision' => 'required',
                ];

                $validator = Validator::make($data, $rules);
                break;

            //***Enfermedades gastricas***//
            case 12:
                $rules = [

                    'enfermedades_gastricas' => 'required',
                ];
                $validator = Validator::make($data, $rules);
                break;

            //***Dolencias cuerpo***//
            case 13:
                $rules = [
                    'zona_cuerpo_id' => 'required',
                    'dolencias_cuerpo' => 'required',
                ];
                $validator = Validator::make($data, $rules);
                break;

            //***Señales en el organismo***//
            case 14:
                $rules = [
                    'señales' => 'required',
                ];
                $validator = Validator::make($data, $rules);
                break;

            //***Alergias***//
            case 15:
                $rules = [
                    'alergias' => 'required',
                ];

                $validator = Validator::make($data, $rules);
                break;
            default:
                return response()->json([
                    'message' => "La opcion no se encuentra"]);
                break;
        }

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->toArray(),
                'status' => false,
            ], 500);
        }

        DB::beginTransaction();

        try {

            $lectura_users = new LecturaUser();
            $lectura_users->user_id = $request->User()->id;
            $lectura_users->tipo_lectura_id = $request->tipo_lectura_id;
            $lectura_users->datos_leidos = $request->datos_leidos;

            $lectura_users->save();

            DB::commit();

            return response()->json([
                'message' => 'lectura creada con exito!',
                'status' => true,
            ], 200);
        } catch (\Illuminate\Database\QueryException $e) {

            DB::rollback();

            /* $response['errors'] = array('ERROR (' . $e->getCode() . '):' => $e->getMessage());

            return response()->json([
            $response,
            ], 400);*/

            return response()->json([
                'message' => 'Error en operacion!',
                'status' => false,
            ], 400);
        }
    }
}
