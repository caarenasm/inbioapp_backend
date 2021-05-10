<?php

use App\Http\Controllers\AdminAlimentosController;
use App\Http\Controllers\AdminBlogCategoryController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminCatgAlimentosController;
use App\Http\Controllers\AdminCrearAlimentosController;
use App\Http\Controllers\AdminCrearCatgAlimentosController;
use App\Http\Controllers\AdminEnvioPaisController;
use App\Http\Controllers\AdminEscritorioController;
use App\Http\Controllers\AdminProductCategoryController;
use App\Http\Controllers\AdminProductosController;
use App\Http\Controllers\AdminUsuarioController;
use App\Http\Controllers\AdminEnfermedadesController;
use App\Http\Controllers\AdminCrearEnfermedadController;
use App\Http\Controllers\AdminEditarAlimentosController;
use App\Http\Controllers\AdminEditarCatgAlimentosController;
use App\Http\Controllers\AdminEditarEnfermedadController;
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

    Route::get('/enfermedades',AdminEnfermedadesController::class)->name('enfermedad');
    Route::get('/enfermedades/crear',AdminCrearEnfermedadController::class)->name('crear-enfermedad');
    Route::get('/enfermedades/editar',AdminEditarEnfermedadController::class)->name('editar-enfermedad');

    Route::get('/alimentos',AdminAlimentosController::class)->name('alimento');
    Route::get('/alimentos/crear',AdminCrearAlimentosController::class)->name('crear-alimento');
    Route::get('/alimentos/editar',AdminEditarAlimentosController::class)->name('editar-alimento');

    Route::get('/categ-alimentos',AdminCatgAlimentosController::class)->name('categ-alimento');
    Route::get('/categ-alimentos/crear',AdminCrearCatgAlimentosController::class)->name('crear-categ-alimento');
    Route::get('/categ-alimentos/editar',AdminEditarCatgAlimentosController::class)->name('editar-categ-alimento');

});
