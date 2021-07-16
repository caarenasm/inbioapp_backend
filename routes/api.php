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
use App\Http\Controllers\Api\EnfermedadAlimentoController;
use App\Http\Controllers\api\LecturaUserController;
use App\Http\Controllers\api\TipoLecturaController;
use App\Models\LecturaUser;
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
        Route::get('quiz', [PreguntaController::class, 'lista']);
        Route::post('quiz/guardar', [PreguntaController::class, 'guardar']);

        Route::group([
            'middleware' => ['auth:api']
        ], function() {

            Route::get('datos', [AuthController::class, 'user']);
            Route::post('plan/planUser', [PlanController::class, 'user_plan']);
            Route::get('semaforo/categoria', [EnfermedadAlimentoController::class, 'categoria']);
            Route::get('semaforo/enfermedades/usuario', [EnfermedadAlimentoController::class, 'enfermedad_usuario']);
            Route::post('semaforo/categoria/alimento', [EnfermedadAlimentoController::class, 'categoria_alimentos']);
            Route::post('semaforo/enfermedad/guardar', [EnfermedadAlimentoController::class, 'guardar']);
            Route::post('semaforo/alimento', [EnfermedadAlimentoController::class, 'semaforo']);
            Route::get('receta', [RecetaController::class, 'lista']);
            Route::get('blog', [BlogApi::class, 'lista']);
            Route::get('plan', [PlanController::class, 'lista']);
            Route::get('tipo/lecturas', [TipoLecturaController::class, 'tiposLecturas']);
            Route::get('tipo/lectura/subtipos', [TipoLecturaController::class, 'subtiposLecturas']);
            Route::post('tipo/lectura/users', [LecturaUserController::class, 'guardar']);
            Route::get('logout', [AuthController::class, 'logout']);
            
        });
});
