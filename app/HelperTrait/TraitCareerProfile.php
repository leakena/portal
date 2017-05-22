<?php
/**
 * Created by PhpStorm.
 * User: vannat_gic
 * Date: 4/24/17
 * Time: 9:20 AM
 */

namespace App\HelperTrait;

use Illuminate\Support\Facades\DB;
use App\Models\Portal\Resume\Resume;


trait TraitCareerProfile
{

    public function storeCareerProfile($description, $resumeUid) {

        $userResume = $this->getUserResume(auth()->id());

        if ($userResume) {
            /*--update cv--*/

            $update = DB::table('resumes')->where('id', $resumeUid);

            if($update->update(['career_profile' => $description])) {

                $newCareerProfile = $update->first();
            } else {
                $newCareerProfile = null;
            }

            return view('backend.resumes.career_profile.career_profile', compact('newCareerProfile'));

        } else {
            /*--create cv---*/


            $newCareerProfile = new Resume();
            $newCareerProfile->career_profile = $description;
            $newCareerProfile->user_uid = auth()->id();

            if ($newCareerProfile->save()) {
                return view('backend.resumes.career_profile.career_profile', compact('newCareerProfile'));
            }
        }
    }

    public function getUserResume($userId)
    {
        return Resume::where('user_uid', $userId)->first();
    }

}