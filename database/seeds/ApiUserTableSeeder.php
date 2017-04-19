<?php

use Illuminate\Database\Seeder;
use App\Utils\Http\Facades\ApiRequestManager;
use Carbon\Carbon as Carbon;
use Illuminate\Support\Facades\DB;

class ApiUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=UserTableSeeder
     * @return void
     */

    protected $apiManager;
    public function __construct(ApiRequestManager $apiRequestManager)
    {

    }

    public function run()
    {
        /*$apiRequest = new ApiRequestManager();
        $prefix = '/api/student';

        $students = $apiRequest->getElementsFromApi($prefix.'/data', [], [], []);

        foreach($students as $student) {
            $explode = explode(' ', $student->dob);
            $dOfB = explode('-', $explode[0]);
            $dateOfBirth = $dOfB[0].$dOfB[1].$dOfB[2];//yyyymmd
            $input = [
                'name'              => $student->name_latin,
                'email'             => $student->id_card,
                'password'          => bcrypt(trim($dateOfBirth)),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ];

            DB::table('user')->insert($input);

        }*/

    }
}
