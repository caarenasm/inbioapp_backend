<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;

class PlanController extends Controller
{
    public function lista(){

        $plans = Plan::select('id', 'titulo', 'slug', 'descripcion', 'imagen_url', 'precio')
        ->orderBy('id','asc')->get()->toArray();

            return response([
                'data' => $plans
            ]);
            
    }
}
