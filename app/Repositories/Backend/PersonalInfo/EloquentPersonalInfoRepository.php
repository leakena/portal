<?php

namespace App\Repositories\Backend\PersonalInfo;

use App\Exceptions\GeneralException;
use App\Models\Access\User\User;
use App\Models\Portal\Resume\PersonalInfo;
use App\Models\Portal\Resume\Resume;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

/**
 * Class EloquentPersonalInfoRepository.
 */
class EloquentPersonalInfoRepository implements PersonalInfoContract
{
    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function findOrThrowException($id)
    {
        if (!is_null(PersonalInfo::find($id))) {
            return PersonalInfo::find($id);
        }

        throw new GeneralException('Not Found');
    }

    /**
     * @param $input
     * @return bool
     */
    public function create($input)
    {
        $personalInfo = new PersonalInfo();

        $personalInfo->name = $input['name'];
        $personalInfo->email = $input['email'];
        $personalInfo->status_id = $input['status_id'];
        $personalInfo->gender_id = $input['gender_id'];
        if (!isset($input['resume_uid'])) {
            $resume = Resume::where('user_uid', auth()->user()->id)->first();
            $personalInfo->resume_uid = $resume->id;
        } else {
            $personalInfo->resume_uid = $input['resume_uid'];
        }
        $personalInfo->dob = $input['dob'];
        $personalInfo->birth_place = $input['birth_place'];
        $personalInfo->phone = $input['phone'];
        $personalInfo->address = $input['address'];
        $personalInfo->profile = isset($input['profile']) ? $input['profile'] : null;
        $personalInfo->created_at = Carbon::now();

        if (Input::file()) {

            $filename = $input['profile'];
            $change = $filename->getClientOriginalExtension();
            $newfilename = auth()->id() . Carbon::now()->getTimestamp() . '.';
            $filename->move('img/frontend/uploads/profile_cv', "{$newfilename}" . $change);
            $personalInfo->profile = $newfilename . $change;
        }

        if ($personalInfo->save()) {
            return true;
        }
    }

    /*new-- how to solve --------this */
    /**
     * @TODO how to slove this.
     * @param $id
     * @param $input
     * @return mixed|void
     */
    public function update($id, $input)
    {
        $personalInfo = $this->findOrThrowException($id);

        $personalInfo->name = $input['name'];
        $personalInfo->email = $input['email'];
        $personalInfo->status_id = $input['status_id'];
        $personalInfo->gender_id = $input['gender_id'];
        $personalInfo->resume_uid = $input['resume_uid'];
        $personalInfo->dob = $input['dob'];
        $personalInfo->birth_place = $input['birth_place'];
        $personalInfo->phone = $input['phone'];
        $personalInfo->address = $input['address'];
        $personalInfo->updated_at = Carbon::now();

        if (isset($input['profile'])) {
            if ($personalInfo->profile) {
                $old_profile = $personalInfo->profile;
                if (unlink('img/frontend/uploads/profile_cv/' . $old_profile)) {
                    if (Input::file()) {
                        $filename = $input['profile'];
                        $change = $filename->getClientOriginalExtension();
                        $newfilename = auth()->id() . Carbon::now()->getTimestamp() . '.';
                        $filename->move('img/frontend/uploads/profile_cv', "{$newfilename}" . $change);
                        $personalInfo->profile = $newfilename . $change;
                    }
                }

            } else {
                if (Input::file()) {
                    $filename = $input['profile'];
                    $change = $filename->getClientOriginalExtension();
                    $newfilename = auth()->id() . Carbon::now()->getTimestamp() . '.';
                    $filename->move('img/frontend/uploads/profile_cv', "{$newfilename}" . $change);
                    $personalInfo->profile = $newfilename . $change;
                }
            }
        }

        if ($personalInfo->save()) {
            return true;
        }
    }

    /**
     * @param $id
     * @return mixed|void
     */
    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {

        return User::all();
    }

}
