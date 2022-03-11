<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('avatar')->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();

            $table->tinyInteger('view')->default(0);
            $table->tinyInteger('noi_bat')->default(0);
            $table->tinyInteger('start')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('published')->default(0);
            $table->date('time_published')->nullable();

            $table->string('lang')->nullable();
            $table->integer('parent_lang')->nullable();

            $table->unsignedInteger('created_by');
            $table->unsignedInteger('category_id');
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
        Schema::dropIfExists('news');
    }
}
