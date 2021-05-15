<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadesFisicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades_fisicas', function (Blueprint $table) {
            $table->id();
            $table->time('tiempo')->nullable();
            $table->double('distancia')->nullable()->default(0);
            $table->integer('nivel_energia')->nullable()->default(0);
            $table->integer('fatiga')->nullable()->default(0);

            $table->foreignId('ejercicio_id')->nullable()
            ->constrained('ejercicios')
            ->onDelete('cascade');

            $table->foreignId('tipo_actividad_fisica_id')->nullable()
            ->constrained('tipo_actividades_fisicas')
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
        Schema::dropIfExists('actividades_fisicas');
    }
}
