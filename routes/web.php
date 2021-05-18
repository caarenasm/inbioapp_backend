<?php

use App\Http\Controllers\AdminAlimentosController;
use App\Http\Controllers\AdminBlogCategoryController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminCategoriaAlimentosController;
use App\Http\Controllers\AdminEnvioPaisController;
use App\Http\Controllers\AdminEscritorioController;
use App\Http\Controllers\AdminProductCategoryController;
use App\Http\Controllers\AdminProductosController;
use App\Http\Controllers\AdminUsuarioController;
use App\Http\Controllers\AdminPlanController;
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

    // Route::get('/enfermedades',AdminEnfermedadesController::class)->name('enfermedad');
    // Route::get('/enfermedades/crear',AdminCrearEnfermedadController::class)->name('crear-enfermedad');
    // Route::get('/enfermedades/editar',AdminEditarEnfermedadController::class)->name('editar-enfermedad');

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

});
