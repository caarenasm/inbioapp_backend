<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


//*******agregar esta linea******//
use Validator;
use DB;
use App\Models\Plan;
use App\Models\PlanUser;
//*******************************//

class PlanController extends Controller
{

    public function user_plan(Request $request){

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'plan_id' => 'required',
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

            $user_plan = New PlanUser;

            $user_plan->user_id = $request->user_id;
            // $user_plan->user_id = Auth::$id;
            $user_plan->plan_id = $request->plan_id;
            $user_plan->save();

            DB::commit();

            return response()->json([
                'message' => 'Usuario creado con exito!',
                'data' => $request->all()
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

    public function lista(){

        $plans = [];
        
        $plans = Plan::select('id', 'titulo', 'slug', 'descripcion', 'imagen_url', 'precio')
        ->orderBy('id','asc')->get()->toArray();

            return response([
                'data' => $plans
            ]);
            
    }
}
