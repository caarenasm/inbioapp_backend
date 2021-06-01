<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recetas', function (Blueprint $table) {

            $table->id();

            $table->string('titulo',45);
            $table->string('slug',45)->unique();
            $table->string('seo_titulo',45)->nullable();
            $table->text('seo_descripcion')->nullable();
            $table->string('imagen_url',255)->nullable();
            $table->text('descripcion')->nullable();
            $table->text('preparacion')->nullable();
            $table->date('fecha_publicacion')->nullable();
            $table->tinyInteger('publicacion');
            $table->double('caloria')->nullable();
            $table->double('grasa')->nullable();
            $table->double('proteina')->nullable();
        
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
        Schema::dropIfExists('recetas');
    }
}
