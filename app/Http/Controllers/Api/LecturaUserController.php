<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\LecturaUser;

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

        if ($request->tipo_lectura_id == 1) {

            $data = json_decode($request->datos_leidos, true);
            $rules = [
                'id' => 'required',
                'calidad_sueño' => 'required', //Must be a number and length of value is 8
                'hora_inicio' => 'required',
                'hora_fin' => 'required',
                'total_horas' => 'required',
            ];

            $validator = Validator::make($data, $rules);
            if ($validator->passes()) {
                //TODO Handle your data
            } else {
                //TODO Handle your error
                dd($validator->errors()->all());
            }
        } else {
            if ($request->tipo_lectura_id == 2) {
                $data = json_decode($request->datos_leidos, true);
                $rules = [
                    'id' => 'required',
                    'peso_actual' => 'required', //Must be a number and length of value is 8
                ];

                $validator = Validator::make($data, $rules);

                if ($validator->passes()) {
                    //TODO Handle your data
                } else {
                    //TODO Handle your error
                    dd($validator->errors()->all());
                }
            } else {
                if ($request->tipo_lectura_id == 3) {
                    $data = json_decode($request->datos_leidos, true);
                    $rules = [
                        'id' => 'required',
                        'actividad_fisica' => 'required',
                        'tiempo' => 'required',
                        'distancia' => 'required',
                        'nivel_energia' => 'required',
                        'nivel_fatiga' => 'required', //Must be a number and length of value is 8
                    ];

                    $validator = Validator::make($data, $rules);
                    if ($validator->passes()) {
                        //TODO Handle your data
                    } else {
                        //TODO Handle your error
                        dd($validator->errors()->all());
                    }
                } else {
                    if ($request->tipo_lectura_id == 4) {
                        $data = json_decode($request->datos_leidos, true);
                        $rules = [
                            'id' => 'required',
                            'desayuno' => 'required',
                            'almuerzo' => 'required',
                            'cena' => 'required',
                            'mi_snack' => 'required',
                        ];

                        $validator = Validator::make($data, $rules);
                        if ($validator->passes()) {
                            //TODO Handle your data
                        } else {
                            //TODO Handle your error
                            dd($validator->errors()->all());
                        }
                    } else {
                        if ($request->tipo_lectura_id == 5) {
                            $data = json_decode($request->datos_leidos, true);
                            $rules = [
                                'id' => 'required',
                                'vasos_agua' => 'required',
                            ];

                            $validator = Validator::make($data, $rules);
                            if ($validator->passes()) {
                                //TODO Handle your data
                            } else {
                                //TODO Handle your error
                                dd($validator->errors()->all());
                            }
                        } else {
                            if ($request->tipo_lectura_id == 6) {
                                $data = json_decode($request->datos_leidos, true);
                                $rules = [
                                    'id' => 'required',
                                    'estado' => 'required',
                                ];

                                if (!empty($data["estado"])) {
                                    if ($data["estado"] == 2) {
                                        $rules = array_merge($rules, [
                                            'alimentos' => 'required',
                                        ]);
                                    }
                                }

                                $validator = Validator::make($data, $rules);

                                if ($validator->passes()) {
                                    //TODO Handle your data
                                } else {
                                    //TODO Handle your error
                                    dd($validator->errors()->all());
                                }
                            } else {
                                if ($request->tipo_lectura_id == 7) {
                                    $data = json_decode($request->datos_leidos, true);
                                    $rules = [
                                        'id' => 'required',
                                        'estado' => 'required',
                                    ];

                                    if (!empty($data["estado"])) {
                                        if ($data["estado"] == 2) {
                                            $rules = array_merge($rules, [
                                                'productos' => 'required',
                                            ]);
                                        }
                                    }

                                    $validator = Validator::make($data, $rules);

                                    if ($validator->passes()) {
                                        //TODO Handle your data
                                    } else {
                                        //TODO Handle your error
                                        dd($validator->errors()->all());
                                    }
                                } else {
                                    if ($request->tipo_lectura_id == 8) {
                                        $data = json_decode($request->datos_leidos, true);
                                        $rules = [
                                            'id' => 'required',
                                            'estado' => 'required',
                                        ];

                                        if (!empty($data["estado"])) {
                                            if ($data["estado"] == 1) {
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

                                        if ($validator->passes()) {
                                            //TODO Handle your data
                                        } else {
                                            //TODO Handle your error
                                            dd($validator->errors()->all());
                                        }
                                    } else {
                                        if ($request->tipo_lectura_id == 9) {
                                            $data = json_decode($request->datos_leidos, true);
                                            $rules = [
                                                'id' => 'required',
                                                'estado' => 'required',
                                            ];

                                            if (!empty($data["estado"])) {
                                                if ($data["estado"] == 2) {
                                                    $rules = array_merge($rules, [
                                                        'enfermedades_estacionales' => 'required',
                                                    ]);
                                                }
                                            }

                                            $validator = Validator::make($data, $rules);

                                            if ($validator->passes()) {
                                                //TODO Handle your data
                                            } else {
                                                //TODO Handle your error
                                                dd($validator->errors()->all());
                                            }
                                        } else {
                                            if ($request->tipo_lectura_id == 10) {
                                                $data = json_decode($request->datos_leidos, true);
                                                $rules = [
                                                    'id' => 'required',
                                                    'enfermedad_regulada' => 'required',
                                                    'hora_medicion' => 'required',
                                                ];

                                                if (!empty($data["enfermedad_regulada"])) {
                                                    if ($data["enfermedad_regulada"] === "glucosa") {
                                                        $rules = array_merge($rules, [
                                                            'mgdl' => 'required',
                                                        ]);
                                                    } else {
                                                        if ($data["enfermedad_regulada"] === "presion_arterial") {
                                                            $rules = array_merge($rules, [
                                                                'sys' => 'required',
                                                                'dia' => 'required',
                                                                'pul' => 'required',
                                                            ]);
                                                        } else {
                                                            if ($data["enfermedad_regulada"] === "oxigeno") {
                                                                $rules = array_merge($rules, [
                                                                    'spo' => 'required',
                                                                    'prbpm' => 'required',
                                                                ]);
                                                            }
                                                        }
                                                    }
                                                }
                                                $validator = Validator::make($data, $rules);

                                                if ($validator->passes()) {
                                                    //TODO Handle your data
                                                } else {
                                                    //TODO Handle your error
                                                    dd($validator->errors()->all());
                                                }
                                            } else {
                                                if ($request->tipo_lectura_id == 11) {
                                                    $data = json_decode($request->datos_leidos, true);
                                                    $rules = [
                                                        'id' => 'required',
                                                        'enfermedades_vision' => 'required',
                                                    ];

                                                    $validator = Validator::make($data, $rules);

                                                    if ($validator->passes()) {
                                                        //TODO Handle your data
                                                    } else {
                                                        //TODO Handle your error
                                                        dd($validator->errors()->all());
                                                    }
                                                } else {
                                                    if ($request->tipo_lectura_id == 12) {
                                                        $data = json_decode($request->datos_leidos, true);
                                                        $rules = [
                                                            'id' => 'required',
                                                            'enfermedades_gastricas' => 'required',
                                                        ];
                                                        $validator = Validator::make($data, $rules);

                                                        if ($validator->passes()) {
                                                            //TODO Handle your data
                                                        } else {
                                                            //TODO Handle your error
                                                            dd($validator->errors()->all());
                                                        }
                                                    } else {
                                                        if ($request->tipo_lectura_id == 13) {
                                                            $data = json_decode($request->datos_leidos, true);
                                                            $rules = [
                                                                'id' => 'required',
                                                                'zona_cuerpo' => 'required',
                                                                'dolencias_cuerpo' => 'required',
                                                            ];
                                                            $validator = Validator::make($data, $rules);

                                                            if ($validator->passes()) {
                                                                //TODO Handle your data
                                                            } else {
                                                                //TODO Handle your error
                                                                dd($validator->errors()->all());
                                                            }
                                                        } else {
                                                            if ($request->tipo_lectura_id == 14) {
                                                                $data = json_decode($request->datos_leidos, true);
                                                                $rules = [
                                                                    'id' => 'required',
                                                                    'señales' => 'required',
                                                                ];
                                                                $validator = Validator::make($data, $rules);

                                                                if ($validator->passes()) {
                                                                    //TODO Handle your data
                                                                } else {
                                                                    //TODO Handle your error
                                                                    dd($validator->errors()->all());
                                                                }
                                                            } else {
                                                                if ($request->tipo_lectura_id == 15) {
                                                                    $data = json_decode($request->datos_leidos, true);
                                                                    $rules = [
                                                                        'id' => 'required',
                                                                        'alergias' => 'required',
                                                                    ];
                                                                    $validator = Validator::make($data, $rules);

                                                                    if ($validator->passes()) {
                                                                        //TODO Handle your data
                                                                    } else {
                                                                        //TODO Handle your error
                                                                        dd($validator->errors()->all());
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        if ($validator->fails()) {
            return response()->json([
                //'message' => $validator->errors()->first(),
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
                'message' => 'Usuario creado con exito!',
                //'data' => $request->all()
            ], 200);
        } catch (\Illuminate\Database\QueryException $e) {

            DB::rollback();

            $response['errors']  = array('ERROR ('.$e->getCode().'):'=> $e->getMessage());

            return response()->json([
            $response
            ], 400);

            return response()->json([
                'message' => 'Error en operacion!',
            ], 400);
        }
    }
}
