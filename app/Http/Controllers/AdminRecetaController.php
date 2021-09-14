<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRecetaRequest;
use App\Models\Alimento;
use App\Models\Receta;
use App\Models\Resolucion;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use File;
use Intervention\Image\ImageManagerStatic as Image;

class AdminRecetaController extends Controller
{
    public function index(){
        
        $recetas= Receta::orderBy('id','desc')->paginate();
        $resoluciones = Resolucion::all();
        return view('livewire.admin.recetas.recetas', ['recetas'=>$recetas,'resoluciones'=>$resoluciones]);
    }

    public function imagen()
    {
        return true;
    }

    public function create(){
  
    
        $alimentos = Alimento::all();
        $resoluciones = Resolucion::all();
        return view('livewire.admin.recetas.crear-recetas', ['alimentos' => $alimentos,'resoluciones'=>$resoluciones]);
    }

    public function store(AdminRecetaRequest $request){

        $recetas = new Receta();

        $recetas->titulo = $request -> titulo;
        $recetas->slug = $request->slug;
        $recetas->seo_titulo = $request->seo_titulo;
        $recetas->seo_descripcion = $request->seo_descripcion;
        $recetas->descripcion = $request -> descripcion;
        $recetas->preparacion = $request -> preparacion;
        $recetas->fecha_publicacion = $request->fecha_publicacion != '' ? $request->fecha_publicacion : date('Y-m-d');
        $recetas->resolucion = $request -> resolucion;

        $resolucion = $request->resolucion;


        if ($request->hasFile('imagen_url')){
            $file           = $request->file("imagen_url");
            $nombrearchivo  = $file->getClientOriginalName();
            $extension= File::extension(basename($file->getClientOriginalName()));
            $nombre_archivo = Str::random(30).'.'.$extension;
           
            switch ($resolucion) {
                case 1:
                    $img = Image::make($request->file("imagen_url"))->resize(320, 240)
                        ->save("imagenes/recetas/" . $nombre_archivo);
                    break;
                case 2:
                    $img = Image::make($request->file("imagen_url"))->resize(640, 480)
                        ->save("imagenes/recetas/" . $nombre_archivo);
                    break;
                case 3:
                    $img = Image::make($request->file("imagen_url"))->resize(854, 480)
                        ->save("imagenes/recetas/" . $nombre_archivo);
                    break;
                case 4:
                    $img = Image::make($request->file("imagen_url"))->resize(800, 600)
                        ->save("imagenes/recetas/" . $nombre_archivo);
                    break;
                case 5:
                    $img = Image::make($request->file("imagen_url"))->resize(1024, 576)
                        ->save("imagenes/recetas/" . $nombre_archivo);
                    break;
                case 6:
                    $img = Image::make($request->file("imagen_url"))->resize(1024, 768)
                        ->save("imagenes/recetas/" . $nombre_archivo);
                    break;
                default:
                    # code...
                    break;
            }

            $recetas->imagen_url      = $nombre_archivo;
        }

        $recetas->publicacion = $request -> publicacion;

        $recetas->caloria = $request -> caloria;

        $recetas->grasa = $request -> grasa;

        $recetas->proteina = $request -> proteina;

        $recetas->save();
    
        //return $recetas;
        return redirect()->route('recetas');
    }


    public function edit(Receta $receta)
    {
        // return $plan;
        $recetas = Receta::all();
        $resoluciones = Resolucion::all();
        return view('livewire.admin.recetas.editar-recetas', ['recetas'=>$recetas, 'receta' => $receta,'resoluciones'=>$resoluciones]);
    }

    public function update(AdminRecetaRequest $request, Receta $receta)
    {

        $receta->titulo = $request -> titulo;
        $receta->slug = $request->slug;
        $receta->seo_titulo = $request->seo_titulo;
        $receta->seo_descripcion = $request->seo_descripcion;
        $receta->descripcion = $request -> descripcion;
        $receta->preparacion = $request -> preparacion;
        $receta->fecha_publicacion = $request->fecha_publicacion != '' ? $request->fecha_publicacion : date('Y-m-d');
        $producto->resolucion = $request->resolucion;
        
        if ($request->hasFile('imagen_url')){
            $file           = $request->file("imagen_url");
            $nombrearchivo  = $file->getClientOriginalName();
            $extension= File::extension(basename($file->getClientOriginalName()));
            $nombre_archivo = Str::random(30).'.'.$extension;
            

            switch ($resolucion) {
                case 1:
                    $img = Image::make($request->file("imagenes"))->resize(320, 240)
                        ->save("imagenes/categorias_productos/" . $nombre_archivo);
                    break;
                case 2:
                    $img = Image::make($request->file("imagenes"))->resize(640, 480)
                        ->save("imagenes/categorias_productos/" . $nombre_archivo);
                    break;
                case 3:
                    $img = Image::make($request->file("imagenes"))->resize(854, 480)
                        ->save("imagenes/categorias_productos/" . $nombre_archivo);
                    break;
                case 4:
                    $img = Image::make($request->file("imagenes"))->resize(800, 600)
                        ->save("imagenes/categorias_productos/" . $nombre_archivo);
                    break;
                case 5:
                    $img = Image::make($request->file("imagenes"))->resize(1024, 576)
                        ->save("imagenes/categorias_productos/" . $nombre_archivo);
                    break;
                case 6:
                    $img = Image::make($request->file("imagenes"))->resize(1024, 768)
                        ->save("imagenes/categorias_productos/" . $nombre_archivo);
                    break;
                default:
                    # code...
                    break;
            }

            $receta->imagen_url      = $nombre_archivo;
        }

        $receta->publicacion = $request -> publicacion;

        $receta->caloria = $request -> caloria;

        $receta->grasa = $request -> grasa;

        $receta->proteina = $request -> proteina;


        $receta->save();
        
        return redirect()->route('recetas');
    }

    public function destroy($id){
        Receta::destroy($id);
        return redirect()->route('recetas');
    }
}
