<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;

//*******agregar esta linea******//
use DB;
use Illuminate\Http\Request;
use Validator;
use App\Models\Compra;
use App\Models\CompraDetalle;
//*******************************//

class CompraController extends Controller
{
    public function user_compra(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'productos' => 'required',
            'fecha' => 'required',
            'consecutivo' => 'required',
            'compra_id' => 'required',
            "total_compra" => 'required',
        ]);

        $data = json_decode($request->productos, true);

        
        foreach ((array) $data as $key => $value) {
            $rules[$key] = [
                'alimento_id' => 'required',
                'cantidad' => 'required',
                'valor_unitario' => 'required',
                'valor_total' => 'required',
            ];
        }

        $validator = [];
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json([
                //'message' => $validator->errors()->first(),
                'message' => $validator->getMessageBag()->toArray(),
                'status' => false,
            ], 500);
        }

        DB::beginTransaction();

        try {

            $user_compra = new Compra;

            $user_compra_detalle = new CompraDetalle;

            $user_compra->productos = $request->productos;

            $user_compra_detalle->user_id = $request->user_id;
            // $user_compra_detalle->user_id = Auth::$id;
            $user_compra_detalle->compra_id = $request->compra_id;
            $user_compra_detalle->fecha = $request->fecha;
            $user_compra_detalle->consecutivo = $request->consecutivo;

            $user_compra->save();

            DB::commit();

            return response()->json([
                'message' => 'Compra creada con exito!',
                'data' => $request->all(),
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
