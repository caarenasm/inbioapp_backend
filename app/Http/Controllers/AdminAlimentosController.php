<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alimento;
use App\Models\CategoriaAlimento;
use Illuminate\Http\Request;
use App\Http\Requests\AdminAlimentoRequest;

class AdminAlimentosController extends Controller
{
    public function index()
    {

        $alimentos = CategoriaAlimento::join('alimentos', 'categoria_alimento_id', '=', 'categoria_alimentos.id')
        ->select("*")
        ->get();
        return view('livewire.admin.alimentos.alimentos', ['alimentos' => $alimentos]);
        // return $alimentos;
    }

    public function create()
    {
        $category_food = CategoriaAlimento::all();
        return view('livewire.admin.alimentos.crear-alimentos', ['category_food' => $category_food]);
        // return $category_food;
    }

    public function store(AdminAlimentoRequest $request)
    {

        $alimentos = new Alimento();

        $alimentos->nombre = $request->nombre;
        $alimentos->categoria_alimento_id = $request->categoria_alimento_id;
        $alimentos->save();
        // return $alimentos;
        return redirect()->route('alimentos');
    }

    public function edit(Alimento $food)
    {
        $alimentos = CategoriaAlimento::join('alimentos', 'categoria_alimento_id', '=', 'categoria_alimentos.id')
        ->select("*")
        ->get();
        $category_food = CategoriaAlimento::all();
        return view('livewire.admin.alimentos.editar-alimentos', ['alimentos' => $alimentos, 'food' => $food, 'category_food'=> $category_food]);
        // return $alimentos;
    }

    public function update(AdminAlimentoRequest $request, Alimento $food)
    {
        $request->validate([
            'nombre' => 'required',
            'categoria_alimento_id' => 'required'
        ]);

        $food->nombre = $request->nombre;
        $food->categoria_alimento_id = $request->categoria_alimento_id;
        $food->save();
        return redirect()->route('alimentos');
    }

    public function destroy($id)
    {
        Alimento::destroy($id);
        return redirect()->route('alimentos');
    }
}
