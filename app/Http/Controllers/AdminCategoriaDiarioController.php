<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminCategoriaDiarioRequest;
use App\Models\CategoriaDiario;
use Illuminate\Http\Request;

class AdminCategoriaDiarioController extends Controller
{
    public function index()
    {

        $categorias_diarios = CategoriaDiario::all();
        return view('livewire.admin.categorias-diarios.categorias-diarios', ['categorias_diarios' => $categorias_diarios]);
        // return $categorias_diarios;
    }

    public function store(AdminCategoriaDiarioRequest $request)
    {

        $categoria_diario = new CategoriaDiario();

        $categoria_diario->nombre_categoria = $request->nombre_categoria;
        $categoria_diario->save();
        return redirect()->route('categorias-diarios.index');
    }

    public function edit(CategoriaDiario $categoria_diario)
    {
        $categorias_diarios = CategoriaDiario::all();
        return view('livewire.admin.categorias-diarios.editar-categorias-diarios', ['categorias_diarios' => $categorias_diarios, 'categoria_diario' => $categoria_diario]);
    }

    public function update(AdminCategoriaDiarioRequest $request,CategoriaDiario $categoria_diario)
    {
        $categoria_diario->nombre_categoria = $request->nombre_categoria;

        $categoria_diario->save();

        return redirect()->route('categorias-diarios.index');
    }

    public function destroy($id)
    {
        CategoriaDiario::destroy($id);
        return redirect()->route('categorias-diarios.index');
    }
}
