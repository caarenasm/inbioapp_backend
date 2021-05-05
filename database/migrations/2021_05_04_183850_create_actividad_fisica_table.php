<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadFisicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_fisica', function (Blueprint $table) {
            $table->id();
            $table->time('tiempo')->nullable();
            $table->double('distancia')->nullable()->default(0);
            $table->integer('nivel_energia')->nullable()->default(0);
            $table->integer('fatiga')->nullable()->default(0);

            $table->foreignId('ejercicio_id')->nullable()
            ->constrained('ejercicio')
            ->onDelete('cascade');

            $table->foreignId('tipo_act_fisica_id')->nullable()
            ->constrained('tipo_actividad_fisica')
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
        Schema::dropIfExists('actividad_fisica');
    }
}
