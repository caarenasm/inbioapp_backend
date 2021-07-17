<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_quiz', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
            ->constrained('users');

            $table->foreignId('pregunta_id')
            ->constrained('preguntas');

            $table->foreignId('respuesta_id')
            ->constrained('respuestas');

            $table->string('de_respuesta',255);

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
        Schema::dropIfExists('user_quiz');
    }
}
