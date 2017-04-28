<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyPersonalInforsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personal_infos', function ($table){

            $table->dropColumn('gender');
            $table->renameColumn('birthPlace', 'birth_place');

            $table->integer('gender_id')->unsigned();

            $table->foreign('gender_id')
                ->references('id')
                ->on('genders')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
