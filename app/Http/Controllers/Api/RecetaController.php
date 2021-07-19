<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 /********************/
use App\Models\Receta;
use App\Models\Ingrediente;
/*********************/

class RecetaController extends Controller
{
    public function lista(){

        $response = [];
        
        $recetas = Receta::select('id', 'titulo', 'slug', 'seo_titulo', 
        'seo_descripcion', 'imagen_url', 'descripcion', 'preparacion', 
        'fecha_publicacion', 'publicacion', 'caloria', 'grasa', 'proteina')
        ->orderBy('id','asc')->get()->toArray();

        foreach ($recetas as $key => $value) {

            $ingredientes = Ingrediente::select('ingredientes.id', 'porcion', 'nombre',)
            ->join('alimentos as t01','ingredientes.alimento_id','=','t01.id')
            ->where('receta_id','=',$value['id'])->orderBy('id','asc')->get()->toArray();

            $response[$key]['id'] = $value['id'];
            $response[$key]['titulo'] = $value['titulo'];
            $response[$key]['descripcion'] = $value['descripcion'];
            $response[$key]['preparacion'] = $value['preparacion'];
            $response[$key]['fecha_publicacion'] = $value['fecha_publicacion'];
            $response[$key]['imagen_url'] = asset('imagenes/recetas/' . $value['imagen_url']);
            $response[$key]['ingredientes'] = $ingredientes;
            
        }

        return response([
            'data' => $response
        ]);
            
    }
}
