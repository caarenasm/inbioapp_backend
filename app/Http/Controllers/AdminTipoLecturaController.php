<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminTipoLecturaRequest;
use App\Models\CategoriaDiario;
use App\Models\TipoLectura;
use Illuminate\Http\Request;

class AdminTipoLecturaController extends Controller
{
    public function index()
    {
        $categorias_diarios = CategoriaDiario::all();

        $tipos_lecturas = CategoriaDiario::join('tipo_lecturas', 'categoria_diario_id', '=', 'categoria_diarios.id')
        ->select("*")
        ->get();

        return view('livewire.admin.tipos-lecturas.tipos-lecturas', ['tipos_lecturas' => $tipos_lecturas,'categorias_diarios'=>$categorias_diarios]);
        // return $tipos_lecturas;
    }

    public function store(AdminTipoLecturaRequest $request)
    {

        $tipo_lectura = new TipoLectura();

        $tipo_lectura->nombre = $request->nombre;
        $tipo_lectura->categoria_diario_id = $request->categoria_diario_id;
        $tipo_lectura->save();
        return redirect()->route('tipos-lecturas.index');
    }

    public function edit(TipoLectura $tipo_lectura)
    {
        $categorias_diarios = CategoriaDiario::all();

        $tipos_lecturas = CategoriaDiario::join('tipo_lecturas', 'categoria_diario_id', '=', 'categoria_diarios.id')
        ->select("*")
        ->get();
        
        return view('livewire.admin.tipos-lecturas.editar-tipos-lecturas', ['tipos_lecturas' => $tipos_lecturas, 'tipo_lectura' => $tipo_lectura,'categorias_diarios'=>$categorias_diarios]);
    }

    public function update(AdminTipoLecturaRequest $request,TipoLectura $tipo_lectura)
    {
        $tipo_lectura->nombre = $request->nombre;
        $tipo_lectura->categoria_diario_id = $request->categoria_diario_id;
        $tipo_lectura->save();

        return redirect()->route('tipos-lecturas.index');
    }

    public function destroy($id)
    {
        TipoLectura::destroy($id);
        return redirect()->route('tipos-lecturas.index');
    }
}
