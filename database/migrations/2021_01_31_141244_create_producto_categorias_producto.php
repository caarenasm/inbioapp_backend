<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoCategoriasProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias_producto_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productos_id');
            $table->unsignedBigInteger('categorias_producto_id');

            $table->foreign('productos_id')
                ->references('id')
                ->on('productos')
                ->onDelete('cascade');

            $table->foreign('categorias_producto_id')
                ->references('id')
                ->on('categorias_productos')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto_categorias_producto');
    }
}
