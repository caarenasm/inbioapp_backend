<?php

use App\Http\Controllers\AdminAlimentosController;
use App\Http\Controllers\AdminBlogCategoryController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminCategoriaAlimentosController;
use App\Http\Controllers\AdminCategoriaDiarioController;
use App\Http\Controllers\AdminEnfermedadAlimentoController;
use App\Http\Controllers\AdminEnfermedadController;
use App\Http\Controllers\AdminEnvioPaisController;
use App\Http\Controllers\AdminEscritorioController;
use App\Http\Controllers\AdminIngredientesController;
use App\Http\Controllers\AdminProductCategoryController;
use App\Http\Controllers\AdminProductosController;
use App\Http\Controllers\AdminUsuarioController;
use App\Http\Controllers\AdminPlanController;
use App\Http\Controllers\AdminRecetaController;
use App\Http\Controllers\AdminPreguntaController;
use App\Http\Controllers\AdminRespuestasController;
use App\Http\Controllers\AdminSemaforoEstadoController;
use App\Http\Controllers\AdminSubtipoLecturaController;
use App\Http\Controllers\AdminTipoEnfermedadController;
use App\Http\Controllers\AdminTipoLecturaController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class);

/*Route::get('/foo', function () {
    Artisan::call('storage:link');
});*/

/*Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('cache:clear');

    return 'All routes cache has just been removed';
});*/

// Administración
Route::middleware(['auth:sanctum', 'verified'])->prefix('administracion')->group(function(){

    
    Route::get('/', AdminEscritorioController::class)->name('escritorio');

    Route::get('/usuarios/{user}/editar', [AdminUsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::get('/usuarios', [AdminUsuarioController::class, 'index'])->name('usuarios');
    Route::get('/usuarios/crear', [AdminUsuarioController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [AdminUsuarioController::class, 'store'])->name('usuarios.store');
    Route::put('/usuarios/{user}', [AdminUsuarioController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{user}/eliminar', [AdminUsuarioController::class, 'destroy'])->name('usuarios.delete');

    Route::get('/blog/{blog}/editar', [AdminBlogController::class, 'edit'])->name('blog.edit');
    Route::get('/blog', [AdminBlogController::class, 'index'])->name('blog');
    Route::get('/blog/crear', [AdminBlogController::class, 'create'])->name('blog.create');
    Route::post('/blog', [AdminBlogController::class, 'store'])->name('blog.store');
    Route::put('/blog/{blog}', [AdminBlogController::class, 'update'])->name('blog.update');
    Route::delete('/blog/{blog}/eliminar', [AdminBlogController::class, 'destroy'])->name('blog.delete');

    Route::get('/blog-category', [AdminBlogCategoryController::class, 'index'])->name('blog-category');
    Route::post('/blog-category', [AdminBlogCategoryController::class, 'store'])->name('blog-category.store');
    Route::get('/blog-category/{category}/editar', [AdminBlogCategoryController::class, 'edit'])->name('blog-category.edit');
    Route::put('/blog-category/{category}', [AdminBlogCategoryController::class, 'update'])->name('blog-category.update');
    Route::delete('/blog-category/{category}/eliminar', [AdminBlogCategoryController::class, 'destroy'])->name('blog-category.delete');

    Route::get('/product-category', [AdminProductCategoryController::class, 'index'])->name('product-category');
    Route::post('/product-category', [AdminProductCategoryController::class, 'store'])->name('product-category.store');
    Route::get('/product-category/{category}/editar', [AdminProductCategoryController::class, 'edit'])->name('product-category.edit');
    Route::put('/product-category/{category}', [AdminProductCategoryController::class, 'update'])->name('product-category.update');
    Route::delete('/product-category/{category}/eliminar', [AdminProductCategoryController::class, 'destroy'])->name('product-category.delete');

    Route::get('/productos/{producto}/editar', [AdminProductosController::class, 'edit'])->name('producto.edit');
    Route::get('/productos', [AdminProductosController::class, 'index'])->name('producto');
    Route::get('/productos/crear', [AdminProductosController::class, 'create'])->name('producto.create');
    Route::post('/productos', [AdminProductosController::class, 'store'])->name('producto.store');
    Route::put('/productos/{producto}', [AdminProductosController::class, 'update'])->name('producto.update');
    Route::delete('/productos/{producto}/eliminar', [AdminProductosController::class, 'destroy'])->name('producto.delete');

    Route::get('/envio-pais', [AdminEnvioPaisController::class, 'index'])->name('envio-pais');
    Route::post('/envio-pais', [AdminEnvioPaisController::class, 'store'])->name('envio-pais.store');
    Route::get('/envio-pais/{pais}/editar', [AdminEnvioPaisController::class, 'edit'])->name('envio-pais.edit');
    Route::put('/envio-pais/{pais}', [AdminEnvioPaisController::class, 'update'])->name('envio-pais.update');
    Route::delete('/envio-pais/{pais}/eliminar', [AdminEnvioPaisController::class, 'destroy'])->name('envio-pais.delete');

    Route::get('/categoria-alimentos', [AdminCategoriaAlimentosController::class, 'index'])->name('categoria-alimentos');
    Route::get('/categoria-alimentos/crear', [AdminCategoriaAlimentosController::class, 'create'])->name('categoria-alimentos.create');
    Route::post('/categoria-alimentos', [AdminCategoriaAlimentosController::class, 'store'])->name('categoria-alimentos.store');
    Route::get('/categoria-alimentos/{category_food}/editar', [AdminCategoriaAlimentosController::class, 'edit'])->name('categoria-alimentos.edit');
    Route::put('/categoria-alimentos/{category_food}', [AdminCategoriaAlimentosController::class, 'update'])->name('categoria-alimentos.update');
    Route::delete('/categoria-alimentos/{category_food}/eliminar', [AdminCategoriaAlimentosController::class, 'destroy'])->name('categoria-alimentos.delete');

    Route::get('/alimentos', [AdminAlimentosController::class,'index'])->name('alimentos');
    Route::get('/alimentos/crear', [AdminAlimentosController::class, 'create'])->name('alimentos.create');
    Route::post('/alimentos', [AdminAlimentosController::class, 'store'])->name('alimentos.store');
    Route::get('/alimentos/{food}/editar', [AdminAlimentosController::class, 'edit'])->name('alimentos.edit');
    Route::put('/alimentos/{food}', [AdminAlimentosController::class, 'update'])->name('alimentos.update');
    Route::delete('/alimentos/{food}/eliminar', [AdminAlimentosController::class, 'destroy'])->name('alimentos.delete');

    Route::get('/planes', [AdminPlanController::class,'index'])->name('planes');
    Route::get('/planes/crear', [AdminPlanController::class, 'create'])->name('planes.create');
    Route::post('/planes', [AdminPlanController::class, 'store'])->name('planes.store');
    Route::get('/planes/{plan}/editar', [AdminPlanController::class, 'edit'])->name('planes.edit');
    Route::put('/planes/{plan}', [AdminPlanController::class, 'update'])->name('planes.update');
    Route::delete('/planes/{plan}/eliminar', [AdminPlanController::class, 'destroy'])->name('planes.delete');

    Route::get('/mis-planes', [AdminPlanUserController::class,'index'])->name('mis-planes');
    Route::get('/asignar-mis-planes', [AdminPlanUserController::class,'index'])->name('asignar-mis-planes');

    Route::get('/preguntas', [AdminPreguntaController::class,'index'])->name('preguntas');
    Route::post('/preguntas', [AdminPreguntaController::class, 'store'])->name('preguntas.store');
    Route::get('/preguntas/{pregunta}/editar', [AdminPreguntaController::class, 'edit'])->name('preguntas.edit');
    Route::put('/preguntas/{pregunta}', [AdminPreguntaController::class, 'update'])->name('preguntas.update');
    Route::delete('/preguntas/{pregunta}/eliminar', [AdminPreguntaController::class, 'destroy'])->name('preguntas.delete');

    Route::get('/recetas', [AdminRecetaController::class,'index'])->name('recetas');
    Route::get('/recetas/crear', [AdminRecetaController::class, 'create'])->name('recetas.create');
    Route::post('/recetas', [AdminRecetaController::class, 'store'])->name('recetas.store');
    Route::get('/recetas/{receta}/editar', [AdminRecetaController::class, 'edit'])->name('recetas.edit');
    Route::put('/recetas/{receta}', [AdminRecetaController::class, 'update'])->name('recetas.update');
    Route::delete('/recetas/{receta}/eliminar', [AdminRecetaController::class, 'destroy'])->name('recetas.delete');

    Route::get('/ingredientes/{receta}/index', [AdminIngredientesController::class,'index'])->name('ingredientes.index');
    Route::post('/ingredientes', [AdminIngredientesController::class, 'store'])->name('ingredientes.store');
    Route::get('/ingredientes/{ingrediente}/editar', [AdminIngredientesController::class, 'edit'])->name('ingredientes.edit');
    Route::put('/ingredientes/{ingrediente}', [AdminIngredientesController::class, 'update'])->name('ingredientes.update');
    Route::delete('/ingredientes/{ingrediente}/eliminar', [AdminIngredientesController::class, 'destroy'])->name('ingredientes.delete');

    Route::get('/respuestas/{pregunta}/index', [AdminRespuestasController::class,'index'])->name('respuestas.index');
    Route::post('/respuestas', [AdminRespuestasController::class, 'store'])->name('respuestas.store');
    Route::get('/respuestas/{respuesta}/editar', [AdminRespuestasController::class, 'edit'])->name('respuestas.edit');
    Route::put('/respuestas/{respuesta}', [AdminRespuestasController::class, 'update'])->name('respuestas.update');
    Route::delete('/respuestas/{respuesta}/eliminar', [AdminRespuestasController::class, 'destroy'])->name('respuestas.delete');

    Route::get('/tipos-enfermedades/index', [AdminTipoEnfermedadController::class,'index'])->name('tipos-enfermedades.index');
    Route::post('/tipos-enfermedades', [AdminTipoEnfermedadController::class, 'store'])->name('tipos-enfermedades.store');
    Route::get('/tipos-enfermedades/{tipo_enfermedad}/editar', [AdminTipoEnfermedadController::class, 'edit'])->name('tipos-enfermedades.edit');
    Route::put('/tipos-enfermedades/{tipo_enfermedad}', [AdminTipoEnfermedadController::class, 'update'])->name('tipos-enfermedades.update');
    Route::delete('/tipos-enfermedades/{tipo_enfermedad}/eliminar', [AdminTipoEnfermedadController::class, 'destroy'])->name('tipos-enfermedades.delete');

    Route::get('/enfermedades/index', [AdminEnfermedadController::class,'index'])->name('enfermedades.index');
    Route::post('/enfermedades', [AdminEnfermedadController::class, 'store'])->name('enfermedades.store');
    Route::get('/enfermedades/{enfermedad}/editar', [AdminEnfermedadController::class, 'edit'])->name('enfermedades.edit');
    Route::put('/enfermedades/{enfermedad}', [AdminEnfermedadController::class, 'update'])->name('enfermedades.update');
    Route::delete('/enfermedades/{enfermedad}/eliminar', [AdminEnfermedadController::class, 'destroy'])->name('enfermedades.delete');

    Route::get('/semaforos-estados/index', [AdminSemaforoEstadoController::class,'index'])->name('semaforos-estados.index');
    Route::post('/semaforos-estados', [AdminSemaforoEstadoController::class, 'store'])->name('semaforos-estados.store');
    Route::get('/semaforos-estados/{semaforo_estado}/editar', [AdminSemaforoEstadoController::class, 'edit'])->name('semaforos-estados.edit');
    Route::put('/semaforos-estados/{semaforo_estado}', [AdminSemaforoEstadoController::class, 'update'])->name('semaforos-estados.update');
    Route::delete('/semaforos-estados/{semaforo_estado}/eliminar', [AdminSemaforoEstadoController::class, 'destroy'])->name('semaforos-estados.delete');

    Route::get('/enfermedades-alimentos/{enfermedad}/index', [AdminEnfermedadAlimentoController::class,'index'])->name('enfermedades-alimentos.index');
    Route::post('/enfermedades-alimentos/crear', [AdminEnfermedadAlimentoController::class, 'store'])->name('enfermedades-alimentos.store');
    Route::get('/enfermedades-alimentos/{enfermedad_alimento}/editar', [AdminEnfermedadAlimentoController::class, 'edit'])->name('enfermedades-alimentos.edit');
    Route::put('/enfermedades-alimentos/{enfermedad_alimento}', [AdminEnfermedadAlimentoController::class, 'update'])->name('enfermedades-alimentos.update');
    Route::delete('/enfermedades-alimentos/{enfermedad_alimento}/eliminar', [AdminEnfermedadAlimentoController::class, 'destroy'])->name('enfermedades-alimentos.delete');

    Route::get('/categorias-diarios/index', [AdminCategoriaDiarioController::class,'index'])->name('categorias-diarios.index');
    Route::post('/categorias-diarios/crear', [AdminCategoriaDiarioController::class, 'store'])->name('categorias-diarios.store');
    Route::get('/categorias-diarios/{categoria_diario}/editar', [AdminCategoriaDiarioController::class, 'edit'])->name('categorias-diarios.edit');
    Route::put('/categorias-diarios/{categoria_diario}', [AdminCategoriaDiarioController::class, 'update'])->name('categorias-diarios.update');
    Route::delete('/categorias-diarios/{categoria_diario}/eliminar', [AdminCategoriaDiarioController::class, 'destroy'])->name('categorias-diarios.delete');

    Route::get('/tipos-lecturas/index', [AdminTipoLecturaController::class,'index'])->name('tipos-lecturas.index');
    Route::post('/tipos-lecturas/crear', [AdminTipoLecturaController::class, 'store'])->name('tipos-lecturas.store');
    Route::get('/tipos-lecturas/{tipo_lectura}/editar', [AdminTipoLecturaController::class, 'edit'])->name('tipos-lecturas.edit');
    Route::put('/tipos-lecturas/{tipo_lectura}', [AdminTipoLecturaController::class, 'update'])->name('tipos-lecturas.update');
    Route::delete('/tipos-lecturas/{tipo_lectura}/eliminar', [AdminTipoLecturaController::class, 'destroy'])->name('tipos-lecturas.delete');

    Route::get('/subtipos-lecturas/index', [AdminSubtipoLecturaController::class,'index'])->name('subtipos-lecturas.index');
    Route::post('/subtipos-lecturas/crear', [AdminSubtipoLecturaController::class, 'store'])->name('subtipos-lecturas.store');
    Route::get('/subtipos-lecturas/{subtipo_lectura}/editar', [AdminSubtipoLecturaController::class, 'edit'])->name('subtipos-lecturas.edit');
    Route::put('/subtipos-lecturas/{subtipo_lectura}', [AdminSubtipoLecturaController::class, 'update'])->name('subtipos-lecturas.update');
    Route::delete('/subtipos-lecturas/{subtipo_lectura}/eliminar', [AdminSubtipoLecturaController::class, 'destroy'])->name('subtipos-lecturas.delete');

});