<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntroduceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('introduce_details', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('avatar');
            $table->string('description');

            $table->string('lang')->nullable();
            $table->integer('parent_lang')->nullable();

            $table->unsignedInteger('created_by');
            $table->unsignedInteger('introduce_id');
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
        Schema::dropIfExists('introduce_details');
    }
}
