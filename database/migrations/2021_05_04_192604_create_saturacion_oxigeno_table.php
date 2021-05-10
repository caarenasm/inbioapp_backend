<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaturacionOxigenoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saturacion_oxigeno', function (Blueprint $table) {
            $table->id();
            $table->time('hora')->nullable();
            $table->double('spo')->nullable();
            $table->double('prb')->nullable();

            $table->foreignId('categoria_enfer_id')->nullable()
            ->constrained('categ_enfermedad')
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
        Schema::dropIfExists('saturacion_oxigeno');
    }
}
