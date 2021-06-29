<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminSemaforoEstadoRequest;
use App\Models\SemaforoEstado;

class AdminSemaforoEstadoController extends Controller
{
    public function index(){
        
        $semaforos_estados= SemaforoEstado::orderBy('id','desc')->paginate();
        return view('livewire.admin.semaforo-estados.semaforo-estado', ['semaforos_estados'=>$semaforos_estados]);
    }

    public function store(AdminSemaforoEstadoRequest $request){
       
        $semaforo_estado = new SemaforoEstado();

        $semaforo_estado->estado_semaforo = $request -> estado_semaforo;

        $semaforo_estado->save();
    
        return redirect()->route('semaforos-estados.index');
    }

    public function edit(SemaforoEstado $semaforo_estado)
    {
        $semaforos_estados = SemaforoEstado::all();
        
        return view('livewire.admin.semaforo-estados.editar-semaforo-estado', ['semaforo_estado'=>$semaforo_estado, 'semaforos_estados' => $semaforos_estados]);
    }

    public function update(AdminSemaforoEstadoRequest $request, SemaforoEstado $semaforo_estado)
    {

        $semaforo_estado->estado_semaforo = $request -> estado_semaforo;

        $semaforo_estado->save();
        
        return redirect()->route('semaforos-estados.index');
    }

    public function destroy($id){
        SemaforoEstado::destroy($id);
        return redirect()->route('semaforos-estados.index');
    }
}
