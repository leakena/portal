<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=CategoryTableSeeder
     *
     * @return void
     */
    public function run()
    {
        $inputs = [
            [

                'name' => 'Mathematics',
                'description' => 'General tutorial on mathematic with corrected exercises',
                'created_at' => Carbon::now()
            ],
            [

                'name' => 'Physics',
                'description' => 'General tutorial on physic with corrected exercises',
                'created_at' => Carbon::now()
            ],
            [

                'name' => 'Chemistrys',
                'description' => 'General tutorial on chemis with corrected exercises',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Software Engineering',
                'description' => 'General tutorial on structuring with project example',
                'created_at' => Carbon::now()
            ],
            [

                'name' => 'Franch',
                'description' => 'General tutorial and grammar on franch with corrected exercises',
                'created_at' => Carbon::now()
            ]
        ];

        DB::table('categories')->insert($inputs);
    }
}
