<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CategoriaAlimento;
use Illuminate\Http\Request;

class AdminCategoriaAlimentosController extends Controller
{
    public function index()
    {

        $categorias_alimentos = CategoriaAlimento::all();
        return view('livewire.admin.categoria-alimentos.categoria-alimentos', ['categorias_alimentos' => $categorias_alimentos]);
        // return $categorias_alimentos;
    }

    public function create()
    {
        $categorias_alimentos = CategoriaAlimento::orderBy('id', 'desc')->paginate();
        return view('livewire.admin.categoria-alimentos.crear-categoria-alimentos', ['categorias_alimentos' => $categorias_alimentos]);
    }

    public function store(Request $request)
    {

        $categorias_alimentos = new CategoriaAlimento();

        $categorias_alimentos->nombre_categoria = $request->nombre_categoria;
        $categorias_alimentos->save();
        // return $categorias_alimentos;
        return redirect()->route('categoria-alimentos');
    }

    public function edit(CategoriaAlimento $category_food)
    {
        $categorias_alimentos = CategoriaAlimento::all();
        return view('livewire.admin.categoria-alimentos.editar-categoria-alimentos', ['categorias_alimentos' => $categorias_alimentos, 'category_food' => $category_food]);
    }

    public function update(CategoriaAlimento $category_food)
    {
        $data = request()->validate([
            'nombre_categoria' => ''
        ]);

        $category_food->update($data);

        return redirect()->route('categoria-alimentos');
    }

    public function destroy(CategoriaAlimento $category_food)
    {
        $category_food->delete();
        
        return redirect()->route('categoria-alimentos');
    }
}
