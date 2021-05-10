<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeposicionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposicion', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_depos',100)->nullable();
            $table->string('color',50)->nullable();
            $table->integer('cantidad_dep')->nullable()->default(0);
            
            $table->foreignId('medicamento_id')->nullable()
            ->constrained('medicamento')
            ->onDelete('cascade');

            $table->foreignId('bioproducto_a_id')->nullable()
            ->constrained('bioproducto_asignado')
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
        Schema::dropIfExists('deposicion');
    }
}
