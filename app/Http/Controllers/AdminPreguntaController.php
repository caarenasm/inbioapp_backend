<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPreguntaRequest;
use App\Models\Icon;
use App\Models\Pregunta;
use Illuminate\Http\Request;


class AdminPreguntaController extends Controller
{
    public function index(){
        
        $preguntas = Pregunta::all();
        $iconos = Icon::all();
        return view('livewire.admin.preguntas.preguntas', ['preguntas'=>$preguntas,'iconos' => $iconos]);
    }

    public function store(AdminPreguntaRequest $request){
        
        $preguntas = new Pregunta();

        $preguntas->pregunta = $request -> pregunta;

        $preguntas->icono = $request -> icono;

        
        // if ($request->hasFile('icono')){
        //     $file           = $request->file("icono");
        //     $nombrearchivo  = $file->getClientOriginalName();
        //     $file->move(public_path("imagenes/preguntas/"),$nombrearchivo);
        //     $preguntas->icono      = $nombrearchivo;
        // }

        $preguntas->descripcion = $request -> descripcion;

        $preguntas->tipo_respuestas = $request -> tipo_respuestas;

        $preguntas->save();
        // return $preguntas;
        return redirect()->route('preguntas');
    }

    public function edit(Pregunta $pregunta)
    {
        $preguntas = Pregunta::all();
        $iconos = Icon::all();
        return view('livewire.admin.preguntas.editar-preguntas', ['preguntas'=>$preguntas, 'pregunta' => $pregunta,'iconos'=>$iconos]);
    }

    public function update(AdminPreguntaRequest $request, Pregunta $pregunta)
    {

        $pregunta->pregunta = $request -> pregunta;
        $pregunta->descripcion = $request -> descripcion;
        $pregunta->tipo_respuestas = $request -> tipo_respuestas;
        $pregunta->icono = $request -> icono;

        // if ($request->hasFile('icono')){
        //     $file           = $request->file("icono");
        //     $nombrearchivo  = $file->getClientOriginalName();
        //     $file->move(public_path("imagenes/preguntas/"),$nombrearchivo);
        //     $pregunta->icono      = $nombrearchivo;
        // }
       
        $pregunta->save();
        
        return redirect()->route('preguntas');
    }

    public function destroy($id){
        Pregunta::destroy($id);
        return redirect()->route('preguntas');
    }
}
