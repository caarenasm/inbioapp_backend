<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            
            $table->string('titulo',45);
            $table->string('slug',45)->unique();
            $table->string('imagen_url',255)->nullable();
            $table->text('descripcion')->nullable();
            $table->date('fecha_evento')->nullable();
            $table->time('hora')->nullable();
           
            $table->foreignId('tipo_evento_id')
            ->constrained('tipo_eventos');

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
        Schema::dropIfExists('eventos');
    }
}
