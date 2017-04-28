<?php

use Illuminate\Database\Seeder;
use App\Utils\Http\Facades\ApiRequestManager;
use Carbon\Carbon as Carbon;
use Illuminate\Support\Facades\DB;

class ApiUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=ApiUserTableSeeder
     * @return void
     */

    protected $apiManager;
    protected $prefix;
    public function __construct(ApiRequestManager $apiRequestManager)
    {

        $this->apiManager = $apiRequestManager;
        $this->prefix = '/api/student';

    }

    public function run()
    {

        $students = $this->apiManager->getElementsFromApi($this->prefix.'/data', [], [], []);
        $users=[];

        $index = 1;
        for($x = 0; $x<1000; $x++) {
            $explode = explode(' ', $students[$x]['dob']);
            $dOfB = explode('-', $explode[0]);
            $dateOfBirth = $dOfB[0].$dOfB[1].$dOfB[2];//yyyymmd

            $input = [
                'name'              => $students[$x]['name_latin'],
                'email'             => $students[$x]['id_card'],
                'password'          => bcrypt(trim($dateOfBirth)),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ];


            $users[] = $input;

            $users;
        }

        DB::table(config('access.users_table'))->insert($users);

    }
}
