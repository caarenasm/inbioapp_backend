<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;

class Antojos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antojos', function (Blueprint $table) {

            $table->id();

            $table->string('frecuencia',100);

            //$table->json('alimentos')->default(new Expression('(JSON_ARRAY())'));

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
        Schema::dropIfExists('antojos');
    }
}
