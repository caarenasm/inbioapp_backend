<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnfermedadAlimentosTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enfermedad_alimentos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('alimento_id')
            ->constrained('alimentos')
            ->onDelete('cascade');

            $table->foreignId('enfermedad_id')
            ->constrained('enfermedades')
            ->onDelete('cascade');

            $table->boolean('recomendacion');

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
        Schema::dropIfExists('enfermedad_alimentos');
    }
}
