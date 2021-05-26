<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alimento;
use App\Models\Ingrediente;
use App\Models\Receta;
use Illuminate\Http\Request;

class AdminIngredientesController extends Controller
{
    public function index($id){
        
        $recetas = Receta::find($id);

        $ingredientes = Alimento::join('ingredientes', 'alimento_id', '=', 'alimentos.id')
        ->select("*")->where('receta_id','=',$id)
        ->get();

        $alimentos = Alimento::all();

        // dd($recetas);
        // return $ingredientes;
        return view('livewire.admin.ingredientes.ingredientes', ['ingredientes' => $ingredientes,'alimentos'=>$alimentos,'recetas'=>$recetas]);
    }

    public function imagen()
    {
        return true;
    }


    public function store(Request $request){

        $ingrediente = new Ingrediente();

        $ingrediente->alimento_id = $request -> alimento_id;

        $ingrediente->porcion = $request -> porcion;

        $ingrediente->receta_id = $request -> receta_id;

        $ingrediente->save();

        return redirect()->route('ingredientes.index',$request->receta_id);
    }


    public function edit(Ingrediente $ingrediente)
    {
      
        $ingredientes = Alimento::join('ingredientes', 'alimento_id', '=', 'alimentos.id')
        ->select("*")
        ->get();

        $alimentos = Alimento::all();

        // return $alimentos;
        return view('livewire.admin.ingredientes.editar-ingredientes', ['ingredientes' => $ingredientes, 'ingrediente' => $ingrediente, 'alimentos'=> $alimentos]);
    }

    public function update(Request $request, Ingrediente $ingrediente)
    {
        $request->validate([
            'alimento_id' => 'required',
            'porcion' => 'required',
        ]);

        $ingrediente->alimento_id = $request -> alimento_id;
        $ingrediente->porcion = $request -> porcion;
        $ingrediente->receta_id = $request -> receta_id;

        $ingrediente->save();
        
        return redirect()->route('ingredientes.index',$request->receta_id);
    }

    public function destroy(Request $request,$id){
        Ingrediente::destroy($id);
        return redirect()->route('ingredientes.index',$request->receta_id);
    }
}
