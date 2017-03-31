<?php

namespace App\Http\Controllers\Frontend\Portal;

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

class ResumeController extends Controller
{
    /**
     * ResumeController constructor.
     */
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $resume = Resume::where(['user_uid' => auth()->id()])->first();
        return view('frontend.resumes.index', compact('resume'));
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
        $newCareerProfile = new Resume();

        $newCareerProfile->career_profile = request('save-career-profile');
        $newCareerProfile->user_uid = auth()->id();
        $newCareerProfile->save();

        return redirect()->back();
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
        return view('frontend.resumes.career_profile');
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
}
