<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\CategoriasBlog;

class BlogApi extends Controller
{
    public function lista(){

        $response = [];

        $blogs = Blog::select('id', 'title', 'slug', 'seo_title', 'seo_description', 'image_url', 'content', 'start_date', 'end_date', 'published', 'user_id')
        ->orderBy('id','asc')->get()->toArray();


        foreach ($blogs as $key => $value) {

            $categorias_blogs = CategoriasBlog::leftjoin('blog_categorias_blog', 'categorias_blog_id', '=', 'categorias_blogs.id')
            ->select('categorias_blogs.id', 'name', 'slug')->where('blog_id','=',$value['id'])->orderBy('id','asc')
            ->get()->toArray();

            $blogs[$key]['categorias_blogs'] = $categorias_blogs;
            $response = $blogs;

            $response = [];

            }

            return response([
                'data' => $response
            ]);
            
    }

    public function lista_categorias(){

        $categorias = [];
        
        $categorias = CategoriasBlog::select('id', 'name', 'slug', 'created_at', 'updated_at')
        ->orderBy('id','asc')->get()->toArray();

            return response([
                'data' => $categorias
            ]);
            
    }
}
