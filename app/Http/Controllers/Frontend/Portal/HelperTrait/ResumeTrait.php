<?php

namespace App\Http\Controllers\Frontend\Portal\HelperTrait;


use App\Models\Portal\Resume\Degree;
use App\Models\Portal\Resume\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

/**
 * Class ResumeTrait
 * @package App\Http\Controllers\Frontend\Portal\HelperTrait
 */
trait ResumeTrait
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getExperience(Request $request)
    {
        $userResume = $this->getUserResume(auth()->id());
        if ($userResume) {
            $experiences = DB::table('experiences')->where('resume_uid', $userResume->id)->get();
        } else {
            $experiences = null;
        }
        return view('frontend.new_portals.resumes.experience.experience', compact('experiences', 'userResume'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSkill(Request $request)
    {
        $userResume = $this->getUserResume(auth()->id());
        if ($userResume) {
            $skills = DB::table('skills')->where('resume_uid', $userResume->id)->get();
        } else {
            $skills = null;
        }

        return view('frontend.new_portals.resumes.skill.skill', compact('skills', 'userResume'));

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEducation()
    {
        $userResume = $this->getUserResume(auth()->id());
        if ($userResume) {
            $educations = Education::where('resume_uid', $userResume->id)->get();
        } else {
            $educations = null;
        }

        $degrees = Degree::all();
        return view('frontend.new_portals.resumes.education.education', compact('educations', 'degrees', 'userResume'));
    }

    /**
     * Get all degrees.
     *
     * @return mixed
     */
    public function get_degree()
    {
        $degrees = Degree::all();
        return Response::json(['status' => true, 'degrees' => $degrees]);
    }

}