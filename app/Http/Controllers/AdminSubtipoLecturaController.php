<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminSubtipoLecturaRequest;
use App\Models\Icon;
use App\Models\SubtipoLectura;
use App\Models\TipoLectura;
use Illuminate\Http\Request;

class AdminSubtipoLecturaController extends Controller
{
    public function index()
    {
        $tipos_lecturas = TipoLectura::all();

        $iconos = Icon::all();

        $subtipos_lecturas = TipoLectura::join('subtipo_lecturas', 'tipo_lectura_id', '=', 'tipo_lecturas.id')
        ->select("*")
        ->get();

        return view('livewire.admin.subtipos-lecturas.subtipos-lecturas', ['iconos'=>$iconos,'subtipos_lecturas' => $subtipos_lecturas,'tipos_lecturas'=>$tipos_lecturas]);
        // return $subtipos_lecturas;
    }

    public function store(AdminSubtipoLecturaRequest $request)
    {

        $subtipo_lectura = new SubtipoLectura();

        $subtipo_lectura->descripcion = $request->descripcion;
        $subtipo_lectura->tipo_lectura_id = $request->tipo_lectura_id;
        $subtipo_lectura->icono = $request->icono;
        $subtipo_lectura->save();
        return redirect()->route('subtipos-lecturas.index');
    }

    public function edit(SubtipoLectura $subtipo_lectura)
    {
        $tipos_lecturas = TipoLectura::all();

        $iconos = Icon::all();

        $subtipos_lecturas = TipoLectura::join('subtipo_lecturas', 'tipo_lectura_id', '=', 'tipo_lecturas.id')
        ->select("*")
        ->get();

        return view('livewire.admin.subtipos-lecturas.editar-subtipos-lecturas', ['subtipos_lecturas' => $subtipos_lecturas, 'subtipo_lectura' => $subtipo_lectura,'tipos_lecturas'=>$tipos_lecturas,'iconos'=>$iconos]);
    }

    public function update(AdminSubtipoLecturaRequest $request,SubtipoLectura $subtipo_lectura)
    {
        $subtipo_lectura->descripcion = $request->descripcion;
        $subtipo_lectura->tipo_lectura_id = $request->tipo_lectura_id;
        $subtipo_lectura->icono = $request->icono;
        $subtipo_lectura->save();

        return redirect()->route('subtipos-lecturas.index');
    }

    public function destroy($id)
    {
        SubtipoLectura::destroy($id);
        return redirect()->route('subtipos-lecturas.index');
    }
}
