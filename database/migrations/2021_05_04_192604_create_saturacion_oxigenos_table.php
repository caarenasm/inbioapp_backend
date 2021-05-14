<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaturacionOxigenosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saturacion_oxigenos', function (Blueprint $table) {
            $table->id();
            $table->time('hora')->nullable();
            $table->double('spo')->nullable();
            $table->double('prb')->nullable();

            $table->foreignId('categoria_enfermedad_id')->nullable()
            ->constrained('categoria_enfermedades')
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
        Schema::dropIfExists('saturacion_oxigenos');
    }
}
