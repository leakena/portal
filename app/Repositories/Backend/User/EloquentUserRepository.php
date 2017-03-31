<?php

namespace App\Repositories\Backend\User;

use App\Models\History\History;
use App\Models\History\HistoryType;
use App\Exceptions\GeneralException;
use App\Models\Access\User\User;

/**
 * Class EloquentHistoryRepository.
 */
class EloquentUserRepository implements UserContract
{

    public function create($input) {

        $newUser = new User();
        $newUser->name = $input['name_latin'];
        $newUser->email = $input['id_card'];

//        $date = explode(" ",$input['dob']);
//        $dob = explode("-",$date[0]);
//        $password ='';
//        $password = $password.$dob[0].$dob[1].$dob[2];

        $newUser->password = bcrypt(123);
        if($newUser->save()) {
            return true;
        }
    }


    public function getAll() {

        return User::all();
    }

}
