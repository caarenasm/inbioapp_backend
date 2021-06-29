<?php

use App\Http\Middleware\OnlyAjax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\api\PreguntaController;
use App\Http\Controllers\Api\RecetaController;
use App\Http\Controllers\Api\BlogApi;
use App\Http\Controllers\Api\PlanController;
use Facade\FlareClient\Api;

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

//*Modulos para InbioApp*/
Route::group([
        'prefix' => 'auth'
    ], function () {

        Route::post('login', [AuthController::class, 'login']);
        Route::post('registro', [AuthController::class, 'registro']);
        Route::get('receta', [RecetaController::class, 'lista']);
        Route::get('pregunta', [PreguntaController::class, 'lista']);
        Route::get('blog', [BlogApi::class, 'lista']);
        Route::get('plan', [PlanController::class, 'lista']);

        Route::group([
            'middleware' => 'auth:api'
        ], function() {
            Route::get('logout', 'AuthController@logout');
            Route::get('user', 'AuthController@user');
        });
});
