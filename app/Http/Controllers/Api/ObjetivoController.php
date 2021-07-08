<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//*******agregar esta linea******//
use Validator;
use DB;
use App\Models\Objetivo;
use App\Models\ObjetivoUser;
//*******************************//

class ObjetivoController extends Controller
{
    public function user_objetivo(Request $request){

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'objetivo_id' => 'required',
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

            $user_objetivo = New ObjetivoUser;

            $user_objetivo->user_id = $request->user_id;
            // $user_objetivo->user_id = Auth::$id;
            $user_objetivo->objetivo_id = $request->objetivo_id;
            $user_objetivo->save();

            DB::commit();

            return response()->json([
                'message' => 'Usuario creado con exito!',
                'data' => $request->all()
            ], 200);

        }catch (\Illuminate\Database\QueryException $e){

            DB::rollback();

            // $response['errors']  = array('ERROR ('.$e->getCode().'):'=> $e->getMessage());

            // return response()->json([
            //     $response
            // ], 400);

            return response()->json([
                'message' => 'Error en operacion!'
            ], 400);
        }

            
    }

    public function lista(){

        $objetivos = [];
        
        $objetivos = Objetivo::select('id', 'nombre_objetivo', 'descripcion', 'imagen_url')
        ->orderBy('id','asc')->get()->toArray();

            return response([
                'data' => $objetivos
            ]);
            
    }
}
