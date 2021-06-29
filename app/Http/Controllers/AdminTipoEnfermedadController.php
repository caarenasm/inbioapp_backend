<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminTipoEnfermedadRequest;
use App\Models\TipoEnfermedad;

class AdminTipoEnfermedadController extends Controller
{
    public function index()
    {

        $tipo_enfermedades = TipoEnfermedad::all();
        return view('livewire.admin.tipo-enfermedades.tipo-enfermedades', ['tipo_enfermedades' => $tipo_enfermedades]);
        // return $tipo_enfermedades;
    }

    public function store(AdminTipoEnfermedadRequest $request)
    {

        $tipo_enfermedad = new TipoEnfermedad();

        $tipo_enfermedad->categoria_enfermedad = $request->categoria_enfermedad;
        $tipo_enfermedad->descripcion = $request->descripcion;
        $tipo_enfermedad->save();
        return redirect()->route('tipos-enfermedades.index');
    }

    public function edit(TipoEnfermedad $tipo_enfermedad)
    {
        $tipo_enfermedades = TipoEnfermedad::all();
        return view('livewire.admin.tipo-enfermedades.editar-tipo-enfermedades', ['tipo_enfermedades' => $tipo_enfermedades, 'tipo_enfermedad' => $tipo_enfermedad]);
    }

    public function update(AdminTipoEnfermedadRequest $request,TipoEnfermedad $tipo_enfermedad)
    {
        $tipo_enfermedad->categoria_enfermedad = $request->categoria_enfermedad;
        
        $tipo_enfermedad->descripcion = $request->descripcion;

        $tipo_enfermedad->save();

        return redirect()->route('tipos-enfermedades.index');
    }

    public function destroy($id)
    {
        TipoEnfermedad::destroy($id);
        return redirect()->route('tipos-enfermedades.index');
    }
}
