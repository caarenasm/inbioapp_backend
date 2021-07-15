<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubtipoLecturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subtipo_lecturas', function (Blueprint $table) {
            $table->id();

            $table->string('descripcion');

            $table->string('icono');
            
            $table->foreignId('tipo_lectura_id')
            ->constrained('tipo_lecturas');

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
        Schema::dropIfExists('subtipo_lecturas');
    }
}
