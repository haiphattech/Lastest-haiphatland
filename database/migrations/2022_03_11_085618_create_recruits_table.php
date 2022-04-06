<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruits', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('location');
            $table->text('content');
            $table->text('file')->nullable();
            $table->date('date_end')->nullable();
            $table->date('time_published')->nullable();
            $table->tinyInteger('published')->default(0);

            $table->tinyInteger('status')->default(0);

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
        Schema::dropIfExists('recruits');
    }
}
