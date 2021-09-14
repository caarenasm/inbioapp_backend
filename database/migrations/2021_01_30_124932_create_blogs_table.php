<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 45);
            $table->string('slug', 45)->unique();
            $table->string('seo_title', 45)->nullable();
            $table->string('seo_description', 200)->nullable();
            $table->string('image_url', 100)->nullable();
            $table->text('content')->nullable();
            $table->date('start_date')->default(now());
            $table->date('end_date')->nullable()->default(null);
            $table->boolean('published')->default(0);
            $table->integer('resolucion');

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->onDelete('set null');

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
        Schema::dropIfExists('blogs');
    }
}
