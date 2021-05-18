<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlucosasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glucosas', function (Blueprint $table) {
            $table->id();
            $table->time('hora')->nullable();
            $table->double('mg_dl')->nullable()->default(0);
            
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
        Schema::dropIfExists('glucosas');
    }
}