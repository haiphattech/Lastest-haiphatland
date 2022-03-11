<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('avatar')->nullable();
            $table->text('description')->nullable();
            $table->integer('parent_id')->nullable();
            $table->tinyInteger('serial')->nullable();

            $table->string('lang')->nullable();
            $table->integer('parent_lang')->nullable();

            $table->enum('type', ['news', 'system', 'project', 'recruit', 'application', 'journal', 'open_letter', 'activities', 'introduces'])->default('news');
            $table->tinyInteger('status')->default(0);
            $table->unsignedInteger('created_by');
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
        Schema::dropIfExists('categories');
    }
}
