<?php

namespace App\Repositories\Backend\PersonalInfo;

use App\Models\History\History;
use App\Models\History\HistoryType;
use App\Exceptions\GeneralException;
use App\Models\Access\User\User;
use App\Models\Portal\Resume\PersonalInfo;
use App\Repositories\Backend\PersonalInfo\PersonalInfoContract;
use Carbon\Carbon;

/**
 * Class EloquentPersonalInfoRepository.
 */
class EloquentPersonalInfoRepository implements PersonalInfoContract
{

    public function create($input) {


        $personalInfo = new PersonalInfo();

        $personalInfo->name = $input['name'];
        $personalInfo->email = $input['email'];
        $personalInfo->status = $input['status'];
        $personalInfo->gender = $input['gender'];
        $personalInfo->resume_uid = $input['resume_uid'];
        $personalInfo->dob = $input['dob'];
        $personalInfo->birthPlace = $input['birth-place'];
        $personalInfo->phone=$input['phone'];
        $personalInfo->address=$input['address'];
        $personalInfo->profile = isset($input['profile'])?$input['profile']:null;
        $personalInfo->created_at = Carbon::now();

         if($personalInfo->save()) {
            return true;
        }
    }

    /*new--*/
    public function update($id, $input){

    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }


    public function getAll() {

        return User::all();
    }

}
