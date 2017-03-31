<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('resume_uid')->unsigned();
            $table->string('name');
            $table->string('status');
            $table->string('gender');
            $table->date('dob');
            $table->string('birthPlace');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('profile');

            $table->foreign('resume_uid')->references('id')->on('resumes')->onDelete('cascade');
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
        Schema::dropIfExists('personal_infos');
    }
}
