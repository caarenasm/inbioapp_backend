<?php

namespace App\Http\Controllers;

use App\Models\CategoriasBlog;
use Illuminate\Http\Request;

class AdminBlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = new CategoriasBlog();
        $caterories = CategoriasBlog::orderBy('name', 'ASC')->get();
        return view('livewire.admin.blog.categories', ['categories'=>$caterories, 'category' => $category]);
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
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categorias_blogs'
        ]);
        $category = new CategoriasBlog();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();
        return redirect()->route('blog-category');
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
    public function edit(CategoriasBlog $category)
    {
        $caterories = CategoriasBlog::orderBy('name', 'ASC')->get();
        return view('livewire.admin.blog.categories', ['categories'=>$caterories, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriasBlog $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categorias_blogs,slug,' . $category->id
        ]);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();
        return redirect()->route('blog-category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoriasBlog::destroy($id);
        return redirect()->route('blog-category');
    }
}
