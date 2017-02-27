<?php

namespace App\Http\Controllers\Frontend\Portal;

use Illuminate\Http\Request;
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
    public function index_career_profile()
    {
        return view('frontend.resumes.career_profile');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index_experiences()
    {
        return view('frontend.resumes.experiences');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index_project()
    {
        return view('frontend.resumes.project');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index_skill()
    {
        return view('frontend.resumes.skill');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index_contact()
    {
        return view('frontend.resumes.contact');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index_interests()
    {
        return view('frontend.resumes.interest');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index_languages()
    {
        return view('frontend.resumes.languages');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function go_back()
    {
        return redirect()->back();
    }
}
