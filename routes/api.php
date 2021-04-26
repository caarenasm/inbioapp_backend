<?php

use App\Http\Middleware\OnlyAjax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(OnlyAjax::class)->post('/blog/imagen', function(Request $request){
    $url = Storage::putFile('blog/entrada', $request->file('upload'));
    $imagen = array('url' => '/storage/'.$url);
    return json_encode($imagen);
})->name('blog.imagen');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
