<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\TipoEvento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function tipoEventos()
    {
        $tipo_eventos = [];

        $tipo_eventos = TipoEvento::select('tipo_eventos.id','tipo_evento')->get()->toArray();

        return response([
            'data' => $tipo_eventos
        ]);
    }

    public function fechaEventos(Request $request)
    {  


    }

    public function lista_eventos(Request $request)
    {

        $eventos = Evento::select("*");

        if($request->tipo_evento!=""){
            $eventos->where('tipo_evento_id' ,'=' ,$request->tipo_evento);
        }

        if($request->fechaInicio!=""){
            $eventos->whereBetween('fecha_evento',[$request->fechaInicio,$request->fechaFin]);
        }

        $eventos->get();

        return response([
            'data' => $eventos
        ]);

    }
}
