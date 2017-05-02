<?php

namespace App\Http\Controllers\Frontend\Portal;

use App\Http\Controllers\Controller;
use App\Models\Portal\Resume\Gender;
use App\Models\Portal\Resume\LanguageResume;
use App\Models\Portal\Resume\Contact;
use App\Models\Portal\Resume\Degree;
use App\Models\Portal\Resume\Education;
use App\Models\Portal\Resume\Experience;
use App\Models\Portal\Resume\Interest;
use App\Models\Portal\Resume\Language;
use App\Models\Portal\Resume\MaritalStatus;
use App\Models\Portal\Resume\Project;
use App\Models\Portal\Resume\Reference;
use App\Models\Portal\Resume\Resume;
use App\Models\Portal\Resume\Skill;
use App\Repositories\Backend\PersonalInfo\PersonalInfoContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;

class ResumeController extends Controller
{
    /**
     * ResumeController constructor.
     */
    protected $personalInfos;
    protected $prefix;
    protected $controllers;

    /**
     * ResumeController constructor.
     * @param PersonalInfoContract $personalIfoRepo
     */
    public function __construct(PersonalInfoContract $personalIfoRepo, Controller $cont)
    {
        $this->controllers = $cont;
        $this->prefix = '/api/student';
        $this->personalInfos = $personalIfoRepo;
//        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

//        $studnentData = $this->controllers->getElementByApi($this->prefix.'/program', ['student_id_card'], ['e20120175'] ,[]);
//
//        dd($studnentData);


        $resume = Resume::where(['user_uid' => auth()->id()])->first();
        return view('backend.resumes.index', compact('resume'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userInfo()
    {

        $userResume = Resume::where('user_uid', auth()->id())->first();
        $marital_statuses = MaritalStatus::all();
        $genders = Gender::all();

        if ($userResume) {
            $personalInfo = DB::table('personal_infos')->where('resume_uid', $userResume->id)->first();
        } else {
            $personalInfo = null;
        }
        return view('backend.resumes.userInfo.userInfo', compact('userResume', 'personalInfo', 'marital_statuses', 'genders'));
    }

    /**
     * Find.......
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeUserInfo(Request $request)
    {
        if (isset($request->resume_uid)) {
            /*--there is a resume id so we need to create user information --*/

            $resume = Resume::where('id', $request->resume_uid)->first();

            /*---check if personal-info hase already created ---*/
            if (count($resume->personalInfo)) {
                /*--update personal info --*/
                $update = $this->personalInfos->update($resume->personalInfo->id, $request->all());

                if ($update) {
                    return redirect()->back()->with(['status' => 'Information Updated!']);
                }
            } else {
                /*---create personal-info--*/

                $create = $this->personalInfos->create($request->all());
                if ($create) {
                    return redirect()->back()->with(['status' => 'Information Created!']);
                }
            }

        }
        else {
            /*--if the request has no resume id then we have to create Resume first */
            $resume = new Resume();
            $resume->career_profile = null;
            $resume->user_uid = auth()->id();

            if ($resume->save()) {
                /*---create personal information ---*/
                $create = $this->personalInfos->create($request->all());
                if ($create) {
                    return redirect()->back()->with(['status' => 'Information Created!']);
                }

            }

        }
    }


    /**
     * @param Resume $resume
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update_career_profile(Resume $resume)
    {
        $resume->career_profile = request('career_profile');
        $resume->save();
        return redirect('/');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function saveCareerProfile(Request $request)
    {


        $userResume = $this->getUserResume(auth()->id());


        if ($userResume) {
            /*--update cv--*/

            DB::table('resumes')->where('id', request('resume_uid'))->update(['career_profile' => request('description')]);
            $newCareerProfile = DB::table('resumes')->where('id', request('resume_uid'))->first();

            return view('backend.resumes.career_profile.career_profile', compact('newCareerProfile'));

        } else {
            /*--create cv---*/

            $newCareerProfile = new Resume();
            $newCareerProfile->career_profile = $request->description;
            $newCareerProfile->user_uid = auth()->id();

            if ($newCareerProfile->save()) {
                return view('backend.resumes.career_profile.career_profile', compact('newCareerProfile'));
            }

        }

    }

    /**
     * @param $userId
     * @return mixed
     */
    private function getUserResume($userId)
    {
        return Resume::where('user_uid', $userId)->first();
    }

    /**
     * @return mixed
     */
    public function getCareerProfile()
    {
        $newCareerProfile = Resume::where('user_uid', auth()->user()->id)->first();

        return view('backend.resumes.career_profile.career_profile', compact('newCareerProfile'));


    }

    /**
     * @return mixed
     */
    public function editCareerProfile()
    {
        $resume = DB::table('resumes')->where([
            ['id', '=', request('resume_uid')]
        ])->get()->toArray();

        return Response::json(['data' => $resume, 'status' => true]);
    }


    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function go_back()
    {
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function experienceContent(Request $request)
    {
        $experiences = DB::table('experiences')->where('resume_uid', $request->resume_id)->get()->toArray();
        return Response::json([
            'data' => $experiences,
            'status' => true
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function experience()
    {
        $userResume = $this->getUserResume(auth()->id());
        if ($userResume) {
            $experiences = DB::table('experiences')->where('resume_uid', $userResume->id)->get();
        } else {
            $experiences = null;
        }

        return view('backend.resumes.experience.experiences', compact('userResume', 'experiences'));
    }

    /**
     * @return mixed
     */
    public function saveExperience(Request $request)
    {

        if (isset($request->resume_uid)){

            $userResume = $this->getUserResume(auth()->id());

            /*-- This user already has a resume id so can create or update experience--*/

            if (isset($request->experience_id)) {

                /*--update experience--*/

                DB::table('experiences')
                    ->where([
                        ['id', '=', request('experience_id')],
                        ['resume_uid', '=', $userResume->id]
                    ])
                    ->update([
                        'position' => request('position'),
                        'company' => request('company'),
                        'description' => request('description'),
                        'address' => request('address'),
                        'start_date' => request('start_date'),
                        'end_date' => request('end_date')
                    ]);
                return redirect()->route('frontend.resume.get_experience');
            } else {

                /*--create experience--*/

                $newExperience = new Experience();
                $newExperience->resume_uid = $userResume->id;
                $newExperience->position = $request->position;
                $newExperience->company = $request->company;
                $newExperience->description = $request->description;
                $newExperience->address = $request->address;
                $newExperience->start_date = $request->start_date;
                $newExperience->end_date = $request->end_date;

                $newExperience->save();
                return redirect()->route('frontend.resume.get_experience');
            }

        }else{

            /*-- This user has no resume id so need to create resume first--*/
            $resume = new Resume();
            $resume->career_profile = null;
            $resume->user_uid = auth()->id();
            if ($resume->save()) {
                /*--- create experience ---*/

                $newExperience = new Experience();
                $newExperience->resume_uid = $resume->id;
                $newExperience->position = $request->position;
                $newExperience->company = $request->company;
                $newExperience->description = $request->description;
                $newExperience->address = $request->address;
                $newExperience->start_date = $request->start_date;
                $newExperience->end_date = $request->end_date;

                $newExperience->save();
                return redirect()->route('frontend.resume.get_experience');

            }
        }


    }

    /**
     * @return mixed
     */
    public function editExperience()
    {

        $experience = DB::table('experiences')->where([
            ['id', '=', request('experience_uid')],
            ['resume_uid', '=', request('resume_uid')]
        ])->get()->toArray();

        return Response::json([
            'data' => $experience,
            'status' => true
        ]);
    }

    /**
     * @return mixed
     */
    public function updateExperience()
    {

        DB::table('experiences')
            ->where([
                ['id', '=', request('experience_uid')],
                ['resume_uid', '=', request('resume_uid')]
            ])
            ->update([
                'position' => request('edit_position'),
                'company' => request('edit_company'),
                'description' => request('edit_description'),
                'start_date' => request('edit_start_date'),
                'end_date' => request('edit_end_date')
            ]);
        return Response::json([
            'status' => true
        ]);
    }

    /**
     * @return mixed
     */
    public function removeExperience($expId)
    {

        $experience = Experience::where('id', $expId)->delete();

        if ($experience) {
            return Response::json(['status' => true, 'message' => 'Deleted!']);
        } else {
            return Response::json(['status' => false, 'message' => 'Not Deleted!']);
        }
    }

    /**
     * @return mixed
     */
    public function saveProject()
    {
        // Create a new project
        $newProject = new Project();
        // Set value into each field
        $newProject->resume_uid = request('resume_uid');
        $newProject->name = request('name');
        $newProject->description = request('description');
        // Save new project
        $newProject->save();
        // Response back as json format
        return Response::json(['status' => true]);
    }

    /**
     * @return mixed
     */
    public function projectContent()
    {
        $projects = DB::table('projects')->where(['resume_uid' => request('resume_uid')])->get()->toArray();
        return Response::json([
            'data' => $projects,
            'status' => true
        ]);
    }

    /**
     * @return mixed
     */
    public function editProject()
    {
        $project = DB::table('projects')
            ->where([
                ['id', '=', request('project_uid')],
                ['resume_uid', '=', request('resume_uid')]
            ])
            ->get()->toArray();

        return Response::json([
            'data' => $project,
            'status' => true
        ]);
    }

    /**
     * @return mixed
     */
    public function updateProject()
    {
        DB::table('projects')
            ->where([
                ['id', '=', request('project_uid')],
                ['resume_uid', '=', request('resume_uid')]
            ])
            ->update([
                'name' => request('project_name'),
                'description' => request('project_desc')
            ]);
        return Response::json(['status' => true]);
    }

    /**
     * @return mixed
     */
    public function deleteProject()
    {
        DB::table('projects')
            ->where([
                ['id', '=', request('project_uid')],
                ['resume_uid', '=', request('resume_uid')]
            ])->delete();

        return Response::json(['status' => true]);
    }

    /**
     * @return mixed
     */
    public function saveSkill(Request $request)
    {
        if (isset($request->resume_uid)){

            $userResume = $this->getUserResume(auth()->id());

            /*-- This user already has a resume id so can create or update skill--*/

            if($request->skill_id){
                /*--Update Skill--*/
                DB::table('skills')
                    ->where([
                        ['id', '=', request('skill_id')],
                        ['resume_uid', '=', $userResume->id]
                    ])
                    ->update([
                        'name' => request('name'),
                        'description' => request('description')
                    ]);
                return redirect()->route('frontend.resume.get_skill');
            }else{

                // Create a new skill
                $newSkill = new Skill();
                // Set value into each field
                $newSkill->resume_uid = $userResume->id;
                $newSkill->name = request('name');
                $newSkill->description = request('description');
                // Save new skill
                if($newSkill->save()){
                    return redirect()->route('frontend.resume.get_skill');
                }
            }

        }else{

            /*-- This user has no resume id so need to create resume first--*/
            $resume = new Resume();
            $resume->career_profile = null;
            $resume->user_uid = auth()->id();
            if ($resume->save()) {
                /*--- create experience ---*/

                $newSkill = new Skill();
                // Set value into each field
                $newSkill->resume_uid = $resume->id;
                $newSkill->name = request('name');
                $newSkill->description = request('description');
                // Save new skill
                if($newSkill->save()){
                    return redirect()->route('frontend.resume.get_skill');
                }

            }
        }


    }

    /**
     * @return mixed
     */
    public function skillContent()
    {
        $skills = DB::table('skills')->where(['resume_uid' => request('resume_uid')])->get()->toArray();
        return Response::json([
            'data' => $skills,
            'status' => true
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function skill()
    {
        $userResume = $this->getUserResume(auth()->id());
        if ($userResume) {
            $skills = Skill::where('resume_uid', $userResume->id)->get();
        } else {
            $skills = null;
        }

        return view('backend.resumes.skill.skill', compact('userResume', 'skills'));
    }

    /**
     * @return mixed
     */
    public function editSkill()
    {
        $skill = DB::table('skills')
            ->where([
                ['id', '=', request('project_uid')],
                ['resume_uid', '=', request('resume_uid')]
            ])
            ->get()->toArray();

        return Response::json([
            'data' => $skill,
            'status' => true
        ]);
    }

    /**
     * @return mixed
     */
    public function updateSkill()
    {
        DB::table('skills')
            ->where([
                ['id', '=', request('skill_uid')],
                ['resume_uid', '=', request('resume_uid')]
            ])
            ->update([
                'name' => request('name_skill')
            ]);
        return Response::json(['status' => true]);
    }

    /**
     * @return mixed
     */
    public function deleteSkill($skillId)
    {
        $skill = Skill::where('id', $skillId)->delete();

        if ($skill) {
            return Response::json(['status' => true, 'message' => 'Deleted!']);
        } else {
            return Response::json(['status' => false, 'message' => 'Not Deleted!']);
        }
    }

    /**
     * @return mixed
     */
    public function saveContact()
    {
        // Create a new contact
        $newContact = new Contact();
        // Set value into each field
        $newContact->resume_uid = request('resume_uid');
        $newContact->icon = request('name');
        $newContact->description = request('desc');
        // Save the contact
        $newContact->save();
        // Response back as json format
        return Response::json(['status' => true]);
    }

    /**
     * @return mixed
     */
    public function contactContent()
    {
        $contacts = DB::table('contacts')->where(['resume_uid' => request('resume_uid')])->get()->toArray();
        return Response::json([
            'data' => $contacts,
            'status' => true
        ]);
    }

    /**
     * @return mixed
     */
    public function editContact()
    {
        $contact = DB::table('contacts')
            ->where([
                ['id', '=', request('project_uid')],
                ['resume_uid', '=', request('resume_uid')]
            ])
            ->get()->toArray();

        return Response::json([
            'data' => $contact,
            'status' => true
        ]);
    }

    /**
     * @return mixed
     */
    public function updateContact()
    {
        DB::table('contacts')
            ->where([
                ['id', '=', request('skill_uid')],
                ['resume_uid', '=', request('resume_uid')]
            ])
            ->update([
                'icon' => request('icon'),
                'description' => request('desc')
            ]);
        return Response::json(['status' => true]);
    }

    /**
     * @return mixed
     */
    public function deleteContact()
    {
        DB::table('contacts')
            ->where([
                ['id', '=', request('skill_uid')],
                ['resume_uid', '=', request('resume_uid')]
            ])->delete();

        return Response::json(['status' => true]);
    }

    /**
     * @return mixed
     */
    public function saveEducation(Request $request)
    {

        if (isset($request->resume_uid)){

            $userResume = $this->getUserResume(auth()->id());

            /*-- This user already has a resume id so can create or update education--*/

            if (isset($request->education_id)) {

                /*-- Update Education --*/

                DB::table('education')
                    ->where([
                        ['id', '=', request('education_id')],
                        ['resume_uid', '=', $userResume->id]
                    ])
                    ->update([
                        'major' => $request->major,
                        'school' => $request->school,
                        'degree_id' => $request->degree,
                        'address' => $request->address,
                        'start_date' => $request->start_date,
                        'end_date' => $request->end_date
                    ]);
                return redirect()->route('frontend.resume.get_education');
            } else {

                /*-- Create a new education---*/

                $newEducation = new Education();

                // Set value into each field
                $newEducation->resume_uid = $userResume->id;
                $newEducation->major = $request->major;
                $newEducation->school = $request->school;
                $newEducation->degree_id = $request->degree;
                $newEducation->address = $request->address;
                $newEducation->start_date = $request->start_date;
                $newEducation->end_date = $request->end_date;
                // Save new education
                if($newEducation->save()){

                    return redirect()->route('frontend.resume.get_education');
                }


            }

        }else{

            /*-- This user has no resume id so need to create resume first--*/
            $resume = new Resume();
            $resume->career_profile = null;
            $resume->user_uid = auth()->id();
            if ($resume->save()) {
                /*--- create experience ---*/
                $newEducation = new Education();
                $newEducation->resume_uid = $resume->id;
                $newEducation->major = $request->major;
                $newEducation->school = $request->school;
                $newEducation->degree_id = $request->degree;
                $newEducation->address = $request->address;
                $newEducation->start_date = $request->start_date;
                $newEducation->end_date = $request->end_date;
                // Save new education
                if($newEducation->save()){

                    return redirect()->route('frontend.resume.get_education');
                }

            }
        }

    }

    /**
     * @return mixed
     */
    public function educationContent()
    {
        $educations = DB::table('education')->where(['resume_uid' => request('resume_uid')])->get()->toArray();
        return Response::json([
            'data' => $educations,
            'status' => true
        ]);
    }

    public function education()
    {
        $userResume = $this->getUserResume(auth()->id());
        if ($userResume) {
            $educations = Education::where('resume_uid', $userResume->id)->get();
        } else {
            $educations = null;
        }

        $degrees = Degree::all();
        return view('backend.resumes.education.education', compact('educations', 'degrees', 'userResume'));
    }


    /**
     * @return mixed
     */
    public function deleteEducation($eduId)
    {
        $education = Education::where('id', $eduId)->delete();

        if ($education) {
            return Response::json(['status' => true, 'message' => 'Deleted!']);
        } else {
            return Response::json(['status' => false, 'message' => 'Not Deleted!']);
        }
    }

    /**
     * @return mixed
     */
    public function editEducation()
    {
        $education = DB::table('education')
            ->where([
                ['id', '=', request('education_uid')],
                ['resume_uid', '=', request('resume_uid')]
            ])
            ->get()->toArray();

        return Response::json([
            'data' => $education,
            'status' => true
        ]);
    }

    /**
     * @return mixed
     */
    public function updateEducation()
    {
        DB::table('education')
            ->where([
                ['id', '=', request('education_uid')],
                ['resume_uid', '=', request('resume_uid')]
            ])
            ->update([
                'major' => request('major'),
                'school' => request('school'),
                'start_date' => request('start_date'),
                'end_date' => request('end_date')
            ]);
        return Response::json(['status' => true]);
    }

    /**
     * @return mixed
     */
    public function saveLanguage(Request $request)
    {

        if (isset($request->resume_uid)){

            $userResume = $this->getUserResume(auth()->id());

            /*-- This user already has a resume id so can create or update language--*/

            if(isset($request->language_resume_id)){
                /*-- Update language --*/

                DB::table('language_resume')
                    ->where([
                        ['id', '=', $request->id],
                        ['resume_uid', '=', $userResume->id]
                    ])
                    ->update([
                        'language_id' => $request->language_id,
                        'proficiency' => $request->proficiency
                    ]);


                return redirect()->route('frontend.resume.get_language');

            }else{

                // Create a new language
                $newLanguage = new LanguageResume();
                // Set value into each field

                $newLanguage->resume_uid = $userResume->id;
                $newLanguage->language_id = $request->language_id;
                $newLanguage->proficiency = $request->proficiency;
                if($newLanguage->proficiency == 'Mother Tongue'){
                    $newLanguage->is_mother_tongue = true;
                }else{
                    $newLanguage->is_mother_tongue = false;
                }

                // Save new language
                if($newLanguage->save()){
                    return redirect()->route('frontend.resume.get_language');
                }
            }

        }else{

            /*-- This user has no resume id so need to create resume first--*/
            $resume = new Resume();
            $resume->career_profile = null;
            $resume->user_uid = auth()->id();
            if ($resume->save()) {
                /*--- create language ---*/
                $newLanguage = new LanguageResume();

                // Set value into each field
                $newLanguage->resume_uid = $resume->id;
                $newLanguage->language_id = $request->language_id;
                if($newLanguage->proficiency = $request->proficiency == null){
                    $newLanguage->proficiency = 'Mother tongue';
                    $newLanguage->is_mother_tongue = true;
                }else{
                    $newLanguage->proficiency = $request->proficiency;
                    $newLanguage->is_mother_tongue = false;
                }

                // Save new language
                if($newLanguage->save()){
                    return redirect()->route('frontend.resume.get_language');
                }

            }
        }

    }

    /**
     * @return mixed
     */
    public function languageContent(Request $request)
    {
        $userResume = $this->getUserResume(auth()->id());
        $selectedLanguages = $userResume->languages()->select('languages.id as language_id')
            ->get();
        $flag = true;
        foreach ($selectedLanguages as $language){
            if($language->language_id == $request->selectLanguage){
                $flag = true;
                break;
            }else{
                $flag = false;
            }
        }

        return Response::json(['status' => $flag]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function language()
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



        return view('backend.resumes.language.languages', compact('userResume', 'languages', 'selectedLanguages'));
    }

    /**
     * @return mixed
     */
    public function deleteLanguage($lanId)
    {
        $language = LanguageResume::where('id', $lanId)->delete();

        if ($language) {
            return Response::json(['status' => true, 'message' => 'Deleted!']);
        } else {
            return Response::json(['status' => false, 'message' => 'Not Deleted!']);
        }
    }

    /**
     * @return mixed
     */
    public function editLanguage()
    {
        $language = DB::table('languages')
            ->where([
                ['id', '=', request('language_uid')],
                ['resume_uid', '=', request('resume_uid')]
            ])
            ->get()->toArray();

        return Response::json([
            'data' => $language,
            'status' => true
        ]);
    }

    /**
     * @return mixed
     */
    public function updateLanguage()
    {
        DB::table('languages')
            ->where([
                ['id', '=', request('language_uid')],
                ['resume_uid', '=', request('resume_uid')]
            ])
            ->update([
                'name' => request('name'),
                'degree' => request('degree')
            ]);
        return Response::json(['status' => true]);
    }

    /**
     * @return mixed
     */
    public function saveInterest(Request $request)
    {

        if (isset($request->resume_uid)){

            $userResume = $this->getUserResume(auth()->id());

            /*-- This user already has a resume id so can create or update interest--*/

            if(isset($request->interest_id)){

                /*-- Update Interest --*/

                DB::table('interests')
                    ->where([
                        ['id', '=', request('interest_id')],
                        ['resume_uid', '=', $userResume->id]
                    ])
                    ->update([
                        'name' => request('name'),
                        'description' => request('description')
                    ]);
                return redirect()->route('frontend.resume.get_interest');
            }else{

                // Create a new interest
                $newInterest = new Interest();
                // Set value into each field
                $newInterest->resume_uid = $userResume->id;
                $newInterest->name = $request->name;
                $newInterest->description = $request->description;
                // Save new education
                if($newInterest->save()){
                    return redirect()->route('frontend.resume.get_interest');
                }
            }

        }else{

            /*-- This user has no resume id so need to create resume first--*/
            $resume = new Resume();
            $resume->career_profile = null;
            $resume->user_uid = auth()->id();
            if ($resume->save()) {
                // Create a new interest
                $newInterest = new Interest();
                // Set value into each field
                $newInterest->resume_uid = $resume->id;
                $newInterest->name = $request->name;
                $newInterest->description = $request->description;
                // Save new education
                if($newInterest->save()){
                    return redirect()->route('frontend.resume.get_interest');
                }

            }
        }

    }

    /**
     * @return mixed
     */
    public function interestContent()
    {
        $interests = DB::table('interests')->where(['resume_uid' => request('resume_uid')])->get()->toArray();
        return Response::json([
            'data' => $interests,
            'status' => true
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function interest()
    {
        $userResume = $this->getUserResume(auth()->id());
        if ($userResume) {
            $interests = Interest::where('resume_uid', $userResume->id)->get();
        } else {
            $interests = null;
        }

        return view('backend.resumes.interest.interest', compact('userResume','interests'));
    }

    /**
     * @return mixed
     */
    public function deleteInterest($interId)
    {
        $interest = Interest::where('id', $interId)->delete();

        if ($interest) {
            return Response::json(['status' => true, 'message' => 'Deleted!']);
        } else {
            return Response::json(['status' => false, 'message' => 'Not Deleted!']);
        }
    }

    /**
     * @return mixed
     */
    public function editInterest()
    {
        $interest = DB::table('interests')
            ->where([
                ['id', '=', request('interest_uid')],
                ['resume_uid', '=', request('resume_uid')]
            ])
            ->get()->toArray();

        return Response::json([
            'data' => $interest,
            'status' => true
        ]);
    }

    /**
     * @return mixed
     */
    public function updateInterest()
    {
        DB::table('interests')
            ->where([
                ['id', '=', request('interest_uid')],
                ['resume_uid', '=', request('resume_uid')]
            ])
            ->update([
                'name' => request('name')
            ]);
        return Response::json(['status' => true]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reference()
    {
        $userResume = Resume::where('user_uid', auth()->id())->first();

        if ($userResume) {
            $references = DB::table('references')->where('resume_uid', $userResume->id)->get();
        } else {
            $references = null;
        }

        return view('backend.resumes.reference.reference', compact('userResume', 'references'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveReference(Request $request){

        if (isset($request->resume_uid)){

            $userResume = $this->getUserResume(auth()->id());

            /*-- This user already has a resume id so can create or update reference--*/

            if(isset($request->reference_id)){
                /*-- Update reference --*/

                DB::table('references')
                    ->where([
                        ['id', '=', $request->reference_id],
                        ['resume_uid', '=', $userResume->id]
                    ])
                    ->update([
                        'name' => $request->name,
                        'position' => $request->position,
                        'phone' => $request->phone,
                        'email' => $request->email
                    ]);
                return redirect()->route('frontend.resume.get_reference');
            }else{

                /*-- Create new reference --*/
                $newReference = new Reference();
                // Set value into each field
                $newReference->resume_uid = $userResume->id;
                $newReference->name = $request->name;
                $newReference->position = $request->position;
                $newReference->phone = $request->phone;
                $newReference->email = $request->email;
                // Save new reference

                if($newReference->save()){
                    return redirect()->route('frontend.resume.get_reference');
                }

            }

        }else{

            /*-- This user has no resume id so need to create resume first--*/
            $resume = new Resume();
            $resume->career_profile = null;
            $resume->user_uid = auth()->id();
            if ($resume->save()) {
                /*-- Create new reference --*/
                $newReference = new Reference();
                // Set value into each field
                $newReference->resume_uid = $resume->id;
                $newReference->name = $request->name;
                $newReference->position = $request->position;
                $newReference->phone = $request->phone;
                $newReference->email = $request->email;
                // Save new reference

                if($newReference->save()){
                    return redirect()->route('frontend.resume.get_reference');
                }

            }
        }


    }

    /**
     * @param $refId
     * @return mixed
     */
    public function deleteReference($refId){
        $interest = Reference::where('id', $refId)->delete();

        if ($interest) {
            return Response::json(['status' => true, 'message' => 'Deleted!']);
        } else {
            return Response::json(['status' => false, 'message' => 'Not Deleted!']);
        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getResumeByAjax(Request $request)
    {

        $resume = Resume::where('id', $request->resume_id)->first();

        return Response::json(['status' => true, 'resume' => $resume]);

    }
}
