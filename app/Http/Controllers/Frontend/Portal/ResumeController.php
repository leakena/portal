<?php

namespace App\Http\Controllers\Frontend\Portal;

use App\Helpers\Auth\Auth;
use App\Models\Portal\Resume\Contact;
use App\Models\Portal\Resume\Education;
use App\Models\Portal\Resume\Experience;
use App\Models\Portal\Resume\Interest;
use App\Models\Portal\Resume\Language;
use App\Models\Portal\Resume\Resume;
use App\Models\Portal\Resume\Project;
use App\Http\Controllers\Controller;
use App\Models\Portal\Resume\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Repositories\Backend\PersonalInfo\PersonalInfoContract;
class ResumeController extends Controller
{
    /**
     * ResumeController constructor.
     */

    protected $personalInfos;
    public function __construct(PersonalInfoContract $personalIfoRepo)
    {

        $this->personalInfos = $personalIfoRepo;
//        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $resume = Resume::where(['user_uid' => auth()->id()])->first();
        return view('backend.resumes.index', compact('resume'));
    }

    public function userInfo(){

        $userResume = Resume::where('user_uid', auth()->id())->first();

        if($userResume) {
            $personalInfo = DB::table('personal_infos')->where('resume_uid', $userResume->id)->first();
        } else {
            $personalInfo= null;
        }
        return view('backend.resumes.userInfo.userInfo', compact('userResume', 'personalInfo'));
    }


    public function storeUserInfo(Request $request) {


        if(isset($request->resume_uid)) {
            /*--there is a resume id so we need to create user information --*/

            $resume = Resume::where('id', $request->resume_uid)->first();

            /*---check if personal-info hase already created ---*/
            if(count($resume->personalInfo)) {
                /*--update personal info --*/

                $update = $this->personalInfos->update($resume->personalInfo->id, $request->all());

                if($update) {
                    return redirect()->back()->with(['status'=>'Information Updated!']);
                }
            } else {
                /*---create personal-info--*/

                $create = $this->personalInfos->create($request->all());
                if($create) {
                    return redirect()->back()->with(['status'=>'Information Created!']);
                }

            }

        } else {
            /*--if the request has no resume id then we have to create Resume first */
            $resume = new Resume();
            $resume->career_profile = null;
            $resume->user_uid = auth()->id();
            if($resume->save()) {
                /*---create personal information ---*/

                $create = $this->personalInfos->create($request->all());
                if($create) {
                    return redirect()->back()->with(['status'=>'Information Created!']);
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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveCareerProfile()
    {



        $userResume = $this->getUserResume(auth()->id());


        if($userResume) {
            /*--update cv--*/


        } else {
            /*--create cv---*/


            $newCareerProfile = new Resume();
            $newCareerProfile->career_profile = request('description');
            $newCareerProfile->user_uid = auth()->id();

            if($newCareerProfile->save()) {
                return view('backend.resumes.career_profile.partial.career_profile', compact('newCareerProfile'));
            }

        }



    }

    private function getUserResume($userId) {
        return Resume::where('user_uid', $userId)->first();
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

    public function experience()
    {
        return view('backend.resumes.experience.experiences');
    }

    /**
     * @return mixed
     */
    public function saveExperience()
    {
        $newExperience = new Experience();
        $newExperience->resume_uid = request('resume_uid');
        $newExperience->position = request('position');
        $newExperience->company = request('company');
        $newExperience->description = request('description');
        $newExperience->start_date = request('start_date');
        $newExperience->end_date = request('end_date');

        $newExperience->save();
        return Response::json([
            'status' => true
        ]);
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
    public function removeExperience()
    {

        $exp = DB::table('experiences')->where([
            ['id', '=', request('remove_experience_id')],
            ['resume_uid', '=', request('remove_resume_uid')]
        ])->delete();
        return Response::json([
            'status' => true
        ]);
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
     * @return mixed
     */
    public function updateCareerProfile()
    {
        DB::table('resumes')->where('id', request('resume_uid'))->update(['career_profile' => request('career_profile')]);
        return Response::json(['status' => true]);
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
    public function saveSkill()
    {
        // Create a new project
        $newProject = new Skill();
        // Set value into each field
        $newProject->resume_uid = request('resume_uid');
        $newProject->name = request('save-skill-name');
        // Save new project
        $newProject->save();
        // Response back as json format
        return Response::json(['status' => true]);
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

    public function skill(){

        return view('backend.resumes.skill.skill');
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
    public function deleteSkill()
    {
        DB::table('skills')
            ->where([
                ['id', '=', request('skill_uid')],
                ['resume_uid', '=', request('resume_uid')]
            ])->delete();

        return Response::json(['status' => true]);
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
    public function saveEducation()
    {

        // Create a new education
        $newEducation = new Education();
        // Set value into each field
        $newEducation->resume_uid = request('resume_uid');
        $newEducation->major = request('major');
        $newEducation->school = request('school');
        $newEducation->start_date = request('start_date');
        $newEducation->end_date = request('end_date');
        // Save new education
        $newEducation->save();
        // Response back as json format
        return Response::json(['status' => true]);

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

    public function education(){

        return view('backend.resumes.education.education');
    }


    /**
     * @return mixed
     */
    public function deleteEducation()
    {
        DB::table('education')
            ->where([
                ['id', '=', request('education_uid')],
                ['resume_uid', '=', request('resume_uid')]
            ])->delete();

        return Response::json(['status' => true]);
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
    public function saveLanguage()
    {
        // Create a new language
        $newEducation = new Language();
        // Set value into each field
        $newEducation->resume_uid = request('resume_uid');
        $newEducation->name = request('name');
        $newEducation->degree = request('degree');
        // Save new language
        $newEducation->save();
        // Response back as json format
        return Response::json(['status' => true]);

    }

    /**
     * @return mixed
     */
    public function languageContent()
    {
        $languages = DB::table('languages')->where(['resume_uid' => request('resume_uid')])->get()->toArray();
        return Response::json([
            'data' => $languages,
            'status' => true
        ]);
    }

    public function language(){

        return view('backend.resumes.language.languages');
    }

    /**
     * @return mixed
     */
    public function deleteLanguage()
    {
        DB::table('languages')
            ->where([
                ['id', '=', request('language_uid')],
                ['resume_uid', '=', request('resume_uid')]
            ])->delete();

        return Response::json(['status' => true]);
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
    public function saveInterest()
    {

        // Create a new interest
        $newInterest = new Interest();
        // Set value into each field
        $newInterest->resume_uid = request('resume_uid');
        $newInterest->name = request('name');
        // Save new education
        $newInterest->save();
        // Response back as json format
        return Response::json(['status' => true]);

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

    public function interest()
    {
        return view('backend.resumes.interest.interest');
    }

    /**
     * @return mixed
     */
    public function deleteInterest()
    {
        DB::table('interests')
            ->where([
                ['id', '=', request('interest_uid')],
                ['resume_uid', '=', request('resume_uid')]
            ])->delete();

        return Response::json(['status' => true]);
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

    public function reference(){
        return view('backend.resumes.reference.reference');
    }
}
