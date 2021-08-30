<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminProductRequest;
use App\Models\CategoriasProducto;
use App\Models\Resolucion;
use App\Models\Productos;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;
use File;

class AdminProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Productos::orderBy('created_at', 'desc')->paginate(10);
        $resoluciones = Resolucion::all();
        return view('livewire.admin.product.index', ['productos' => $productos,'resoluciones' => $resoluciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Productos();
        $categories = CategoriasProducto::orderBy('name', 'asc')->get();
        $resoluciones = Resolucion::all();
        return view('livewire.admin.product.nuevo', compact('categories', 'producto','resoluciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminProductRequest $request)
    {

        $producto = new Productos();
        $producto->title = $request->title;
        $producto->slug = $request->slug;
        $producto->seo_title = $request->seo_title;
        $producto->seo_description = $request->seo_description;
        $producto->description = $request->description;
        $producto->price = $request->price;
        $producto->weight = $request->weight;
        $producto->published = $request->published;
        $producto->resolucion = $request->resolucion;
        

        // $orden = 0;
        // if ($request->file('imagenes')) {
        //     foreach ($request->file('imagenes') as $imagen) {
        //         $i = new Imagenes();
        //         $extension = $imagen->extension();
        //         $numero = 0;
        //         while (Storage::exists('productos/' . $request->slug . '-' . $numero . '.' . $extension)) {
        //             $numero++;
        //         }
        //         $i->url = Storage::putFileAs('productos', $imagen, $request->slug . '-' . $numero . '.' . $extension);
        //         $i->product_id = $producto->id;
        //         $i->orden = $orden++;
        //         $i->save();
        //     }
        // }

        if ($request->hasFile('imagenes')){
            $file           = $request->file("imagenes");
            $nombrearchivo  = $file->getClientOriginalName();
            $extension= File::extension(basename($file->getClientOriginalName()));
            $nombre_archivo = Str::random(30).'.'.$extension;
            $file->move(public_path("imagenes/productos/"),$nombre_archivo);
            $producto->imagenes      = $nombre_archivo;
        }

        $producto->save();

        return redirect()->route('producto');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Productos $producto)
    {
        $categories = CategoriasProducto::orderBy('name', 'asc')->get();
        // $imagenes = $producto->imagenes()->orderBy('orden')->get();

        $resoluciones = Resolucion::all();

        // return view('livewire.admin.product.edit', compact('categories', 'producto', 'imagenes'));
        return view('livewire.admin.product.edit', compact('categories', 'producto','resoluciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminProductRequest $request, Productos $producto)
    {
        $producto->title = $request->title;
        $producto->slug = $request->slug;
        $producto->seo_title = $request->seo_title;
        $producto->seo_description = $request->seo_description;
        $producto->description = $request->description;
        $producto->price = $request->price;
        $producto->weight = $request->weight;
        $producto->published = $request->published;
        $producto->resolucion = $request->resolucion;

        if ($request->hasFile('imagenes')){
            $file           = $request->file("imagenes");
            $nombrearchivo  = $file->getClientOriginalName();
            $extension= File::extension(basename($file->getClientOriginalName()));
            $nombre_archivo = Str::random(30).'.'.$extension;
            $file->move(public_path("imagenes/productos/"),$nombre_archivo);
            $producto->imagenes      = $nombre_archivo;
        }

        $producto->save();

        // eliminado de imagenes que hayan sido quitadas con JS
        // $imagenesActuales = $producto->imagenes()->get();
        // if (count($imagenesActuales) !== $request->orden) {
        //     foreach ($imagenesActuales as $imagenActual) {
        //         if (!isset($request->orden)) {
        //             Storage::delete($imagenActual->url);
        //             Imagenes::destroy($imagenActual->id);
        //         } else {
        //             if (!in_array($imagenActual->id, $request->orden)) {
        //                 Storage::delete($imagenActual->url);
        //                 Imagenes::destroy($imagenActual->id);
        //             }
        //         }
        //     }
        // }

        // reordenado de imagenes
        // $orden = 0;
        // if (isset($request->orden)) {
        //     foreach ($request->orden as $order) {
        //         $i = Imagenes::find($order);
        //         $i->orden = $orden++;
        //         $i->save();
        //     }
        // }

        // if ($request->file('imagenes')) {
        //     foreach ($request->file('imagenes') as $imagen) {
        //         $i = new Imagenes();
        //         $extension = $imagen->extension();
        //         $numero = rand(0,999);
        //         while (Storage::exists('productos/' . $request->slug . '-' . $numero . '.' . $extension)) {
        //             $numero = rand(0,999);
        //         }
        //         $i->url = Storage::putFileAs('productos', $imagen, $request->slug . '-' . $numero . '.' . $extension);
        //         $i->product_id = $producto->id;
        //         $i->orden = $orden++;
        //         $i->save();
        //     }
        // }

        return redirect()->route('producto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id){
        Productos::destroy($id);
        return redirect()->route('producto');
    }
}
