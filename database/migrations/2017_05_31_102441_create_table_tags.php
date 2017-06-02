<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();
        });


        Schema::create('category_tags', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('CASCADE');

            $table->integer('tag_id')->unsigned()->nullable();
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('CASCADE');

            $table->timestamps();

        });

        Schema::create('category_post_tags', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('category_tag_id')->unsigned()->nullable();
            $table->foreign('category_tag_id')
                ->references('id')
                ->on('category_tags')
                ->onDelete('CASCADE');

            $table->integer('post_id')->unsigned()->nullable();
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('CASCADE');


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
        Schema::dropIfExists('tags');
    }
}
