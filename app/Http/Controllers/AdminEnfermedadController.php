<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminEnfermedadRequest;
use App\Models\Enfermedad;
use App\Models\TipoEnfermedad;
use Illuminate\Http\Request;

class AdminEnfermedadController extends Controller
{
    public function index()
    {

        $enfermedades = TipoEnfermedad::join('enfermedades', 'tipo_enfermedad_id', '=', 'tipo_enfermedades.id')
        ->select("*")
        ->get();

        $tipo_enfermedades = TipoEnfermedad::all();

        return view('livewire.admin.enfermedades.enfermedades', ['enfermedades' => $enfermedades, 'tipo_enfermedades'=> $tipo_enfermedades]);
        
        // return $enfermedades;
    }

    public function store(AdminEnfermedadRequest $request)
    {
        
        $enfermedades = new Enfermedad();

        $enfermedades->enfermedad = $request->enfermedad;
        $enfermedades->descripcion = $request->descripcion;
        $enfermedades->tipo_enfermedad_id = $request->tipo_enfermedad_id;
        $enfermedades->save();
        // return $enfermedades;
        return redirect()->route('enfermedades.index');
    }

    public function edit(Enfermedad $enfermedad)
    {
        $enfermedades = TipoEnfermedad::join('enfermedades', 'tipo_enfermedad_id', '=', 'tipo_enfermedades.id')
        ->select("*")
        ->get();
        $tipo_enfermedades = TipoEnfermedad::all();
        return view('livewire.admin.enfermedades.editar-enfermedades', ['enfermedades' => $enfermedades, 'enfermedad' => $enfermedad, 'tipo_enfermedades'=> $tipo_enfermedades]);
        // return $enfermedades;
    }

    public function update(AdminEnfermedadRequest $request, Enfermedad $enfermedad)
    {

        $enfermedad->enfermedad = $request->enfermedad;
        $enfermedad->descripcion = $request->descripcion;
        $enfermedad->tipo_enfermedad_id = $request->tipo_enfermedad_id;
        $enfermedad->save();
        return redirect()->route('enfermedades.index');
    }

    public function destroy($id)
    {
        Enfermedad::destroy($id);
        return redirect()->route('enfermedades.index');
    }
}
