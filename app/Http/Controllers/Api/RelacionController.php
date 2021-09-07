<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/********************/
use Validator;
use App\Models\DiarioRelaciones;
/*********************/

class RelacionController extends Controller
{
    public function lista( Request $request){

        $validator = Validator::make($request->all(), [
            'tipo' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->toArray(), 
                'status' => false
            ], 500);
        }
        
        $data = DiarioRelaciones::select('id', 'descripcion', 'icono', 'padre_id', 'tipo_id')
        ->where('tipo_id', '=', $request->tipo);

        if($request->padre){
            $data->where('padre_id', '=', $request->padre);
        }

        $data->orderBy('id','asc')->get()->toArray();

        return response()->json([
            'status' => true,
            'data' => $data
        ], 200);
            
    }
}
