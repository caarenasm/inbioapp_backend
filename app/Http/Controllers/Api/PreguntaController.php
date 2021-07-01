<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    public function lista(){

        $preguntas = Pregunta::select('id', 'pregunta', 'icono', 'descripcion', 'tipo_respuestas')
        ->orderBy('id','asc')->get()->toArray();

        foreach ($preguntas as $key => $value) {

            $respuestas = Respuesta::select('respuestas.id','respuesta', 'ayuda', 'otro',)
            ->where('pregunta_id','=',$value['id'])->orderBy('id','asc')->get()->toArray();

            $preguntas[$key]['respuestas'] = $respuestas;
            $response = $preguntas;

            $response = [];
            }

            return response([
                'data' => $response
            ]);
            
    }
}
