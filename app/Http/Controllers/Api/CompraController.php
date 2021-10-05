<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

//*******agregar esta linea******//
use App\Models\Compra;
use App\Models\CompraDetalle;
use DB;
use Illuminate\Http\Request;
use Validator;

//*******************************//

class CompraController extends Controller
{
    public function user_compra(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'productos' => 'required',
        ]);

        $data = json_decode($request->productos, true);

        foreach ((array) $data as $key => $value) {
            $rules[$key] = [
                'producto_id' => 'required',
                'cantidad' => 'required',
                'mo_unitario' => 'required',
                'mo_total' => 'required',
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

            $documentos = Compra::count();

            if ($documentos == 0) {
                $documentos = 1;
                $correlativo = str_pad($documentos, 5, "0", STR_PAD_LEFT );
            } else {
                $documentos = $documentos + 1;
                $correlativo = str_pad($documentos, 5, "0", STR_PAD_LEFT );
            }

            $user_compra = new Compra;
            $user_compra->user_id = $request->user()->id;
            $user_compra->nu_compra = $correlativo;
            $user_compra->productos = $request->productos;
            $user_compra->save();

            $total = 0;
            $compras = json_decode($request->productos, true);
            
            foreach ($compras as $key => $value) {
                $user_compra_detalle = new CompraDetalle;
                $user_compra_detalle->user_id = $request->user()->id;
                $user_compra_detalle->compra_id = $user_compra->id;
                $user_compra_detalle->producto_id = $value['producto_id'];
                $user_compra_detalle->cantidad = $value['cantidad'];
                $user_compra_detalle->mo_unitario = $value['mo_unitario'];
                $user_compra_detalle->mo_total = $value['mo_total'];
                $user_compra_detalle->save();

                $total = $total + $value['mo_total'];
            }

            $user_compra = Compra::find($user_compra->id);
            $user_compra->total = $total;
            $user_compra->save();

            DB::commit();

            return response()->json([
                'message' => 'Compra creada con exito!',
                'data' => $request->all(),
            ], 200);

        } catch (\Illuminate\Database\QueryException $e) {

            DB::rollback();

            $response['errors'] = array('ERROR (' . $e->getCode() . '):' => $e->getMessage());

            return response()->json([
                $response,
            ], 400);

            return response()->json([
                'message' => 'Error en operacion!',
            ], 400);
        }

    }
}
