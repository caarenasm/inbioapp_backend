<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRespuestaRequest;
use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Http\Request;

class AdminRespuestasController extends Controller
{
    public function index($id){
        
        $preguntas = Pregunta::find($id);

        $respuestas = Pregunta::join('respuestas', 'pregunta_id', '=', 'preguntas.id')
        ->select('*')->where('pregunta_id', '=', $id)
        ->get();

        // $respuestas = Respuesta::all();
        // dd($preguntas);
        // return $respuestas;
        return view('livewire.admin.respuestas.respuestas', ['respuestas'=>$respuestas,'preguntas'=>$preguntas]);
    }

    public function imagen()
    {
        return true;
    }


    public function store(AdminRespuestaRequest $request){

        $respuesta = new Respuesta();

        $respuesta->respuesta = $request -> respuesta;

        $respuesta->ayuda = $request -> ayuda;

        $respuesta->pregunta_id = $request -> pregunta_id;

        $respuesta->save();

        return redirect()->route('respuestas.index',$request->pregunta_id);
    }


    public function edit(Respuesta $respuesta)
    {
      
        $respuestas = Pregunta::join('respuestas', 'pregunta_id', '=', 'preguntas.id')
        ->select('*')
        ->get();
        // $respuestas = Respuesta::all();
        // return $respuestas;
        return view('livewire.admin.respuestas.editar-respuestas', ['respuestas' => $respuestas, 'respuesta' => $respuesta]);
    }

    public function update(AdminRespuestaRequest $request, Respuesta $respuesta)
    {
        $respuesta->respuesta = $request -> respuesta;

        $respuesta->ayuda = $request -> ayuda;

        $respuesta->pregunta_id = $request -> pregunta_id;

        $respuesta->save();
        
        return redirect()->route('respuestas.index',$request->pregunta_id);
    }

    public function destroy(Request $request,$id){
        
        Respuesta::destroy($id);
        return redirect()->route('respuestas.index',$request->pregunta_id);
    }
}
