<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favoritos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('producto_id')->nullable()
            ->constrained('productos')
            ->onDelete('cascade');

            $table->foreignId('receta_id')->nullable()
            ->constrained('recetas')
            ->onDelete('cascade');

            $table->foreignId('alimento_id')->nullable()
            ->constrained('alimentos')
            ->onDelete('cascade');

            $table->foreignId('blog_id')->nullable()
            ->constrained('blogs')
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
        Schema::dropIfExists('favoritos');
    }
}
