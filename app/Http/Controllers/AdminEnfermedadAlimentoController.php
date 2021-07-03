<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminEnfermedadAlimentoRequest;
use App\Models\Alimento;
use App\Models\CategoriaAlimento;
use App\Models\Enfermedad;
use App\Models\EnfermedadAlimento;
use App\Models\SemaforoEstado;
use Illuminate\Http\Request;

class AdminEnfermedadAlimentoController extends Controller
{

    public function index($id)
    {
        $enfermedades = Enfermedad::find($id);

        $estados = SemaforoEstado::all();

        $categorias = CategoriaAlimento::all();

        $alimentos = Alimento::all();

        $alimentos_enfermedad = Alimento::join('enfermedad_alimentos', 'alimento_id', '=', 'alimentos.id')
            ->select("*")->where('enfermedad_id', '=', $id)
            ->get();

        return view('livewire.admin.enfermedad-alimentos.enfermedad-alimento', ['alimentos_enfermedad' => $alimentos_enfermedad, 'enfermedades' => $enfermedades, 'estados' => $estados,'categorias'=>$categorias,'alimentos'=>$alimentos]);
    }

    public function store(AdminEnfermedadAlimentoRequest $request)
    {

        // Se documenta esta parte del codigo dando validez a lo planteado, pero por usabilidad se realiza con el codigo siguiente. 
        // dd(var_dump($request->recomendacion));
        // for ($i = 0; $i < count($request->alimento_id); $i++) {
        // dd(count($request->recomendacion));
        //     if (!empty($request->recomendacion[$i])) {
        //         $alimentos_enfermedad = new EnfermedadAlimento();
        //         $alimentos_enfermedad->alimento_id = $request->alimento_id[$i];
        //         $alimentos_enfermedad->enfermedad_id = $request->enfermedad_id[$i];
        //         $alimentos_enfermedad->recomendacion = $request->recomendacion[$i];
        //         $alimentos_enfermedad->save();
        //     }
        // }

        $alimentos_enfermedad = new EnfermedadAlimento();

        $alimentos_enfermedad->alimento_id = $request->alimento_id;
        $alimentos_enfermedad->enfermedad_id = $request->enfermedad_id;
        $alimentos_enfermedad->recomendacion = $request->recomendacion;

        $alimentos_enfermedad->save();

        return redirect()->route('enfermedades-alimentos.index', $request->enfermedad_id);
    }

    public function edit(EnfermedadAlimento $enfermedad_alimento)
    {
        $enfermedad_id = Enfermedad::join('enfermedad_alimentos', 'enfermedad_id', '=', 'enfermedades.id')
            ->select("enfermedades.id")
            ->get();

        $alimentos_enfermedad = Alimento::join('enfermedad_alimentos', 'alimento_id', '=', 'alimentos.id')
        ->select("*")
        ->get();
        
        $enfermedades = Enfermedad::find($enfermedad_id);

        $estados = SemaforoEstado::all();

        return view('livewire.admin.enfermedad-alimentos.editar-enfermedad-alimento', ['enfermedades' => $enfermedades, 'enfermedad_alimento' => $enfermedad_alimento,'estados' => $estados,'alimentos_enfermedad'=>$alimentos_enfermedad]);
    }

    public function update(Request $request, EnfermedadAlimento $enfermedad_alimento)
    {
        $enfermedad_alimento->alimento_id = $request->alimento_id;
        $enfermedad_alimento->enfermedad_id = $request->enfermedad_id;
        $enfermedad_alimento->recomendacion = $request->recomendacion;

        $enfermedad_alimento->save();

        return redirect()->route('enfermedades-alimentos.index', $request->enfermedad_id);
    }

    public function destroy($id)
    {
        
        EnfermedadAlimento::destroy($id);

        return back();
    }
}
