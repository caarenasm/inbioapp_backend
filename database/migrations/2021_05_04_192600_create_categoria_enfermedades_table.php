<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaEnfermedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_enfermedades', function (Blueprint $table) {

            $table->id();

            $table->string('tipo_enfermedad');
            $table->text('descripcion');

            $table->foreignId('pregunta_id')->references('id')->on('preguntas')->onDelete('cascade');
            
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
        Schema::dropIfExists('categoria_enfermedades');
    }
}
