<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('slug', 100)->unique();
            $table->string('seo_title', 100)->nullable();
            $table->text('seo_description')->nullable();
            $table->text('description')->nullable();
            $table->double('price', 10, 2)->nullable()->default(0);
            $table->double('weight', 10, 2)->nullable()->default(0);
            $table->boolean('published')->default(0);
            $table->string('imagenes', 100);
            $table->integer('resolucion');

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
        Schema::dropIfExists('productos');
    }
}
