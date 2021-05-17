<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;


class AdminPlanController extends Controller
{
    public function index(){
        
        $planes= Plan::orderBy('id','desc')->paginate();
        return view('livewire.admin.planes.planes', ['planes'=>$planes]);
    }

    public function imagen()
    {
        return true;
    }

    public function create(){
        // return $plan;
        $post = new Plan();
        return view('livewire.admin.planes.crear-planes', ['post' => $post]);
    }

    public function store(Request $request){
        // dd($request->all());
        $planes = new Plan();

        $planes->titulo = $request -> titulo;
        $planes->descripcion = $request -> descripcion;
        
        if ($request->hasFile('imagen_url')){
            $file           = $request->file("imagen_url");
            $nombrearchivo  = $file->getClientOriginalName();
            $file->move(public_path("imagenes/planes/"),$nombrearchivo);
            $planes->imagen_url      = $nombrearchivo;
        }
        $planes->precio = $request -> precio;

        $planes->save();
        // return $planes;
        return redirect()->route('planes');
    }

    public function edit(Plan $plan)
    {
        $planes = Plan::all();
        return view('livewire.admin.planes.editar-planes', ['planes'=>$planes, 'plan' => $plan]);
    }

    public function update(Request $request, Plan $plan)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'imagen_url' => 'required',
            'precio' => 'required',
        ]);

        $plan->titulo = $request -> titulo;
        $plan->descripcion = $request -> descripcion;
        if ($request->hasFile('imagen_url')){
            $file           = $request->file("imagen_url");
            $nombrearchivo  = $file->getClientOriginalName();
            $file->move(public_path("imagenes/planes/"),$nombrearchivo);
            $plan->imagen_url      = $nombrearchivo;
        }
        $plan->precio = $request -> precio;

        $plan->save();
        
        return redirect()->route('planes');
    }

    public function destroy($id){
        Plan::destroy($id);
        return redirect()->route('planes');
    }
}
