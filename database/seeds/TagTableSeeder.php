<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=TagTableSeeder
     * @return void
     */
    public function run()
    {

        $input = [
            [
                'name' => 'Equation',
                'description' => 'Equation lesson with exercises',
                'created_at' => Carbon::now()
            ],

            [

                'name' => 'logarithm',
                'description' => 'logarithm expression and equation lesson with exercises',
                'created_at' => Carbon::now()
            ],

            [
                'name' => 'sequeces',
                'description' => 'sequeces expression and equation lesson with exercises',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'exponentiel',
                'description' => 'exponentiel expression and equation lesson with exercises',
                'created_at' => Carbon::now()
            ],
        ];

       $insert =  DB::table('tags')->insert($input);

       if($insert) {
           $tags = DB::table('tags')->get();
           foreach($tags as  $tag) {
               $data = [
                   'category_id' => 1,
                   'tag_id' => $tag->id,
                   'created_at' => Carbon::now()
               ];
               DB::table('category_tags')->insert($data);
           }
       }
    }
}
