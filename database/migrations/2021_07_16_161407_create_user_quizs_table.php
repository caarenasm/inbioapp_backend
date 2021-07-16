<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserQuizsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_quizs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
            ->constrained('users');

            $table->foreignId('pregunta_id')
            ->constrained('preguntas');

            $table->foreignId('respuesta_id')
            ->constrained('respuestas');

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
        Schema::dropIfExists('user_quizs');
    }
}
