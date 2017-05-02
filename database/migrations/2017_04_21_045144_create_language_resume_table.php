<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguageResumeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('language_resume')){
            Schema::create('language_resume', function (Blueprint $table) {

                $table->increments('id');
                $table->integer('resume_uid')->unsigned();
                $table->integer('language_id')->unsigned();
                $table->string('proficiency');
                $table->boolean('is_mother_tongue');

                $table->foreign('resume_uid')
                    ->references('id')
                    ->on('resumes')
                    ->onDelete('CASCADE');

                $table->foreign('language_id')
                    ->references('id')
                    ->on('languages')
                    ->onDelete('CASCADE');
                $table->timestamps();
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_resume');
    }
}
