<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturaUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectura_users', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
            ->constrained('users');

            $table->foreignId('tipo_lectura_id')
            ->constrained('tipo_lecturas');

            $table->json('datos_leidos');

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
        Schema::dropIfExists('lectura_users');
    }
}
