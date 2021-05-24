<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pregunta;
use Illuminate\Http\Request;


class AdminPreguntaController extends Controller
{
    public function index(){
        
        $preguntas = Pregunta::orderBy('id','desc')->paginate();
        return view('livewire.admin.preguntas.preguntas', ['preguntas'=>$preguntas]);
    }

    public function imagen()
    {
        return true;
    }

    public function create(){
        // return $Pregunta;
        $preguntas = new Pregunta();
        return view('livewire.admin.preguntas.crear-preguntas', ['preguntas' => $preguntas]);
    }

    public function store(Request $request){
        // dd($request->all());
        $preguntas = new Pregunta();

        $preguntas->pregunta = $request -> pregunta;

        
        if ($request->hasFile('icono')){
            $file           = $request->file("icono");
            $nombrearchivo  = $file->getClientOriginalName();
            $file->move(public_path("imagenes/preguntas/"),$nombrearchivo);
            $preguntas->icono      = $nombrearchivo;
        }

        $preguntas->descripcion = $request -> descripcion;

        $preguntas->save();
        // return $preguntas;
        return redirect()->route('preguntas');
    }

    public function edit(Pregunta $pregunta)
    {
        $preguntas = Pregunta::all();
        return view('livewire.admin.preguntas.editar-preguntas', ['preguntas'=>$preguntas, 'pregunta' => $pregunta]);
    }

    public function update(Request $request, Pregunta $pregunta)
    {
        $request->validate([
            'pregunta' => 'required',
            'descripcion' => 'required'
        ]);

        $pregunta->pregunta = $request -> pregunta;
        $pregunta->descripcion = $request -> descripcion;
        if ($request->hasFile('icono')){
            $file           = $request->file("icono");
            $nombrearchivo  = $file->getClientOriginalName();
            $file->move(public_path("imagenes/preguntas/"),$nombrearchivo);
            $pregunta->icono      = $nombrearchivo;
        }
       
        $pregunta->save();
        
        return redirect()->route('preguntas');
    }

    public function destroy($id){
        Pregunta::destroy($id);
        return redirect()->route('preguntas');
    }
}
