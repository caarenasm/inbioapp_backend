<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(){
        $productos = Productos::all();
        return view('home', ['productos'=>$productos]);
    }
}
