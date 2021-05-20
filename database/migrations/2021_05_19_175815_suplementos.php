<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Suplementos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sumplementos', function (Blueprint $table) {

            $table->id();

            $table->string('nombre',100);

            $table->string('tipo_suplemento',100);

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
        Schema::dropIfExists('suplementos');
    }
}
