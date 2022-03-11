<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('thumbnail')->nullable();

            $table->string('company')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();

            $table->string('meta_header')->unique();
            $table->string('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();

            $table->text('video_intro')->nullable();
            $table->string('facebook')->unique();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();

            $table->string('lang')->nullable();
            $table->integer('parent_lang')->nullable();

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
        Schema::dropIfExists('about_us');
    }
}
