<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersDatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_datos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('sexo_id')->default(0);
            $table->date('fecha_nacimiento');
            $table->string('nombre');
            $table->string('apellido');
            $table->double('estatura')->default(0);
            $table->double('peso_actual')->default(0); 
            $table->double('peso_deseado')->default(0);  
            $table->string('imc')->nullable();
            $table->string('pgc')->nullable();
            $table->string('tdee')->nullable();
            $table->string('objetivo')->nullable();
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
        Schema::dropIfExists('users_datos');
    }
}
