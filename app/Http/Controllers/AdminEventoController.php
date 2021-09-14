<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminEventoRequest;
use App\Models\Evento;
use App\Models\TipoEvento;
use App\Models\Resolucion;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use File;
use Intervention\Image\ImageManagerStatic as Image;

class AdminEventoController extends Controller
{
    public function index()
    {

        $tipo_eventos = TipoEvento::all();
        $eventos = TipoEvento::join('eventos', 'tipo_evento_id', '=', 'tipo_eventos.id')
            ->select("*")
            ->get();
        return view('livewire.admin.eventos.eventos', ['eventos' => $eventos, 'tipo_eventos' => $tipo_eventos]);
        // return $eventos;
    }

    public function create()
    {

        $tipo_eventos = TipoEvento::all();
        $resoluciones = Resolucion::all();
        $eventos = TipoEvento::join('eventos', 'tipo_evento_id', '=', 'tipo_eventos.id')
            ->select("*")
            ->get();
        return view('livewire.admin.eventos.crear-eventos', ['eventos' => $eventos, 'tipo_eventos' => $tipo_eventos, 'resoluciones' => $resoluciones]);
    }

    public function store(AdminEventoRequest $request)
    {

        $eventos = new Evento();

        $eventos->titulo = $request->titulo;
        $eventos->slug = $request->slug;

        $eventos->resolucion = $request->resolucion;

        $resolucion = $request->resolucion;

        if ($request->hasFile('imagen_url')) {
            $file           = $request->file("imagen_url");
            $nombre_archivo  = $file->getClientOriginalName();
            $extension = File::extension(basename($file->getClientOriginalName()));
            $nombre_archivo = Str::random(30) . '.' . $extension;

            switch ($resolucion) {
                case 1:
                    $img = Image::make($request->file("imagen_url"))->resize(320, 240)
                        ->save("imagenes/eventos/" . $nombre_archivo);
                    break;
                case 2:
                    $img = Image::make($request->file("imagen_url"))->resize(640, 480)
                        ->save("imagenes/eventos/" . $nombre_archivo);
                    break;
                case 3:
                    $img = Image::make($request->file("imagen_url"))->resize(854, 480)
                        ->save("imagenes/eventos/" . $nombre_archivo);
                    break;
                case 4:
                    $img = Image::make($request->file("imagen_url"))->resize(800, 600)
                        ->save("imagenes/eventos/" . $nombre_archivo);
                    break;
                case 5:
                    $img = Image::make($request->file("imagen_url"))->resize(1024, 576)
                        ->save("imagenes/eventos/" . $nombre_archivo);
                    break;
                case 6:
                    $img = Image::make($request->file("imagen_url"))->resize(1024, 768)
                        ->save("imagenes/eventos/" . $nombre_archivo);
                    break;
                default:
                    # code...
                    break;
            }

            $eventos->imagen_url      = $nombre_archivo;
        }
        $eventos->descripcion = $request->descripcion;
        $eventos->fecha_evento = $request->fecha_evento != '' ? $request->fecha_evento : date('Y-m-d');
        $eventos->hora = $request->hora != '' ? $request->hora : date("H:i:s");
        $eventos->tipo_evento_id = $request->tipo_evento_id;

        $eventos->save();
        // return $eventos;
        return redirect()->route('eventos.index');
    }

    public function edit(Evento $evento)
    {
        $tipo_eventos = TipoEvento::all();

        $eventos = TipoEvento::join('eventos', 'tipo_evento_id', '=', 'tipo_eventos.id')
            ->select("*")
            ->get();

        $resoluciones = Resolucion::all();

        return view('livewire.admin.eventos.editar-eventos', ['eventos' => $eventos, 'evento' => $evento, 'tipo_eventos' => $tipo_eventos,'resoluciones'=>$resoluciones]);
    }

    public function update(AdminEventoRequest $request, Evento $evento)
    {
        $evento->titulo = $request->titulo;
        $evento->slug = $request->slug;

        $evento->resolucion = $request->resolucion;

        $resolucion = $request->resolucion;

        if ($request->hasFile('imagen_url')) {
            $file           = $request->file("imagen_url");
            $nombre_archivo  = $file->getClientOriginalName();
            $extension = File::extension(basename($file->getClientOriginalName()));
            $nombre_archivo = Str::random(30) . '.' . $extension;

            switch ($resolucion) {
                case 1:
                    $img = Image::make($request->file("imagen_url"))->resize(320, 240)
                        ->save("imagenes/eventos/" . $nombre_archivo);
                    break;
                case 2:
                    $img = Image::make($request->file("imagen_url"))->resize(640, 480)
                        ->save("imagenes/eventos/" . $nombre_archivo);
                    break;
                case 3:
                    $img = Image::make($request->file("imagen_url"))->resize(854, 480)
                        ->save("imagenes/eventos/" . $nombre_archivo);
                    break;
                case 4:
                    $img = Image::make($request->file("imagen_url"))->resize(800, 600)
                        ->save("imagenes/eventos/" . $nombre_archivo);
                    break;
                case 5:
                    $img = Image::make($request->file("imagen_url"))->resize(1024, 576)
                        ->save("imagenes/eventos/" . $nombre_archivo);
                    break;
                case 6:
                    $img = Image::make($request->file("imagen_url"))->resize(1024, 768)
                        ->save("imagenes/eventos/" . $nombre_archivo);
                    break;
                default:
                    # code...
                    break;
            }

            $evento->imagen_url      = $nombre_archivo;
        }

        $evento->descripcion = $request->descripcion;
        $evento->fecha_evento = $request->fecha_evento != '' ? $request->fecha_evento : date('Y-m-d');
        $evento->hora = $request->hora != '' ? $request->hora : date("H:i:s");
        $evento->tipo_evento_id = $request->tipo_evento_id;

        $evento->save();

        return redirect()->route('eventos.index');
    }

    public function destroy($id)
    {
        Evento::destroy($id);
        return redirect()->route('eventos.index');
    }
}
