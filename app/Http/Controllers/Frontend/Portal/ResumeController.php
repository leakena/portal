<?php

namespace App\Http\Controllers\Frontend\Portal;

use App\Models\Portal\Resume\Contact;
use App\Models\Portal\Resume\Experience;
use App\Models\Portal\Resume\Project;
use App\Models\Portal\Resume\Resume;
use App\Models\Portal\Resume\Skill;
use App\Http\Controllers\Controller;

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
        $resume = Resume::find(auth()->id());
        return view('frontend.resumes.index', compact('resume'));
    }

    /**
     * @param Resume $resume
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update_career_profile(Resume $resume){
        $resume->career_profile     = request('career_profile');
        $resume->save();
        return redirect('/');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store_experience(){

        $newExperience = new Experience();
        $newExperience->resume_uid = request('resume_uid');
        $newExperience->position = request('position');
        $newExperience->company = request('company');
        $newExperience->description = request('description');
        $newExperience->start_date =  request('start_date');
        $newExperience->end_date = request('end_date');

        $newExperience->save();

        return redirect()->back();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store_project(){

        $newProject = new Project();

        $newProject->resume_uid = request('resume_uid');
        $newProject->name = request('name');
        $newProject->description = request('description');

        $newProject->save();

        return redirect('/');

    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store_skill(){
        $newSkill = new Skill();

        $newSkill->resume_uid = request('resume_uid');
        $newSkill->name = request('name');

        $newSkill->save();

        return redirect('/');
    }

    public function store_contact(){
        $newContact = new Contact();
        $newContact->resume_uid = request('resume_uid');
        $newContact->icon = request('icon');
        $newContact->description = request('description');

        $newContact->save();

        return redirect('/');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function go_back()
    {
        return redirect()->back();
    }
}
