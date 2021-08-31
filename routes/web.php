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
use App\Http\Controllers\AdminEventoController;
use App\Http\Controllers\AdminIngredientesController;
use App\Http\Controllers\AdminObjetivoController;
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
use App\Http\Controllers\AdminTipoEventoController;
use App\Http\Controllers\AdminTipoLecturaController;
use App\Http\Controllers\AdminUsuarioInformacionController;
use App\Http\Controllers\AdminUsuarioEstadisticaController;
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

    Route::get('/usuarios/{user}/editar', [AdminUsuarioController::class, 'edit'])->middleware('can:editar_admin_editor')->name('usuarios.edit');
    Route::get('/usuarios', [AdminUsuarioController::class, 'index'])->middleware('can:editar_admin_editor')->name('usuarios');
    Route::get('/usuarios/crear', [AdminUsuarioController::class, 'create'])->middleware('can:admin')->name('usuarios.create');
    Route::post('/usuarios', [AdminUsuarioController::class, 'store'])->middleware('can:admin')->name('usuarios.store');
    Route::put('/usuarios/{user}', [AdminUsuarioController::class, 'update'])->middleware('can:admin')->name('usuarios.update');
    Route::delete('/usuarios/{user}/eliminar', [AdminUsuarioController::class, 'destroy'])->middleware('can:admin')->name('usuarios.delete');

    Route::get('/blog/{blog}/editar', [AdminBlogController::class, 'edit'])->middleware('can:editar_admin_editor')->name('blog.edit');
    Route::get('/blog', [AdminBlogController::class, 'index'])->middleware('can:editar_admin_editor')->name('blog');
    Route::get('/blog/crear', [AdminBlogController::class, 'create'])->middleware('can:admin')->name('blog.create');
    Route::post('/blog', [AdminBlogController::class, 'store'])->middleware('can:admin')->name('blog.store');
    Route::put('/blog/{blog}', [AdminBlogController::class, 'update'])->middleware('can:admin')->name('blog.update');
    Route::delete('/blog/{blog}/eliminar', [AdminBlogController::class, 'destroy'])->middleware('can:admin')->name('blog.delete');

    Route::get('/blog-category', [AdminBlogCategoryController::class, 'index'])->middleware('can:editar_admin_editor')->name('blog-category');
    Route::post('/blog-category', [AdminBlogCategoryController::class, 'store'])->middleware('can:admin')->name('blog-category.store');
    Route::get('/blog-category/{category}/editar', [AdminBlogCategoryController::class, 'edit'])->middleware('can:editar_admin_editor')->name('blog-category.edit');
    Route::put('/blog-category/{category}', [AdminBlogCategoryController::class, 'update'])->middleware('can:admin')->name('blog-category.update');
    Route::delete('/blog-category/{category}/eliminar', [AdminBlogCategoryController::class, 'destroy'])->middleware('can:admin')->name('blog-category.delete');

    Route::get('/product-category', [AdminProductCategoryController::class, 'index'])->middleware('can:editar_admin_editor')->name('product-category');
    Route::post('/product-category', [AdminProductCategoryController::class, 'store'])->middleware('can:admin')->name('product-category.store');
    Route::get('/product-category/{category}/editar', [AdminProductCategoryController::class, 'edit'])->middleware('can:editar_admin_editor')->name('product-category.edit');
    Route::put('/product-category/{category}', [AdminProductCategoryController::class, 'update'])->middleware('can:admin')->name('product-category.update');
    Route::delete('/product-category/{category}/eliminar', [AdminProductCategoryController::class, 'destroy'])->middleware('can:admin')->name('product-category.delete');

    Route::get('/productos/{producto}/editar', [AdminProductosController::class, 'edit'])->middleware('can:editar_admin_editor')->name('producto.edit');
    Route::get('/productos', [AdminProductosController::class, 'index'])->middleware('can:editar_admin_editor')->name('producto');
    Route::get('/productos/crear', [AdminProductosController::class, 'create'])->middleware('can:admin')->name('producto.create');
    Route::post('/productos', [AdminProductosController::class, 'store'])->middleware('can:admin')->name('producto.store');
    Route::put('/productos/{producto}', [AdminProductosController::class, 'update'])->middleware('can:admin')->name('producto.update');
    Route::delete('/productos/{producto}/eliminar', [AdminProductosController::class, 'destroy'])->middleware('can:admin')->name('producto.delete');

    Route::get('/envio-pais', [AdminEnvioPaisController::class, 'index'])->middleware('can:editar_admin_editor')->name('envio-pais');
    Route::post('/envio-pais', [AdminEnvioPaisController::class, 'store'])->middleware('can:admin')->name('envio-pais.store');
    Route::get('/envio-pais/{pais}/editar', [AdminEnvioPaisController::class, 'edit'])->middleware('can:editar_admin_editor')->name('envio-pais.edit');
    Route::put('/envio-pais/{pais}', [AdminEnvioPaisController::class, 'update'])->middleware('can:admin')->name('envio-pais.update');
    Route::delete('/envio-pais/{pais}/eliminar', [AdminEnvioPaisController::class, 'destroy'])->middleware('can:admin')->name('envio-pais.delete');

    Route::get('/categoria-alimentos', [AdminCategoriaAlimentosController::class, 'index'])->middleware('can:editar_admin_editor')->name('categoria-alimentos');
    Route::get('/categoria-alimentos/crear', [AdminCategoriaAlimentosController::class, 'create'])->middleware('can:admin')->name('categoria-alimentos.create');
    Route::post('/categoria-alimentos', [AdminCategoriaAlimentosController::class, 'store'])->middleware('can:admin')->name('categoria-alimentos.store');
    Route::get('/categoria-alimentos/{category_food}/editar', [AdminCategoriaAlimentosController::class, 'edit'])->middleware('can:editar_admin_editor')->name('categoria-alimentos.edit');
    Route::put('/categoria-alimentos/{category_food}', [AdminCategoriaAlimentosController::class, 'update'])->middleware('can:admin')->name('categoria-alimentos.update');
    Route::delete('/categoria-alimentos/{category_food}/eliminar', [AdminCategoriaAlimentosController::class, 'destroy'])->middleware('can:admin')->name('categoria-alimentos.delete');

    Route::get('/alimentos', [AdminAlimentosController::class,'index'])->middleware('can:editar_admin_editor')->name('alimentos');
    Route::get('/alimentos/crear', [AdminAlimentosController::class, 'create'])->middleware('can:admin')->name('alimentos.create');
    Route::post('/alimentos', [AdminAlimentosController::class, 'store'])->middleware('can:admin')->name('alimentos.store');
    Route::get('/alimentos/{food}/editar', [AdminAlimentosController::class, 'edit'])->middleware('can:editar_admin_editor')->name('alimentos.edit');
    Route::put('/alimentos/{food}', [AdminAlimentosController::class, 'update'])->middleware('can:admin')->name('alimentos.update');
    Route::delete('/alimentos/{food}/eliminar', [AdminAlimentosController::class, 'destroy'])->middleware('can:admin')->name('alimentos.delete');

    Route::get('/planes', [AdminPlanController::class,'index'])->middleware('can:editar_admin_editor')->name('planes');
    Route::get('/planes/crear', [AdminPlanController::class, 'create'])->middleware('can:admin')->name('planes.create');
    Route::post('/planes', [AdminPlanController::class, 'store'])->middleware('can:admin')->name('planes.store');
    Route::get('/planes/{plan}/editar', [AdminPlanController::class, 'edit'])->middleware('can:editar_admin_editor')->name('planes.edit');
    Route::put('/planes/{plan}', [AdminPlanController::class, 'update'])->middleware('can:admin')->name('planes.update');
    Route::delete('/planes/{plan}/eliminar', [AdminPlanController::class, 'destroy'])->middleware('can:admin')->name('planes.delete');

    Route::get('/mis-planes', [AdminPlanUserController::class,'index'])->middleware('can:editar_admin_editor')->name('mis-planes');
    Route::get('/asignar-mis-planes', [AdminPlanUserController::class,'index'])->middleware('can:editar_admin_editor')->name('asignar-mis-planes');

    Route::get('/preguntas', [AdminPreguntaController::class,'index'])->middleware('can:editar_admin_editor')->name('preguntas');
    Route::post('/preguntas', [AdminPreguntaController::class, 'store'])->middleware('can:admin')->name('preguntas.store');
    Route::get('/preguntas/{pregunta}/editar', [AdminPreguntaController::class, 'edit'])->middleware('can:editar_admin_editor')->name('preguntas.edit');
    Route::put('/preguntas/{pregunta}', [AdminPreguntaController::class, 'update'])->middleware('can:admin')->name('preguntas.update');
    Route::delete('/preguntas/{pregunta}/eliminar', [AdminPreguntaController::class, 'destroy'])->middleware('can:admin')->name('preguntas.delete');

    Route::get('/recetas', [AdminRecetaController::class,'index'])->middleware('can:editar_admin_editor')->name('recetas');
    Route::get('/recetas/crear', [AdminRecetaController::class, 'create'])->middleware('can:admin')->name('recetas.create');
    Route::post('/recetas', [AdminRecetaController::class, 'store'])->middleware('can:admin')->name('recetas.store');
    Route::get('/recetas/{receta}/editar', [AdminRecetaController::class, 'edit'])->middleware('can:editar_admin_editor')->name('recetas.edit');
    Route::put('/recetas/{receta}', [AdminRecetaController::class, 'update'])->middleware('can:admin')->name('recetas.update');
    Route::delete('/recetas/{receta}/eliminar', [AdminRecetaController::class, 'destroy'])->middleware('can:admin')->name('recetas.delete');

    Route::get('/ingredientes/{receta}/index', [AdminIngredientesController::class,'index'])->middleware('can:editar_admin_editor')->name('ingredientes.index');
    Route::post('/ingredientes', [AdminIngredientesController::class, 'store'])->middleware('can:admin')->name('ingredientes.store');
    Route::get('/ingredientes/{ingrediente}/editar', [AdminIngredientesController::class, 'edit'])->middleware('can:editar_admin_editor')->name('ingredientes.edit');
    Route::put('/ingredientes/{ingrediente}', [AdminIngredientesController::class, 'update'])->middleware('can:admin')->name('ingredientes.update');
    Route::delete('/ingredientes/{ingrediente}/eliminar', [AdminIngredientesController::class, 'destroy'])->middleware('can:admin')->name('ingredientes.delete');

    Route::get('/respuestas/{pregunta}/index', [AdminRespuestasController::class,'index'])->middleware('can:editar_admin_editor')->name('respuestas.index');
    Route::post('/respuestas', [AdminRespuestasController::class, 'store'])->middleware('can:admin')->name('respuestas.store');
    Route::get('/respuestas/{respuesta}/editar', [AdminRespuestasController::class, 'edit'])->middleware('can:editar_admin_editor')->name('respuestas.edit');
    Route::put('/respuestas/{respuesta}', [AdminRespuestasController::class, 'update'])->middleware('can:admin')->name('respuestas.update');
    Route::delete('/respuestas/{respuesta}/eliminar', [AdminRespuestasController::class, 'destroy'])->middleware('can:admin')->name('respuestas.delete');

    Route::get('/tipos-enfermedades/index', [AdminTipoEnfermedadController::class,'index'])->middleware('can:editar_admin_editor')->name('tipos-enfermedades.index');
    Route::post('/tipos-enfermedades', [AdminTipoEnfermedadController::class, 'store'])->middleware('can:admin')->name('tipos-enfermedades.store');
    Route::get('/tipos-enfermedades/{tipo_enfermedad}/editar', [AdminTipoEnfermedadController::class, 'edit'])->middleware('can:editar_admin_editor')->name('tipos-enfermedades.edit');
    Route::put('/tipos-enfermedades/{tipo_enfermedad}', [AdminTipoEnfermedadController::class, 'update'])->middleware('can:admin')->name('tipos-enfermedades.update');
    Route::delete('/tipos-enfermedades/{tipo_enfermedad}/eliminar', [AdminTipoEnfermedadController::class, 'destroy'])->middleware('can:admin')->name('tipos-enfermedades.delete');

    Route::get('/enfermedades/index', [AdminEnfermedadController::class,'index'])->middleware('can:editar_admin_editor')->name('enfermedades.index');
    Route::post('/enfermedades', [AdminEnfermedadController::class, 'store'])->middleware('can:admin')->name('enfermedades.store');
    Route::get('/enfermedades/{enfermedad}/editar', [AdminEnfermedadController::class, 'edit'])->middleware('can:editar_admin_editor')->name('enfermedades.edit');
    Route::put('/enfermedades/{enfermedad}', [AdminEnfermedadController::class, 'update'])->middleware('can:admin')->name('enfermedades.update');
    Route::delete('/enfermedades/{enfermedad}/eliminar', [AdminEnfermedadController::class, 'destroy'])->middleware('can:admin')->name('enfermedades.delete');

    Route::get('/semaforos-estados/index', [AdminSemaforoEstadoController::class,'index'])->middleware('can:editar_admin_editor')->name('semaforos-estados.index');
    Route::post('/semaforos-estados', [AdminSemaforoEstadoController::class, 'store'])->middleware('can:admin')->name('semaforos-estados.store');
    Route::get('/semaforos-estados/{semaforo_estado}/editar', [AdminSemaforoEstadoController::class, 'edit'])->middleware('can:editar_admin_editor')->name('semaforos-estados.edit');
    Route::put('/semaforos-estados/{semaforo_estado}', [AdminSemaforoEstadoController::class, 'update'])->middleware('can:admin')->name('semaforos-estados.update');
    Route::delete('/semaforos-estados/{semaforo_estado}/eliminar', [AdminSemaforoEstadoController::class, 'destroy'])->middleware('can:admin')->name('semaforos-estados.delete');

    Route::get('/enfermedades-alimentos/{enfermedad}/index', [AdminEnfermedadAlimentoController::class,'index'])->middleware('can:editar_admin_editor')->name('enfermedades-alimentos.index');
    Route::post('/enfermedades-alimentos/crear', [AdminEnfermedadAlimentoController::class, 'store'])->middleware('can:admin')->name('enfermedades-alimentos.store');
    Route::get('/enfermedades-alimentos/{enfermedad_alimento}/editar', [AdminEnfermedadAlimentoController::class, 'edit'])->middleware('can:editar_admin_editor')->name('enfermedades-alimentos.edit');
    Route::put('/enfermedades-alimentos/{enfermedad_alimento}', [AdminEnfermedadAlimentoController::class, 'update'])->middleware('can:admin')->name('enfermedades-alimentos.update');
    Route::delete('/enfermedades-alimentos/{enfermedad_alimento}/eliminar', [AdminEnfermedadAlimentoController::class, 'destroy'])->middleware('can:admin')->name('enfermedades-alimentos.delete');

    Route::get('/objetivos/index', [AdminObjetivoController::class,'index'])->middleware('can:editar_admin_editor')->name('objetivos');
    Route::post('/objetivos', [AdminObjetivoController::class, 'store'])->middleware('can:admin')->name('objetivos.store');
    Route::get('/objetivos/{objetivo}/editar', [AdminObjetivoController::class, 'edit'])->middleware('can:editar_admin_editor')->name('objetivos.edit');
    Route::put('/objetivos/{objetivo}', [AdminObjetivoController::class, 'update'])->middleware('can:admin')->name('objetivos.update');
    Route::delete('/objetivos/{objetivo}/eliminar', [AdminObjetivoController::class, 'destroy'])->middleware('can:admin')->name('objetivos.delete');

    Route::get('/categorias-diarios/index', [AdminCategoriaDiarioController::class,'index'])->middleware('can:editar_admin_editor')->name('categorias-diarios.index');
    Route::post('/categorias-diarios/crear', [AdminCategoriaDiarioController::class, 'store'])->middleware('can:admin')->name('categorias-diarios.store');
    Route::get('/categorias-diarios/{categoria_diario}/editar', [AdminCategoriaDiarioController::class, 'edit'])->middleware('can:editar_admin_editor')->name('categorias-diarios.edit');
    Route::put('/categorias-diarios/{categoria_diario}', [AdminCategoriaDiarioController::class, 'update'])->middleware('can:admin')->name('categorias-diarios.update');
    Route::delete('/categorias-diarios/{categoria_diario}/eliminar', [AdminCategoriaDiarioController::class, 'destroy'])->middleware('can:admin')->name('categorias-diarios.delete');

    Route::get('/tipos-lecturas/index', [AdminTipoLecturaController::class,'index'])->middleware('can:editar_admin_editor')->name('tipos-lecturas.index');
    Route::post('/tipos-lecturas/crear', [AdminTipoLecturaController::class, 'store'])->middleware('can:admin')->name('tipos-lecturas.store');
    Route::get('/tipos-lecturas/{tipo_lectura}/editar', [AdminTipoLecturaController::class, 'edit'])->middleware('can:editar_admin_editor')->name('tipos-lecturas.edit');
    Route::put('/tipos-lecturas/{tipo_lectura}', [AdminTipoLecturaController::class, 'update'])->middleware('can:admin')->name('tipos-lecturas.update');
    Route::delete('/tipos-lecturas/{tipo_lectura}/eliminar', [AdminTipoLecturaController::class, 'destroy'])->middleware('can:admin')->name('tipos-lecturas.delete');

    Route::get('/subtipos-lecturas/index', [AdminSubtipoLecturaController::class,'index'])->middleware('can:editar_admin_editor')->name('subtipos-lecturas.index');
    Route::post('/subtipos-lecturas/crear', [AdminSubtipoLecturaController::class, 'store'])->middleware('can:admin')->name('subtipos-lecturas.store');
    Route::get('/subtipos-lecturas/{subtipo_lectura}/editar', [AdminSubtipoLecturaController::class, 'edit'])->middleware('can:editar_admin_editor')->name('subtipos-lecturas.edit');
    Route::put('/subtipos-lecturas/{subtipo_lectura}', [AdminSubtipoLecturaController::class, 'update'])->middleware('can:admin')->name('subtipos-lecturas.update');
    Route::delete('/subtipos-lecturas/{subtipo_lectura}/eliminar', [AdminSubtipoLecturaController::class, 'destroy'])->middleware('can:admin')->name('subtipos-lecturas.delete');

    Route::get('/tipo-eventos/index', [AdminTipoEventoController::class,'index'])->middleware('can:editar_admin_editor')->name('tipo-eventos.index');
    Route::post('/tipo-eventos/crear', [AdminTipoEventoController::class, 'store'])->middleware('can:admin')->name('tipo-eventos.store');
    Route::get('/tipo-eventos/{tipo_evento}/editar', [AdminTipoEventoController::class, 'edit'])->middleware('can:editar_admin_editor')->name('tipo-eventos.edit');
    Route::put('/tipo-eventos/{tipo_evento}', [AdminTipoEventoController::class, 'update'])->middleware('can:admin')->name('tipo-eventos.update');
    Route::delete('/tipo-eventos/{tipo_evento}/eliminar', [AdminTipoEventoController::class, 'destroy'])->middleware('can:admin')->name('tipo-eventos.delete');

    Route::get('/eventos/index', [AdminEventoController::class,'index'])->middleware('can:editar_admin_editor')->name('eventos.index');
    Route::post('/eventos/crear', [AdminEventoController::class, 'store'])->middleware('can:admin')->name('eventos.store');
    Route::get('/eventos/{evento}/editar', [AdminEventoController::class, 'edit'])->middleware('can:editar_admin_editor')->name('eventos.edit');
    Route::put('/eventos/{evento}', [AdminEventoController::class, 'update'])->middleware('can:admin')->name('eventos.update');
    Route::delete('/eventos/{evento}/eliminar', [AdminEventoController::class, 'destroy'])->middleware('can:admin')->name('eventos.delete');

    Route::get('/usuario-informacion/index', [AdminUsuarioInformacionController::class,'index'])->middleware('can:info_clientes')->name('informacion.index');
    Route::get('/usuario-informacion/{user_id}/estadisticas', [AdminUsuarioInformacionController::class,'estadisticas_lecturas'])->middleware('can:info_clientes')->name('estadisticas');
    Route::get('/usuario-informacion/{user_id}/estadisticas/enfermedades', [AdminUsuarioInformacionController::class,'estadisticas_enfermedades'])->middleware('can:info_clientes')->name('estadisticas-enfermedades');
});

// Route::middleware(['auth:sanctum', 'verified'])->prefix('administracion')->group(function(){

//     Route::resource('usuarios', AdminUsuarioController::class);
//     Route::resource('blog', AdminBlogController::class);
//     Route::resource('blog-category', AdminBlogCategoryController::class);
//     Route::resource('product-category', AdminProductCategoryController::class);
//     Route::resource('productos', AdminProductosController::class);
//     Route::resource('envio-pais', AdminEnvioPaisController::class);
//     Route::resource('categoria-alimentos', AdminCategoriaAlimentosController::class);
//     Route::resource('alimentos', AdminAlimentosController::class);
//     Route::resource('planes', AdminPlanController::class);
//     Route::resource('preguntas', AdminPreguntaController::class);
//     Route::resource('recetas', AdminRecetaController::class);
//     Route::resource('ingredientes', AdminIngredientesController::class);
//     Route::resource('respuestas', AdminRespuestasController::class);
//     Route::resource('tipo-enfermedades', AdminTipoEnfermedadController::class);
//     Route::resource('enfermedades', AdminEnfermedadController::class);
//     Route::resource('objetivos', AdminObjetivoController::class);
//     Route::resource('categorias-diarios', AdminCategoriaDiarioController::class);
//     Route::resource('tipos-lecturas', AdminTipoLecturaController::class);
//     Route::resource('subtipo-lecturas', AdminSubtipoLecturaController::class);
//     Route::resource('tipo-eventos', AdminTipoEventoController::class);
//     Route::resource('eventos', AdminEventoController::class);
//     Route::resource('usuario-informacion', AdminUsuarioInformacionController::class);
    
// });