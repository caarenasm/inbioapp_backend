<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\TipoEvento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function tipoEventos()
    {
        $tipo_eventos = [];

        $tipo_eventos = TipoEvento::select('tipo_eventos.id', 'tipo_evento')->get()->toArray();

        return response([
            'data' => $tipo_eventos,
        ]);
    }

    // public function fechaEventos(Request $request)
    // {

    // }

    // public function lista_eventos(Request $request)
    // {

    //     $eventos = Evento::select("*");

    //     if ($request->tipo_evento != "") {
    //         $eventos->where('tipo_evento_id', '=', $request->tipo_evento);
    //     }

    //     if ($request->fechaInicio != "") {
    //         $eventos->whereBetween('fecha_evento', [$request->fechaInicio, $request->fechaFin]);
    //     }

    //     $eventos->get();

    //     return response([
    //         'data' => $eventos,
    //     ]);

    // }

    public function evento_unico(Request $request)
    {
        $response = [];

        $eventos = Evento::select( 'id', 'titulo', 'slug', 'imagen_url', 'descripcion', 'fecha_evento', 'hora')->where('id', '=', $request->id)
            ->orderBy('id', 'asc')->get()->toArray();

        return response()->json($eventos);
    }


    public function fecha(Request $request)
    {
        $response = [];

        $eventos = Evento::whereBetween('fecha_evento', [$request->fecha_inicial, $request->fecha_final])
        ->get()->toArray();

        return response()->json($eventos);
    }
}
