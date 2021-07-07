<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alimento;
use App\Models\CategoriaAlimento;
use App\Models\EnfermedadUser;
use App\Models\EnfermedadAlimento;
//*******agregar esta linea******//
use Validator;
use DB;
//*******************************//

class EnfermedadAlimentoController extends Controller
{

    public function categoria()
    {
        $categorias_alimentos = [];

        $categorias_alimentos = CategoriaAlimento::select('categoria_alimentos.id','nombre_categoria')->get()->toArray();

        return response([
            'data' => $categorias_alimentos
        ]);
    }

    public function enfermedad_usuario(Request $request)
    {
        $enfermedades_usuario = [];

        $enfermedades_usuario = EnfermedadUser::join('enfermedades', 'enfermedad_id', '=', 'enfermedades.id')
            ->select('enfermedad_users.id','enfermedad_users.enfermedad_id','enfermedad')->where('enfermedad_users.user_id', '=', $request->User()->id)
            ->get()->toArray();

        return response([
            'data' => $enfermedades_usuario
        ]);
    }

    public function guardar(Request $request)
    {
        $arreglo_enfermedades = $request->enfermedad_id;

        // dd(count($arreglo_enfermedades));
        $validator = Validator::make($request->all(), [
            'enfermedad_id' => 'required',
            'user_id' => 'required'
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

            for ($i = 0; $i < count($arreglo_enfermedades); $i++) {
                if (!empty($request->enfermedad_id[$i])) {

                    $enfermedad_usuario = new EnfermedadUser();
                    $enfermedad_usuario->user_id = $request->User()->id;
                    $enfermedad_usuario->enfermedad_id = $request->enfermedad_id[$i];
                    $enfermedad_usuario->save();
                }
            }

            DB::commit();

            return response()->json([
                'message' => 'realcion creada con exito!',
                'data' => $request->all()
            ], 200);
        } catch (\Illuminate\Database\QueryException $e) {

            DB::rollback();

            $response['errors']  = array('ERROR (' . $e->getCode() . '):' => $e->getMessage());

            return response()->json([
                $response
            ], 400);

            return response()->json([
                'message' => 'Error en operacion!'
            ], 400);
        }
    }

    public function semaforo(Request $request)
    {

        $enfermedad = $request->enfermedad_id;

        $categoria = $request->categoria_id;

        $semaforo = EnfermedadAlimento::select('enfermedad_alimentos.id', 'nombre', 'recomendacion')
            ->join('alimentos as t01', 'enfermedad_alimentos.alimento_id', '=', 't01.id')
            ->where('categoria_alimento_id', '=', $categoria)
            ->where('enfermedad_id', '=', $enfermedad)
            ->get()
            ->toArray();

        return response([
            'data' => $semaforo
        ]);
    }
}
