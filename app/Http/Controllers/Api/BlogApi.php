<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\CategoriasBlog;

class BlogApi extends Controller
{
    public function lista(){

        $blogs = Blog::select('id', 'title', 'slug', 'image_url', 'content', 'start_date', 'end_date')
        ->orderBy('id','asc')->get()->toArray();

        $response = [];

        foreach ($blogs as $key => $value) {
            $categoria = CategoriasBlog::leftjoin('blog_categorias_blog', 'categorias_blog_id', '=', 'categorias_blogs.id')
            ->select('categorias_blogs.id', 'name', 'slug')->where('blog_id','=',$value['id'])->orderBy('id','asc')
            ->get()->toArray();

            $response[$key]['id'] = $value['id'];
            $response[$key]['title'] = $value['title'];
            $response[$key]['content'] = $value['content'];
            $response[$key]['start_date'] = $value['start_date'];
            $response[$key]['image_url'] = asset('imagenes/blog/' . $value['image_url']);
            $response[$key]['categoria'] = $categoria;

        }

        return response()->json($response);
        
    }

    public function categoria(){

        $response = [];
        
        $data = CategoriasBlog::select('id', 'name')
        ->orderBy('id','asc')->get()->toArray();

        foreach ($data as $key => $value) {
            $response[$key]['value'] = $value['id'];
            $response[$key]['text'] = $value['name'];
        }

        return response()->json($response);
    }
}
