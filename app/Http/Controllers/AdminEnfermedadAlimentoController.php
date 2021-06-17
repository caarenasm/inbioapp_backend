<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminEnfermedadAlimentoRequest;
use App\Models\Alimento;
use App\Models\Enfermedad;
use App\Models\EnfermedadAlimento;
use Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AdminEnfermedadAlimentoController extends Controller
{
    public function index($id)
    {

        $enfermedades = Enfermedad::find($id);

        $alimentos = Alimento::all();

        $alimentos_enfermedad = Alimento::join('enfermedad_alimentos', 'alimento_id', '=', 'alimentos.id')
            ->select("*")->where('enfermedad_id', '=', $id)
            ->get();

        return view('livewire.admin.enfermedad-alimentos.enfermedad-alimento', ['alimentos_enfermedad' => $alimentos_enfermedad, 'enfermedades' => $enfermedades, 'alimentos' => $alimentos]);
    }

    public function store(AdminEnfermedadAlimentoRequest $request)
    {
    
       

        for ($i = 0; $i < count($request->recomendacion); $i++) {

            // dd(count($request->recomendacion));
    
            $alimentos_enfermedad = new EnfermedadAlimento();
            $alimentos_enfermedad->alimento_id = $request->alimento_id[$i];
            $alimentos_enfermedad->enfermedad_id = $request->enfermedad_id[$i];
            $alimentos_enfermedad->recomendacion = $request->recomendacion[$i];
            $alimentos_enfermedad->save();
        }


        // $alimentos_enfermedad = new EnfermedadAlimento();
        // foreach ($request->alimento_id as $alimentos) {
        //     foreach ($request->alimento_id as $recomendaciones) {
        //         foreach ($request->enfermedad_id as $enfermedades) {
        //             $alimentos_enfermedad->alimento_id = $alimentos;
        //             $alimentos_enfermedad->recomendacion = $recomendaciones;
        //             $alimentos_enfermedad->enfermedad_id = $enfermedades;
        //             $alimentos_enfermedad->save();
        //         }
        //     }
        // }
        return redirect()->route('enfermedades-alimentos.index', $request->enfermedad_id);
    }

    public function edit(EnfermedadAlimento $enfermedadAlimento)
    {
        $alimentos_enfermedad = Alimento::join('enfermedad_alimentos', 'alimento_id', '=', 'alimentos.id')
            ->select("*")
            ->get();

        $alimentos = Alimento::all();

        return view('livewire.admin.enfermedad-alimentos.enfermedad-alimentos', ['alimentos_enfermedad' => $alimentos_enfermedad, 'enfermedadAlimento' => $enfermedadAlimento, 'alimentos' => $alimentos]);
    }

    public function update(AdminEnfermedadAlimentoRequest $request, EnfermedadAlimento $enfermedadAlimento)
    {
        $enfermedadAlimento->alimento_id = $request->alimento_id;
        $enfermedadAlimento->enfermedad_id = $request->enfermedad_id;
        $enfermedadAlimento->recomendacion = $request->recomendacion;

        $enfermedadAlimento->save();

        return redirect()->route('enfermedades-alimentos.index', $request->enfermedad_id);
    }

    public function destroy(Request $request, $id)
    {
        EnfermedadAlimento::destroy($id);
        return redirect()->route('enfermedades-alimentos.index', $request->enfermedad_id);
    }
}
