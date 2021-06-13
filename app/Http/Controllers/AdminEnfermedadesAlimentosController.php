<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alimento;
use App\Models\Enfermedad;
use Illuminate\Http\Request;

class AdminEnfermedadesAlimentosController extends Controller
{
    public function index(){
        $enfermedades = Enfermedad::all();
        $alimentos = Alimento::all();
        
        return view('livewire.admin.enfermedad-alimentos.enfermedad-alimentos', ['alimentos' => $alimentos,'enfermedades'=>$enfermedades]);
    }
}
