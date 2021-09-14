<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminObjetivoRequest;
use App\Models\Objetivo;
use App\Models\Resolucion;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use File;
use Intervention\Image\ImageManagerStatic as Image;

class AdminObjetivoController extends Controller
{
    public function index()
    {

        $objetivos = Objetivo::orderBy('id', 'desc')->paginate();
        return view('livewire.admin.objetivos.objetivos', ['objetivos' => $objetivos]);
    }


    public function create()
    {

        $objetivos = Objetivo::all();
        $resoluciones = Resolucion::all();
        return view('livewire.admin.objetivos.crear-objetivos', ['objetivos' => $objetivos, 'resoluciones' => $resoluciones]);
    }

    public function store(AdminObjetivoRequest $request)
    {

        $objetivos = new Objetivo();

        $objetivos->nombre_objetivo = $request->nombre_objetivo;
        $objetivos->descripcion = $request->descripcion;
        $objetivos->resolucion = $request->resolucion;

        $resolucion = $request->resolucion;


        if ($request->hasFile('imagen_url')) {
            $file           = $request->file("imagen_url");
            $nombre_archivo  = $file->getClientOriginalName();
            $extension = File::extension(basename($file->getClientOriginalName()));
            $nombre_archivo = Str::random(30) . '.' . $extension;

            switch ($resolucion) {
                case 1:
                    $img = Image::make($request->file("imagen_url"))->resize(320, 240)
                        ->save("imagenes/objetivos/" . $nombre_archivo);
                    break;
                case 2:
                    $img = Image::make($request->file("imagen_url"))->resize(640, 480)
                        ->save("imagenes/objetivos/" . $nombre_archivo);
                    break;
                case 3:
                    $img = Image::make($request->file("imagen_url"))->resize(854, 480)
                        ->save("imagenes/objetivos/" . $nombre_archivo);
                    break;
                case 4:
                    $img = Image::make($request->file("imagen_url"))->resize(800, 600)
                        ->save("imagenes/objetivos/" . $nombre_archivo);
                    break;
                case 5:
                    $img = Image::make($request->file("imagen_url"))->resize(1024, 576)
                        ->save("imagenes/objetivos/" . $nombre_archivo);
                    break;
                case 6:
                    $img = Image::make($request->file("imagen_url"))->resize(1024, 768)
                        ->save("imagenes/objetivos/" . $nombre_archivo);
                    break;
                default:
                    # code...
                    break;
            }

            $objetivos->imagen_url      = $nombre_archivo;
        }

        $objetivos->save();
        // return $objetivos;
        return redirect()->route('objetivos');
    }

    public function edit(Objetivo $objetivo)
    {
        $objetivos = Objetivo::all();
        $resoluciones = Resolucion::all();
        return view('livewire.admin.objetivos.editar-objetivos', ['objetivos' => $objetivos, 'objetivo' => $objetivo,'resoluciones' => $resoluciones]);
    }

    public function update(AdminObjetivoRequest $request, Objetivo $objetivo)
    {

        $objetivo->nombre_objetivo = $request->nombre_objetivo;
        $objetivo->descripcion = $request->descripcion;

        if ($request->hasFile('imagen_url')) {
            $file           = $request->file("imagen_url");
            $nombrearchivo  = $file->getClientOriginalName();
            $extension = File::extension(basename($file->getClientOriginalName()));
            $nombre_archivo = Str::random(30) . '.' . $extension;
            $objetivo->resolucion = $request->resolucion;

            $resolucion = $request->resolucion;

            switch ($resolucion) {
                case 1:
                    $img = Image::make($request->file("imagen_url"))->resize(320, 240)
                        ->save("imagenes/objetivos/" . $nombre_archivo);
                    break;
                case 2:
                    $img = Image::make($request->file("imagen_url"))->resize(640, 480)
                        ->save("imagenes/objetivos/" . $nombre_archivo);
                    break;
                case 3:
                    $img = Image::make($request->file("imagen_url"))->resize(854, 480)
                        ->save("imagenes/objetivos/" . $nombre_archivo);
                    break;
                case 4:
                    $img = Image::make($request->file("imagen_url"))->resize(800, 600)
                        ->save("imagenes/objetivos/" . $nombre_archivo);
                    break;
                case 5:
                    $img = Image::make($request->file("imagen_url"))->resize(1024, 576)
                        ->save("imagenes/objetivos/" . $nombre_archivo);
                    break;
                case 6:
                    $img = Image::make($request->file("imagen_url"))->resize(1024, 768)
                        ->save("imagenes/objetivos/" . $nombre_archivo);
                    break;
                default:
                    # code...
                    break;
            }

            $objetivo->imagen_url      = $nombre_archivo;
        }

        $objetivo->save();

        return redirect()->route('objetivos');
    }

    public function destroy($id)
    {
        Objetivo::destroy($id);
        return redirect()->route('objetivos');
    }
}
