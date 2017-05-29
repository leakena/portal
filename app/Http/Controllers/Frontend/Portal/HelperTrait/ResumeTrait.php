<?php

namespace App\Http\Controllers\Frontend\Portal\HelperTrait;


use App\Models\Portal\Resume\Degree;
use App\Models\Portal\Resume\Education;
use App\Models\Portal\Resume\Language;
use App\Models\Portal\Resume\LanguageResume;
use App\Models\Portal\Resume\MaritalStatus;
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function get_reference()
    {
        $userResume = $this->getUserResume(auth()->id());

        if ($userResume) {
            $references = DB::table('references')->where('resume_uid', $userResume->id)->get();
        } else {
            $references = null;
        }

        return view('frontend.new_portals.resumes.reference.reference', compact('userResume', 'references'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function get_language()
    {
        $userResume = $this->getUserResume(auth()->id());
        $languages = Language::all();
        if ($userResume) {
//            $selectedLanguages = LanguageResume::where('resume_uid', $userResume->id)->get();
            $selectedLanguages = $userResume->languages()->select('language_resume.proficiency', 'language_resume.id as language_resume_id', 'languages.name', 'languages.id as language_id', 'language_resume.is_mother_tongue')
                ->orderBy('language_resume_id')
                ->get();
        } else {
            $selectedLanguages = null;
        }
//        dd($selectedLanguages);


        return view('frontend.new_portals.resumes.language.language', compact('userResume', 'languages', 'selectedLanguages'));
    }

    /**
     * @return array
     */
    public function remote_languages()
    {
        if (request('query_search') != null) {
            $languages = Language::where('name', 'like', '%' . request('query_search') . '%')->select('id', 'name as text')->get();
        } else {
            $languages = [];
        }

        return $languages;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function compare_language(Request $request)
    {
        $flag = true;
        $userResume = $this->getUserResume(auth()->id());
        $languages = LanguageResume::where('resume_uid', $userResume->id)->get();

        foreach ($languages as $language) {

            if ($language->language_id == request('language_id') || ($request->proficiency == 'Mother Tongue' && $language->proficiency == 'Mother Tongue')) {
                $flag = false;

                break;

            }
        }

        if ($flag) {

            $newLanguage = new LanguageResume();

            // Set value into each field
            $newLanguage->resume_uid = $userResume->id;
            $newLanguage->language_id = $request->language_id;
            $newLanguage->proficiency = $request->proficiency;
            if ($newLanguage->proficiency == 'Mother Tongue') {
                $newLanguage->is_mother_tongue = true;
            } else {
                $newLanguage->is_mother_tongue = false;
            }




            // Save new language
            $newLanguage->save();


            return Response::json([
                'status' => $flag,
                'language_resume_id' => $newLanguage->id,
                'language_id' => $newLanguage->language_id,
                'proficiency' => $newLanguage->proficiency
            ]);


        } else {

            return Response::json(['status' => $flag]);
        }
    }

    /**
     * @return array
     */
    public function edit_remote_languages()
    {
        $userResume = $this->getUserResume(auth()->id());
        $selectedLanguages = $userResume->languages()->select('languages.id as language_id')
            ->get()->toArray();
        $languages_id = [];
        foreach ($selectedLanguages as $selectedLanguage) {

            if ($selectedLanguage['language_id'] == request('old_id')) {
                //break;
            } else {
                array_push($languages_id, $selectedLanguage['language_id']);
            }


        }

        if (request('query_search') != null) {
            $languages = Language::whereNotIn('id', $languages_id)
                ->where('name', 'like', '%' . request('query_search') . '%')->select('id', 'name as text')->get();
        } else {
            $languages = [];
        }

        return $languages;

    }

    /**
     * Get circle languages.
     *
     * @return mixed
     */
    public function get_circle_language()
    {
        $userResume = $this->getUserResume(auth()->id());
        if ($userResume) {
            $selectedLanguages = $userResume->languages()->select('language_resume.proficiency', 'language_resume.id as language_resume_id', 'languages.name', 'languages.id as language_id', 'language_resume.is_mother_tongue')
                ->orderBy('language_resume_id')
                ->get();
        } else {
            $selectedLanguages = null;
        }
        return Response::json(['data' => $selectedLanguages], 200);
    }

    /**
     * @return mixed
     */
    public function find_mother_tongue()
    {
        $userResume = $this->getUserResume(auth()->id());
        $flag = false;
        if ($userResume) {
            $selectedLanguages = $userResume->languages()->select('language_resume.is_mother_tongue as is_mother_tongue')
                ->get();
            // dd($selectedLanguages);

            foreach ($selectedLanguages as $selectedLanguage) {
                //dd($selectedLanguage->is_mother_tongue);
                if ($selectedLanguage->is_mother_tongue == true) {
                    $flag = true;
                    return Response::json(['status' => $flag]);
                }
            }

            return Response::json(['status' => $flag]);

        }

    }

    public function get_marital_status(){
        $statues = MaritalStatus::all();
        return Response::json([
            'status' => true,
            'statues' => $statues
        ]);
    }

}