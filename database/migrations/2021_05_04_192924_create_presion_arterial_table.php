<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresionArterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presion_arterial', function (Blueprint $table) {
            $table->id();
            $table->time('hora')->nullable()->nullable();
            $table->double('sys')->nullable()->default(0);
            $table->double('dia')->nullable()->default(0);
            $table->double('pul')->nullable()->default(0);

            $table->foreignId('categoria_enfermedad_id')->nullable()
            ->constrained('categoria_enfermedad')
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
        Schema::dropIfExists('presion_arterial');
    }
}
