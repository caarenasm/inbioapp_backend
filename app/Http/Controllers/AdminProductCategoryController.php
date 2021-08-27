<?php

namespace App\Http\Controllers;

use App\Models\CategoriasProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;
use File;

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
        return view('livewire.admin.product.categories', ['categories'=>$caterories, 'category' => $category]);
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

        if ($request->hasFile('imagen')){
            $file           = $request->file("imagen");
            $nombrearchivo  = $file->getClientOriginalName();
            $extension= File::extension(basename($file->getClientOriginalName()));
            $nombre_archivo = Str::random(30).'.'.$extension;
            $file->move(public_path("imagenes/categorias_productos/"),$nombre_archivo);
            $category->imagen      = $nombre_archivo;
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
        $caterories = CategoriasProducto::orderBy('name', 'ASC')->get();
        return view('livewire.admin.product.categories', ['categories'=>$caterories, 'category' => $category]);
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
            'imagen' => 'image'
        ]);
        // if($request->file()){
        //     Storage::delete($category->url);
        //     $url = Storage::putFile('banner-categorias', $request->file('imagen'));
        //     $category->url = $url;
        // }

        $category->name = $request->name;
        $category->slug = $request->slug;

        if ($request->hasFile('imagen')){
            $file           = $request->file("imagen");
            $nombrearchivo  = $file->getClientOriginalName();
            $extension= File::extension(basename($file->getClientOriginalName()));
            $nombre_archivo = Str::random(30).'.'.$extension;
            $file->move(public_path("imagenes/categorias_productos/"),$nombre_archivo);
            $category->imagen      = $nombre_archivo;
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
