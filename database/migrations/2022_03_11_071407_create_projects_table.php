<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('avatar')->nullable();
            $table->string('cover')->nullable();
            $table->string('video')->nullable();

            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('province')->nullable();

            $table->string('quy_mo')->nullable();
            $table->text('design')->nullable();
            $table->text('sales_policy')->nullable();
            $table->text('list_video')->nullable();

            $table->string('lang')->nullable();
            $table->integer('parent_lang')->nullable();

            $table->tinyInteger('tien_phong')->default(0);
            $table->tinyInteger('tieu_bieu')->default(0);
            $table->tinyInteger('display_home')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('published')->default(0);
            $table->date('time_published')->nullable();

            $table->unsignedInteger('created_by');
            $table->unsignedInteger('manager_id');
            $table->unsignedInteger('status_project_id');
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
        Schema::dropIfExists('projects');
    }
}
