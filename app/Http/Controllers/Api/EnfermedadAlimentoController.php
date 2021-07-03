<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alimento;

class EnfermedadAlimentoController extends Controller
{
    public function listar_alimentos_categoria(Request $request){
        
        $alimentos_enfermedad = [];

        $alimentos_enfermedad = Alimento::join('enfermedad_alimentos', 'alimento_id', '=', 'alimentos.id')
        ->select("*")->where('alimentos.categoria_alimento_id', '=', $request->categoria_id)
        ->get()->toArray();

        return response([
            'data' => $alimentos_enfermedad
        ]);
    }

    public function listar_alimentos_enfermedad(Request $request){

            $alimentos_enfermedad = [];
            
            $alimentos_enfermedad = Alimento::join('enfermedad_alimentos', 'alimento_id', '=', 'alimentos.id')
            ->select("*")->where('enfermedad_alimentos.enfermedad_id', '=', $request->enfermedad_id)
            ->get()->toArray();
    
            
        return response([
            'data' => $alimentos_enfermedad
        ]);
    }
}
