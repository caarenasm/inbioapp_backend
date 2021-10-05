<?php

namespace App\Http\Controllers\Api;

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
    public function guardar(Request $request){

        $validator = Validator::make($request->all(), [
            /*'user_id' => 'required',*/
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
            /*$user_objetivo->user_id = $request->user_id;*/
            $user_objetivo->user_id = $request->user()->id;
            $user_objetivo->objetivo_id = $request->objetivo_id;
            $user_objetivo->save();

            DB::commit();

            return response()->json([
                'message' => 'Datos guardados con exito!',
                'status' => true
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

        $response = [];
        
        $objetivos = Objetivo::select('id', 'nombre_objetivo', 'descripcion', 'imagen_url')
        ->orderBy('id','asc')->get()->toArray();

        foreach ($objetivos as $key => $value) {
            $response[$key]['id'] = $value['id'];
            $response[$key]['nombre'] = $value['nombre_objetivo'];
            $response[$key]['descripcion'] = $value['descripcion'];
            $response[$key]['imagen_url'] = asset('imagenes/objetivos/' . $value['imagen_url']);
        }

        return response()->json($response);
            
    }
}
