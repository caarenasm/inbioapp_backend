<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSleepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sleep', function (Blueprint $table) {
            $table->id();
            $table->string('como_dormiste',100)->nullable();
            $table->time('h_acostarse')->nullable();
            $table->time('h_levantarse')->nullable();
            $table->time('h_dormidas')->nullable();

            $table->foreignId('diario_id')->nullable()
            ->constrained('diario')
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
        Schema::dropIfExists('sleep');
    }
}
