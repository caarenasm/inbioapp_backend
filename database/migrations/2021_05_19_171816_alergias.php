<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;

class Alergias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alergias', function (Blueprint $table) {

            $table->id();

            //$table->json('alimentos')->default(new Expression('(JSON_ARRAY())'));
            //$table->json('sintomas_enfermedades')->default(new Expression('(JSON_ARRAY())'));

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
        Schema::dropIfExists('alergias');
    }
}
