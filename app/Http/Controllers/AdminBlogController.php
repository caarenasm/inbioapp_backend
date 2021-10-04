<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\CategoriasBlog;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Resolucion;
use App\Http\Requests\AdminBlogRequest;

use Illuminate\Support\Str;
use File;
use Intervention\Image\ImageManagerStatic as Image;

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
        $resoluciones = Resolucion::all();
        return view('livewire.admin.blog.index', ['posts' => $posts,'resoluciones'=>$resoluciones]);
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
        $resoluciones = Resolucion::all();
        return view('livewire.admin.blog.nuevo', ['users' => $users, 'categories' => $categories, 'post' => $post,'resoluciones'=>$resoluciones]);
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
        $blog->resolucion = $request->resolucion;
       
        $resolucion = $request->resolucion;

        if ($request->hasFile('image_url')){
            $file           = $request->file("image_url");
            $nombre_archivo  = $file->getClientOriginalName();
            $extension= File::extension(basename($file->getClientOriginalName()));
            $nombre_archivo = Str::random(30).'.'.$extension;
            
            switch ($resolucion) {
                case 1:
                    $img = Image::make($request->file("image_url"))->resize(320, 240)
                        ->save("imagenes/blog/" . $nombre_archivo);
                    break;
                case 2:
                    $img = Image::make($request->file("image_url"))->resize(640, 480)
                        ->save("imagenes/blog/" . $nombre_archivo);
                    break;
                case 3:
                    $img = Image::make($request->file("image_url"))->resize(854, 480)
                        ->save("imagenes/blog/" . $nombre_archivo);
                    break;
                case 4:
                    $img = Image::make($request->file("image_url"))->resize(800, 600)
                        ->save("imagenes/blog/" . $nombre_archivo);
                    break;
                case 5:
                    $img = Image::make($request->file("image_url"))->resize(1024, 576)
                        ->save("imagenes/blog/" . $nombre_archivo);
                    break;
                case 6:
                    $img = Image::make($request->file("image_url"))->resize(1024, 768)
                        ->save("imagenes/blog/" . $nombre_archivo);
                    break;
                default:
                    # code...
                    break;
            }
            
            $blog->image_url = $nombre_archivo;
        }

        $blog->save();

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
        $resoluciones = Resolucion::all();
        return view('livewire.admin.blog.edit', ['post' => $blog, 'users' => $users, 'categories' => $categories,'resoluciones' => $resoluciones]);
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

        $blog->resolucion = $request->resolucion;
       
        $resolucion = $request->resolucion;

        if ($request->hasFile('image_url')){
            $file           = $request->file("image_url");
            $nombre_archivo  = $file->getClientOriginalName();
            $extension= File::extension(basename($file->getClientOriginalName()));
            $nombre_archivo = Str::random(30).'.'.$extension;
            
            switch ($resolucion) {
                case 1:
                    $img = Image::make($request->file("image_url"))->resize(320, 240)
                        ->save("imagenes/blog/" . $nombre_archivo);
                    break;
                case 2:
                    $img = Image::make($request->file("image_url"))->resize(640, 480)
                        ->save("imagenes/blog/" . $nombre_archivo);
                    break;
                case 3:
                    $img = Image::make($request->file("image_url"))->resize(854, 480)
                        ->save("imagenes/blog/" . $nombre_archivo);
                    break;
                case 4:
                    $img = Image::make($request->file("image_url"))->resize(800, 600)
                        ->save("imagenes/blog/" . $nombre_archivo);
                    break;
                case 5:
                    $img = Image::make($request->file("image_url"))->resize(1024, 576)
                        ->save("imagenes/blog/" . $nombre_archivo);
                    break;
                case 6:
                    $img = Image::make($request->file("image_url"))->resize(1024, 768)
                        ->save("imagenes/blog/" . $nombre_archivo);
                    break;
                default:
                    # code...
                    break;
            }
            
            $blog->image_url = $nombre_archivo;
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
        Blog::destroy($id);
        return redirect()->route('blog');
    }
}
