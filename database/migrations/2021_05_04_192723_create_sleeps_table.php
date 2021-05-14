<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSleepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sleeps', function (Blueprint $table) {
            $table->id();
            $table->string('como_dormiste',100)->nullable();
            $table->time('hora_acostarse')->nullable();
            $table->time('hora_levantarse')->nullable();
            $table->time('hora_dormidas')->nullable();

            $table->foreignId('diario_id')->nullable()
            ->constrained('diarios')
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
        Schema::dropIfExists('sleeps');
    }
}
