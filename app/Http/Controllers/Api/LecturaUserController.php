<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserTipoLecturaRequest;
use Illuminate\Http\Request;

//*******agregar esta linea******//
use Validator;
use DB;
use App\Models\LecturaUser;
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
                'total_horas' => 'required'
            ];

            $validator = Validator::make($data, $rules);
            if ($validator->passes()) {
                //TODO Handle your data
            } else {
                //TODO Handle your error
                dd($validator->errors()->all());
            }
        } else{
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
            }
        }


        if ($validator->fails()) {
            return response()->json([
                //'message' => $validator->errors()->first(), 
                'message' => $validator->getMessageBag()->toArray(),
                'status' => false
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

            /*$response['errors']  = array('ERROR ('.$e->getCode().'):'=> $e->getMessage());

            return response()->json([
                $response
            ], 400);*/

            return response()->json([
                'message' => 'Error en operacion!'
            ], 400);
        }
    }
}
