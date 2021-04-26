<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminProductRequest;
use App\Models\CategoriasProducto;
use App\Models\Imagenes;
use App\Models\Productos;
use Illuminate\Support\Facades\Storage;

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
        return view('livewire.admin.product.index', ['productos' => $productos]);
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

        return view('livewire.admin.product.nuevo', compact('categories', 'producto'));
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
        $producto->save();

        $orden = 0;
        if ($request->file('imagenes')) {
            foreach ($request->file('imagenes') as $imagen) {
                $i = new Imagenes();
                $extension = $imagen->extension();
                $numero = 0;
                while (Storage::exists('productos/' . $request->slug . '-' . $numero . '.' . $extension)) {
                    $numero++;
                }
                $i->url = Storage::putFileAs('productos', $imagen, $request->slug . '-' . $numero . '.' . $extension);
                $i->product_id = $producto->id;
                $i->orden = $orden++;
                $i->save();
            }
        }

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
        $imagenes = $producto->imagenes()->orderBy('orden')->get();

        return view('livewire.admin.product.edit', compact('categories', 'producto', 'imagenes'));
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
        $producto->save();

        // eliminado de imagenes que hayan sido quitadas con JS
        $imagenesActuales = $producto->imagenes()->get();
        if (count($imagenesActuales) !== $request->orden) {
            foreach ($imagenesActuales as $imagenActual) {
                if (!isset($request->orden)) {
                    Storage::delete($imagenActual->url);
                    Imagenes::destroy($imagenActual->id);
                } else {
                    if (!in_array($imagenActual->id, $request->orden)) {
                        Storage::delete($imagenActual->url);
                        Imagenes::destroy($imagenActual->id);
                    }
                }
            }
        }

        // reordenado de imagenes
        $orden = 0;
        if (isset($request->orden)) {
            foreach ($request->orden as $order) {
                $i = Imagenes::find($order);
                $i->orden = $orden++;
                $i->save();
            }
        }

        if ($request->file('imagenes')) {
            foreach ($request->file('imagenes') as $imagen) {
                $i = new Imagenes();
                $extension = $imagen->extension();
                $numero = rand(0,999);
                while (Storage::exists('productos/' . $request->slug . '-' . $numero . '.' . $extension)) {
                    $numero = rand(0,999);
                }
                $i->url = Storage::putFileAs('productos', $imagen, $request->slug . '-' . $numero . '.' . $extension);
                $i->product_id = $producto->id;
                $i->orden = $orden++;
                $i->save();
            }
        }

        return redirect()->route('producto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Productos::find($id);
        $imagenes = $producto->imagenes()->get();
        foreach ($imagenes as $imagen) {
            Storage::delete($imagen->url);
            Imagenes::destroy($imagen->id);
        }
        Productos::destroy($id);
        return redirect()->route('producto');
    }
}
