<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('education', function ($table){


            $table->date('start_date')->change();
            $table->date('end_date')->change();

            if(Schema::hasColumn('degree_id', 'address')) {

                $table->string('address');
                $table->integer('degree_id')->unsigned();
                $table->foreign('degree_id')
                    ->references('id')
                    ->on('degrees');
            }

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
