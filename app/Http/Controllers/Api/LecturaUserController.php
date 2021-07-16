<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
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
            'user_id'=> 'required',
            'tipo_lectura_id'=> 'required',
            'datos_leidos'=> 'required',
        ]);

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

        }catch (\Illuminate\Database\QueryException $e){

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
