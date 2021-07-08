<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminObjetivoRequest;
use App\Models\Objetivo;
use Illuminate\Http\Request;

class AdminObjetivoController extends Controller
{
    public function index(){
        
        $objetivos= Objetivo::orderBy('id','desc')->paginate();
        return view('livewire.admin.objetivos.objetivos', ['objetivos'=>$objetivos]);
    }


    public function store(AdminObjetivoRequest $request){
       
        $objetivos = new Objetivo();

        $objetivos->nombre_objetivo = $request -> nombre_objetivo;
        $objetivos->descripcion = $request -> descripcion;
        
        if ($request->hasFile('imagen_url')){
            $file           = $request->file("imagen_url");
            $nombrearchivo  = $file->getClientOriginalName();
            $file->move(public_path("imagenes/objetivos/"),$nombrearchivo);
            $objetivos->imagen_url      = $nombrearchivo;
        }

        $objetivos->save();
        // return $objetivos;
        return redirect()->route('objetivos/index');
    }

    public function edit(Objetivo $objetivo)
    {
        $objetivos = Objetivo::all();
        return view('livewire.admin.objetivos.editar-objetivos', ['objetivos'=>$objetivos, 'objetivo' => $objetivo]);
    }

    public function update(AdminObjetivoRequest $request, Objetivo $objetivo)
    {

        $objetivo->nombre_objetivo = $request -> nombre_objetivo;
        $objetivo->descripcion = $request -> descripcion;
        
        if ($request->hasFile('imagen_url')){
            $file           = $request->file("imagen_url");
            $nombrearchivo  = $file->getClientOriginalName();
            $file->move(public_path("imagenes/objetivos/"),$nombrearchivo);
            $objetivo->imagen_url      = $nombrearchivo;
        }

        $objetivo->save();
        
        return redirect()->route('objetivos/index');
    }

    public function destroy($id){
        Objetivo::destroy($id);
        return redirect()->route('objetivos/index');
    }
}
