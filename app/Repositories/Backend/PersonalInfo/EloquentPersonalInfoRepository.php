<?php

namespace App\Repositories\Backend\PersonalInfo;

use App\Exceptions\GeneralException;
use App\Models\Access\User\User;
use App\Models\Portal\Resume\PersonalInfo;
use App\Models\Portal\Resume\Resume;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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

        $personalInfo->name = isset($input['name'])?$input['name']:null;
        $personalInfo->email = isset($input['email'])?$input['email']:null;
        $personalInfo->status_id = $input['status_id'];
        if (!isset($input['resume_uid'])) {
            $resume = Resume::where('user_uid', auth()->user()->id)->first();
            $personalInfo->resume_uid = $resume->id;
        } else {
            $personalInfo->resume_uid = $input['resume_uid'];
        }
        $personalInfo->dob = isset($input['dob'])?$input['dob']:null;
        $personalInfo->birth_place = isset($input['birth_place'])?$input['birth_place']:null;
        $personalInfo->phone = isset($input['phone'])?$input['phone']:null;
        $personalInfo->address = isset($input['address'])?$input['address']:null;
        $personalInfo->profile = isset($input['profile']) ? $input['profile'] : null;
        $personalInfo->created_at = Carbon::now();

        if (Input::file()) {

            $image = $input['profile'];

            $newfilename = auth()->id() . Carbon::now()->getTimestamp();
            $filename  = $newfilename . '.' . $image->getClientOriginalExtension();
            $path = public_path('img/backend/resume/profile/' . $filename);
            Image::make($image->getRealPath())->resize(150, 200)->save($path);

            $personalInfo->profile = $filename;





//            $filename = $input['profile'];
//            $change = $filename->getClientOriginalExtension();
//            $newfilename = auth()->id() . Carbon::now()->getTimestamp() . '.';
//            $filename->move('img/frontend/uploads/profile_cv', "{$newfilename}" . $change);
//            $personalInfo->profile = $newfilename . $change;
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

        $personalInfo->name = isset($input['name'])?$input['name']:null;
        $personalInfo->email = isset($input['email'])?$input['email']:null;
        $personalInfo->status_id = isset($input['status_id'])?$input['status_id']:null;
        $personalInfo->resume_uid = $input['resume_uid'];
        $personalInfo->dob = isset($input['dob'])?$input['dob']:null;
        $personalInfo->birth_place = isset($input['birth_place'])?$input['birth_place']:null;
        $personalInfo->phone = isset($input['phone'])?$input['phone']:null;
        $personalInfo->address = isset($input['address'])?$input['address']:null;
        $personalInfo->updated_at = Carbon::now();

        if (isset($input['profile'])) {
            if ($personalInfo->profile) {
                $old_profile = $personalInfo->profile;
                if(file_exists('img/frontend/uploads/profile_cv/' . $old_profile)) {
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
                        $image = $input['profile'];
                        $newfilename = auth()->id() . Carbon::now()->getTimestamp();
                        $filename  = $newfilename . '.' . $image->getClientOriginalExtension();
                        $path = public_path('img/backend/resume/profile/' . $filename);
                        Image::make($image->getRealPath())->resize(150, 200)->save($path);
                        $personalInfo->profile = $filename;
                    }
                }

            } else {
                if (Input::file()) {
                    $image = $input['profile'];
                    $newfilename = auth()->id() . Carbon::now()->getTimestamp();
                    $filename  = $newfilename . '.' . $image->getClientOriginalExtension();
                    $path = public_path('img/backend/resume/profile/' . $filename);
                    Image::make($image->getRealPath())->resize(150, 200)->save($path);
                    $personalInfo->profile = $filename;
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
