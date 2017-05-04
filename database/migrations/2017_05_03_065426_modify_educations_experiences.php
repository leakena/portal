<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyEducationsExperiences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('education', function ($table){
            $table->date('end_date')->nullable()->change();
            $table->boolean('is_present');
        });

        Schema::table('experiences', function ($table){
            $table->date('end_date')->nullable()->change();
            $table->boolean('is_present');
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
