<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class UserTableSeeder.
 * php artisan db:seed --class=ModifyUserTableSeeder
 */
class ModifyUserTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
//        $this->disableForeignKeys();
//        $this->truncate(config('access.users_table'));

        //Add the master administrator, user id of 1


        DB::table('users')
            /*->update(['confirmation_code' => md5(uniqid(mt_rand(), true))]);*/
        ->update(['password' => bcrypt('123')]);

//        $this->enableForeignKeys();
    }
}
