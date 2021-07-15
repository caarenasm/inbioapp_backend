<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\CategoriaDiario;
use App\Models\TipoLectura;
use Illuminate\Http\Request;

class TipoLecturaController extends Controller
{

    public function tiposLecturas()
    {

        $categorias_diarios = CategoriaDiario::select('id', 'nombre')
            ->orderBy('id', 'asc')->get()->toArray();


        foreach ($categorias_diarios as $key => $value) {

            $tipo_lecturas = CategoriaDiario::join('tipo_lecturas', 'categoria_diario_id', '=', 'categoria_diarios.id')
                ->select('tipo_lecturas.id', 'tipo_lecturas.nombre')->where('categoria_diario_id', '=', $value['id'])->orderBy('id', 'asc')
                ->get()->toArray();

            $categorias_diarios[$key]['tipo_lecturas'] = $tipo_lecturas;
            
        }

        return response([
            'data' => $categorias_diarios
        ]);
    }

    public function subtiposLecturas(){

        $tipo_lecturas = TipoLectura::select('id', 'nombre')
            ->orderBy('id', 'asc')->get()->toArray();


        foreach ($tipo_lecturas as $key => $value) {

            $subtipo_lecturas = TipoLectura::join('subtipo_lecturas', 'tipo_lectura_id', '=', 'tipo_lecturas.id')
                ->select('subtipo_lecturas.id', 'descripcion','icono')->where('tipo_lectura_id', '=', $value['id'])->orderBy('id', 'asc')
                ->get()->toArray();

            $tipo_lecturas[$key]['subtipo_lecturas'] = $subtipo_lecturas;
        }

        return response([
            'data' => $tipo_lecturas
        ]);

    }

}
