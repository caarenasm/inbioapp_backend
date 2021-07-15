<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminEventoRequest;
use App\Models\Evento;
use App\Models\TipoEvento;
use Illuminate\Http\Request;

class AdminEventoController extends Controller
{
    public function index()
    {

        $tipo_eventos = TipoEvento::all();

        $eventos = TipoEvento::join('eventos', 'tipo_evento_id', '=', 'tipo_eventos.id')
        ->select("*")
        ->get();

        return view('livewire.admin.eventos.eventos', ['eventos' => $eventos,'tipo_eventos'=>$tipo_eventos]);
        // return $eventos;
    }

    public function store(AdminEventoRequest $request)
    {

        $eventos = new Evento();

        $eventos->titulo = $request->titulo;
        $eventos->slug = $request->slug;
        
        if ($request->hasFile('imagen_url')){
            $file           = $request->file("imagen_url");
            $nombrearchivo  = $file->getClientOriginalName();
            $file->move(public_path("imagenes/eventos/"),$nombrearchivo);
            $eventos->imagen_url      = $nombrearchivo;
        }

        $eventos->descripcion = $request->descripcion;
        $eventos->fecha_evento = $request->fecha_evento != '' ? $request->fecha_evento : date('Y-m-d');
        $eventos->hora = $request->hora != '' ? $request->hora :date("H:i:s");
        $eventos->tipo_evento_id = $request->tipo_evento_id;

        $eventos->save();
        // return $eventos;
        return redirect()->route('eventos.index');
    }

    public function edit(Evento $evento)
    {
        $tipo_eventos = TipoEvento::all();

        $eventos = TipoEvento::join('eventos', 'tipo_evento_id', '=', 'tipo_eventos.id')
        ->select("*")
        ->get();

        return view('livewire.admin.eventos.editar-eventos', ['eventos' => $eventos, 'evento' => $evento, 'tipo_eventos' => $tipo_eventos]);
    }

    public function update(AdminEventoRequest $request,Evento $evento)
    {
        $evento->titulo = $request->titulo;
        $evento->slug = $request->slug;
        
        if ($request->hasFile('imagen_url')){
            $file           = $request->file("imagen_url");
            $nombrearchivo  = $file->getClientOriginalName();
            $file->move(public_path("imagenes/eventos/"),$nombrearchivo);
            $evento->imagen_url      = $nombrearchivo;
        }

        $evento->descripcion = $request->descripcion;
        $evento->fecha_evento = $request->fecha_evento != '' ? $request->fecha_evento : date('Y-m-d');
        $evento->hora = $request->hora != '' ? $request->hora :date("H:i:s");
        $evento->tipo_evento_id = $request->tipo_evento_id;

        $evento->save();

        return redirect()->route('eventos.index');
    }

    public function destroy($id)
    {
        Evento::destroy($id);
        return redirect()->route('eventos.index');
    }
}
