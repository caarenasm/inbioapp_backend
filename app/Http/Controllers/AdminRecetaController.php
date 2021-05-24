<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alimento;
use App\Models\Receta;
use Illuminate\Http\Request;

class AdminRecetaController extends Controller
{
    public function index(){
        
        $recetas= Receta::orderBy('id','desc')->paginate();
        return view('livewire.admin.recetas.recetas', ['recetas'=>$recetas]);
    }

    public function imagen()
    {
        return true;
    }

    public function create(){
  
    
        $alimentos = Alimento::all();;
        return view('livewire.admin.recetas.crear-recetas', ['alimentos' => $alimentos]);
    }

    public function store(Request $request){
       
        $recetas = new Receta();

        $recetas->titulo = $request -> titulo;
        $recetas->descripcion = $request -> descripcion;
        $recetas->preparacion = $request -> preparacion;
        
        if ($request->hasFile('imagen_url')){
            $file           = $request->file("imagen_url");
            $nombrearchivo  = $file->getClientOriginalName();
            $file->move(public_path("imagenes/recetas/"),$nombrearchivo);
            $recetas->imagen_url      = $nombrearchivo;
        }

        $recetas->caloria = $request -> caloria;

        $recetas->grasa = $request -> grasa;

        $recetas->proteina = $request -> proteina;

        $recetas->save();
    
        //return $recetas;
        return redirect()->route('recetas');
    }


    public function edit(Receta $receta)
    {
        // return $plan;
        $recetas = Receta::all();
        return view('livewire.admin.recetas.editar-recetas', ['recetas'=>$recetas, 'receta' => $receta]);
    }

    public function update(Request $request, Receta $receta)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'preparacion' => 'required',
            'caloria' => 'required',
            'grasa' => 'required',
            'proteina' => 'required',
        ]);

        $receta->titulo = $request -> titulo;
        $receta->descripcion = $request -> descripcion;
        $receta->preparacion = $request -> preparacion;
        
        if ($request->hasFile('imagen_url')){
            $file           = $request->file("imagen_url");
            $nombrearchivo  = $file->getClientOriginalName();
            $file->move(public_path("imagenes/recetas/"),$nombrearchivo);
            $receta->imagen_url      = $nombrearchivo;
        }

        $receta->caloria = $request -> caloria;

        $receta->grasa = $request -> grasa;

        $receta->proteina = $request -> proteina;

        $receta->save();
        
        return redirect()->route('recetas');
    }

    public function destroy($id){
        Receta::destroy($id);
        return redirect()->route('recetas');
    }
}
