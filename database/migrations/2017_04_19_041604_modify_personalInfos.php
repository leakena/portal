<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyPersonalInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personal_infos', function ($table){

            if(Schema::hasColumn('birthPlace', 'gender')) {

                $table->dropColumn('gender');

                $table->renameColumn('birthPlace', 'birth_place');
                $table->integer('gender_id')->unsigned();
                $table->foreign('gender_id')
                    ->references('id')
                    ->on('genders');
            }
            $table->string('profile')->nullable()->change();

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
