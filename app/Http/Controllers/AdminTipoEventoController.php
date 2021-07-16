<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminTipoEventoRequest;
use App\Models\TipoEvento;
use Illuminate\Http\Request;

class AdminTipoEventoController extends Controller
{
    public function index()
    {

        $tipo_eventos = TipoEvento::all();
        return view('livewire.admin.tipo-eventos.tipo-eventos', ['tipo_eventos' => $tipo_eventos]);
        // return $tipo_eventos;
    }

    public function store(AdminTipoEventoRequest $request)
    {

        $tipo_eventos = new TipoEvento();

        $tipo_eventos->tipo_evento = $request->tipo_evento;
        $tipo_eventos->save();
        // return $tipo_eventos;
        return redirect()->route('tipo-eventos.index');
    }

    public function edit(TipoEvento $tipo_evento)
    {
        $tipo_eventos = TipoEvento::all();
        return view('livewire.admin.tipo-eventos.editar-tipo-eventos', ['tipo_eventos' => $tipo_eventos, 'tipo_evento' => $tipo_evento]);
    }

    public function update(AdminTipoEventoRequest $request,TipoEvento $tipo_evento)
    {
        $tipo_evento->tipo_evento = $request->tipo_evento;

        $tipo_evento->save();

        return redirect()->route('tipo-eventos.index');
    }

    public function destroy($id)
    {
        TipoEvento::destroy($id);
        return redirect()->route('tipo-eventos.index');
    }
}
