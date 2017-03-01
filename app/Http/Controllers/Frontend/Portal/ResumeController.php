<?php

namespace App\Http\Controllers\Frontend\Portal;

use App\Models\Portal\Resume\Experience;
use App\Models\Portal\Resume\Resume;
use App\Models\Portal\Resume\Project;
use App\Http\Controllers\Controller;
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
        $resume = Resume::find(auth()->id());
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
    public function store_career_profile()
    {
        $newCareerProfile = new Resume();

        $newCareerProfile->career_profile = request('career_profile');
        $newCareerProfile->user_uid = auth()->id();
        $newCareerProfile->save();
        return redirect('/');
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
    public function getCareerProfile(){
        $resume = DB::table('resumes')
            ->where([
                ['id', '=', request('resume_uid')]
            ])->get()->toArray();
        return Response::json([
            'data' => $resume,
            'status' => true
        ]);
    }

    public function editCareerProfile(){
        $resume = DB::table('resumes')->where([
            ['id', '=', request('resume_uid')]
        ])->get()->toArray();

        return Response::json(['data'=> $resume, 'status'=>true]);
    }

    public function updateCareerProfile(){
        DB::table('resumes')->where('id', request('resume_uid'))->update(['career_profile' => request('career_profile')]);
        return Response::json(['status' => true]);
    }


    public function saveProject(){
        // Create a new project
        $newProject = new Project();
        // Set value into each field
        $newProject->resume_uid = request('resume_uid');
        $newProject->name = request('name');
        $newProject->description = request('description');
        // Save new project
        $newProject->save();
        // Response back as json format
        return Response::json(['status'=>true]);
    }
}
