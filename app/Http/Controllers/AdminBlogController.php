<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\CategoriasBlog;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\AdminBlogRequest;
use Illuminate\Support\Facades\Storage;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Blog::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.admin.blog.index', ['posts' => $posts]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imagen()
    {
        return true;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Blog();
        $users = User::role(['Administrador', 'Editor'])->get();
        $categories = CategoriasBlog::all();
        return view('livewire.admin.blog.nuevo', ['users' => $users, 'categories' => $categories, 'post' => $post]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminBlogRequest $request)
    {
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->seo_title = $request->seo_title;
        $blog->seo_description = $request->seo_description;
        $blog->content = $request->text;
        $blog->start_date = $request->start_date != '' ? $request->start_date : date('Y-m-d');
        $blog->end_date = $request->end_date;
        $blog->published = $request->published;
        $blog->user_id = $request->author;
        $blog->save();

        if ($request->file('imagen')) {
            $extension = $request->file('imagen')->extension();
            $url = Storage::putFileAs('blog', $request->file('imagen'), $request->slug . '.' . $extension);
            $blog->image_url = $url;
            $blog->save();
        }

        if ($request->categoria) {
            $blog->categorias()->attach($request->categoria);
        }

        return redirect()->route('blog');
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $users = User::role(['Administrador', 'Editor'])->get();
        $categories = CategoriasBlog::all();
        return view('livewire.admin.blog.edit', ['post' => $blog, 'users' => $users, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminBlogRequest $request, Blog $blog)
    {
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->seo_title = $request->seo_title;
        $blog->seo_description = $request->seo_description;
        $blog->content = $request->text;
        $blog->start_date = $request->start_date != '' ? $request->start_date : date('Y-m-d');
        $blog->end_date = $request->end_date;
        $blog->published = $request->published;
        $blog->user_id = $request->author;

        if ($request->file('imagen')) {
            $extension = $request->file('imagen')->extension();
            $url = Storage::putFileAs('blog', $request->file('imagen'), $request->slug . '.' . $extension);
            $blog->image_url = $url;
        }

        $blog->save();

        $blog->categorias()->sync($request->categoria);

        return redirect()->route('blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Blog::find($id);
        Storage::delete($post->url);
        Blog::destroy($id);
        return redirect()->route('blog');
    }
}
