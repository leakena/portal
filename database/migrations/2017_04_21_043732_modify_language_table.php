<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('languages', function ($table) {

            $table->dropColumn('proficiency');
            $table->dropColumn('is_mother_tongue');
            $table->dropForeign('languages_resume_uid_foreign');
            $table->dropColumn('resume_uid');

            $table->string('code');


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
