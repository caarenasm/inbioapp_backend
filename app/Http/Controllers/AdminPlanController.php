<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPlanRequest;
use App\Models\Plan;
use App\Models\Resolucion;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use File;
use Intervention\Image\ImageManagerStatic as Image;


class AdminPlanController extends Controller
{
    public function index(){
        
        $planes= Plan::orderBy('id','desc')->paginate();
        $resoluciones = Resolucion::all();
        return view('livewire.admin.planes.planes', ['planes'=>$planes,'resoluciones'=>$resoluciones]);
    }

    public function imagen()
    {
        return true;
    }

    public function create(){
       
        $plan = new Plan();
        $resoluciones = Resolucion::all();
        return view('livewire.admin.planes.crear-planes', ['plan' => $plan,'resoluciones'=>$resoluciones]);
    }

    public function store(AdminPlanRequest $request){
       
        $planes = new Plan();

        $planes->titulo = $request -> titulo;
        $planes->slug = $request -> slug;
        $planes->descripcion = $request -> descripcion;
        $planes->resolucion = $request->resolucion;

        $resolucion = $request->resolucion;

        
        if ($request->hasFile('imagen_url')){
            $file           = $request->file("imagen_url");
            $nombrearchivo  = $file->getClientOriginalName();
            $extension= File::extension(basename($file->getClientOriginalName()));
            $nombre_archivo = Str::random(30).'.'.$extension;
            
            switch ($resolucion) {
                case 1:
                    $img = Image::make($request->file("imagen_url"))->resize(320, 240)
                        ->save("imagenes/planes/" . $nombre_archivo);
                    break;
                case 2:
                    $img = Image::make($request->file("imagen_url"))->resize(640, 480)
                        ->save("imagenes/planes/" . $nombre_archivo);
                    break;
                case 3:
                    $img = Image::make($request->file("imagen_url"))->resize(854, 480)
                        ->save("imagenes/planes/" . $nombre_archivo);
                    break;
                case 4:
                    $img = Image::make($request->file("imagen_url"))->resize(800, 600)
                        ->save("imagenes/planes/" . $nombre_archivo);
                    break;
                case 5:
                    $img = Image::make($request->file("imagen_url"))->resize(1024, 576)
                        ->save("imagenes/planes/" . $nombre_archivo);
                    break;
                case 6:
                    $img = Image::make($request->file("imagen_url"))->resize(1024, 768)
                        ->save("imagenes/planes/" . $nombre_archivo);
                    break;
                default:
                    # code...
                    break;
            }

            $planes->imagen_url = $nombre_archivo;
        }

        $planes->precio = $request -> precio;

        $planes->save();
        // return $planes;
        return redirect()->route('planes');
    }

    public function edit(Plan $plan)
    {
        $planes = Plan::all();
        $resoluciones = Resolucion::all();
        return view('livewire.admin.planes.editar-planes', ['planes'=>$planes, 'plan' => $plan,'resoluciones'=>$resoluciones]);
    }

    public function update(AdminPlanRequest $request, Plan $plan)
    {

        $plan->titulo = $request -> titulo;
        $plan->slug = $request -> slug;
        $plan->descripcion = $request -> descripcion;
        $plan->resolucion = $request->resolucion;


        $resolucion = $request->resolucion;

        if ($request->hasFile('imagen_url')){
            $file           = $request->file("imagen_url");
            $nombrearchivo  = $file->getClientOriginalName();
            $extension= File::extension(basename($file->getClientOriginalName()));
            $nombre_archivo = Str::random(30).'.'.$extension;
            
            switch ($resolucion) {
                case 1:
                    $img = Image::make($request->file("imagen_url"))->resize(320, 240)
                        ->save("imagenes/planes/" . $nombre_archivo);
                    break;
                case 2:
                    $img = Image::make($request->file("imagen_url"))->resize(640, 480)
                        ->save("imagenes/planes/" . $nombre_archivo);
                    break;
                case 3:
                    $img = Image::make($request->file("imagen_url"))->resize(854, 480)
                        ->save("imagenes/planes/" . $nombre_archivo);
                    break;
                case 4:
                    $img = Image::make($request->file("imagen_url"))->resize(800, 600)
                        ->save("imagenes/planes/" . $nombre_archivo);
                    break;
                case 5:
                    $img = Image::make($request->file("imagen_url"))->resize(1024, 576)
                        ->save("imagenes/planes/" . $nombre_archivo);
                    break;
                case 6:
                    $img = Image::make($request->file("imagen_url"))->resize(1024, 768)
                        ->save("imagenes/planes/" . $nombre_archivo);
                    break;
                default:
                    # code...
                    break;
            }

            $plan->imagen_url      = $nombre_archivo;
        }
        $plan->precio = $request -> precio;

        $plan->save();
        
        return redirect()->route('planes');
    }

    public function destroy($id){
        Plan::destroy($id);
        return redirect()->route('planes');
    }
}
