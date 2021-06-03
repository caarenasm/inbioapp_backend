<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRecetaRequest;
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
  
    
        $alimentos = Alimento::all();
        return view('livewire.admin.recetas.crear-recetas', ['alimentos' => $alimentos]);
    }

    public function store(AdminRecetaRequest $request){

        $recetas = new Receta();

        $recetas->titulo = $request -> titulo;
        $recetas->slug = $request->slug;
        $recetas->seo_titulo = $request->seo_titulo;
        $recetas->seo_descripcion = $request->seo_descripcion;
        $recetas->descripcion = $request -> descripcion;
        $recetas->preparacion = $request -> preparacion;
        $recetas->fecha_publicacion = $request->fecha_publicacion != '' ? $request->fecha_publicacion : date('Y-m-d');
        
        if ($request->hasFile('imagen_url')){
            $file           = $request->file("imagen_url");
            $nombrearchivo  = $file->getClientOriginalName();
            $file->move(public_path("imagenes/recetas/"),$nombrearchivo);
            $recetas->imagen_url      = $nombrearchivo;
        }

        $recetas->publicacion = $request -> publicacion;

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

    public function update(AdminRecetaRequest $request, Receta $receta)
    {

        $receta->titulo = $request -> titulo;
        $receta->slug = $request->slug;
        $receta->seo_titulo = $request->seo_titulo;
        $receta->seo_descripcion = $request->seo_descripcion;
        $receta->descripcion = $request -> descripcion;
        $receta->preparacion = $request -> preparacion;
        $receta->fecha_publicacion = $request->fecha_publicacion != '' ? $request->fecha_publicacion : date('Y-m-d');
        
        if ($request->hasFile('imagen_url')){
            $file           = $request->file("imagen_url");
            $nombrearchivo  = $file->getClientOriginalName();
            $file->move(public_path("imagenes/recetas/"),$nombrearchivo);
            $receta->imagen_url      = $nombrearchivo;
        }

        $receta->publicacion = $request -> publicacion;

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
