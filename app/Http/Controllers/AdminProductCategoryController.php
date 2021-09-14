<?php

namespace App\Http\Controllers;

use App\Models\CategoriasProducto;
use App\Models\Resolucion;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class AdminProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = new CategoriasProducto();
        $caterories = CategoriasProducto::orderBy('name', 'ASC')->get();

        $resoluciones = Resolucion::all();
        return view('livewire.admin.product.categories', ['categories' => $caterories, 'category' => $category, 'resoluciones' => $resoluciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'slug' => 'required|unique:categorias_productos',
        //     'imagen' => 'image'
        // ]);

        // $url = '';
        // if($request->file('imagen')){
        //     $url = Storage::putFile('banner-categorias', $request->file('imagen'));
        // }

        $category = new CategoriasProducto();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->resolucion = $request->resolucion;

        $resolucion = $request->resolucion;

        if ($request->hasFile('imagen')) {
            $file = $request->file("imagen");
            $nombrearchivo = $file->getClientOriginalName();
            $extension = File::extension(basename($file->getClientOriginalName()));
            $nombre_archivo = Str::random(30) . '.' . $extension;

            switch ($resolucion) {
                case 1:
                    $img = Image::make($request->file("imagen"))->resize(320, 240)
                        ->save("imagenes/categorias_productos/" . $nombre_archivo);
                    break;
                case 1:
                    $img = Image::make($request->file("imagen"))->resize(640, 480)
                        ->save("imagenes/categorias_productos/" . $nombre_archivo);
                    break;
                case 1:
                    $img = Image::make($request->file("imagen"))->resize(854, 480)
                        ->save("imagenes/categorias_productos/" . $nombre_archivo);
                    break;
                case 1:
                    $img = Image::make($request->file("imagen"))->resize(800, 600)
                        ->save("imagenes/categorias_productos/" . $nombre_archivo);
                    break;
                case 1:
                    $img = Image::make($request->file("imagen"))->resize(1024, 576)
                        ->save("imagenes/categorias_productos/" . $nombre_archivo);
                    break;
                case 1:
                    $img = Image::make($request->file("imagen"))->resize(1024, 768)
                        ->save("imagenes/categorias_productos/" . $nombre_archivo);
                    break;
                default:
                    # code...
                    break;
            }

            $category->imagen = $nombre_archivo;
        }

        // $category->url = $url;
        $category->save();
        return redirect()->route('product-category');
    }

    /**
     * Display the specified resource.
     *
     * * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoriasProducto $category)
    {
        $resoluciones = Resolucion::all();
        $caterories = CategoriasProducto::orderBy('name', 'ASC')->get();

        return view('livewire.admin.product.categories', ['categories' => $caterories, 'category' => $category, 'resoluciones' => $resoluciones]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriasProducto $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categorias_productos,slug,' . $category->id,
            'imagen' => 'image',
        ]);

        // if($request->file()){
        //     Storage::delete($category->url);
        //     $url = Storage::putFile('banner-categorias', $request->file('imagen'));
        //     $category->url = $url;
        // }

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->resolucion = $request->resolucion;

        $resolucion = $request->resolucion;

        if ($request->hasFile('imagen')) {
            $file = $request->file("imagen");
            $nombrearchivo = $file->getClientOriginalName();
            $extension = File::extension(basename($file->getClientOriginalName()));
            $nombre_archivo = Str::random(30) . '.' . $extension;

            switch ($resolucion) {
                case 1:
                    $img = Image::make($request->file("imagen"))->resize(320, 240)
                        ->save("imagenes/categorias_productos/" . $nombre_archivo);
                    break;
                case 2:
                    $img = Image::make($request->file("imagen"))->resize(640, 480)
                        ->save("imagenes/categorias_productos/" . $nombre_archivo);
                    break;
                case 3:
                    $img = Image::make($request->file("imagen"))->resize(854, 480)
                        ->save("imagenes/categorias_productos/" . $nombre_archivo);
                    break;
                case 4:
                    $img = Image::make($request->file("imagen"))->resize(800, 600)
                        ->save("imagenes/categorias_productos/" . $nombre_archivo);
                    break;
                case 5:
                    $img = Image::make($request->file("imagen"))->resize(1024, 576)
                        ->save("imagenes/categorias_productos/" . $nombre_archivo);
                    break;
                case 6:
                    $img = Image::make($request->file("imagen"))->resize(1024, 768)
                        ->save("imagenes/categorias_productos/" . $nombre_archivo);
                    break;
                default:
                    # code...
                    break;
            }

            $category->imagen = $nombre_archivo;
        }

        $category->save();

        return redirect()->route('product-category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = CategoriasProducto::find($id);
        Storage::delete($category->url);
        CategoriasProducto::destroy($id);
        return redirect()->route('product-category');
    }
}
