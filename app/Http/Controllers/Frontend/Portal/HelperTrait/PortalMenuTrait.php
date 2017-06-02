<?php

namespace App\Http\Controllers\Frontend\Portal\HelperTrait;

use App\Models\Portal\Resume\PersonalInfo;
use App\Models\Portal\Resume\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

/**
 * Created by PhpStorm.
 * User: vannat_gic
 * Date: 5/18/17
 * Time: 3:09 PM
 */
trait PortalMenuTrait
{
    /**
     * @param $userId
     * @return mixed
     */
    private function getUserResume($userId)
    {
        return Resume::where('user_uid', $userId)->first();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile(Request $request)
    {
        $user = auth()->user();
        $student = $this->requestManager->getElementsFromApi($this->studentPrefix . '/prop', ['student_id_card'], [$user->email], []);
        $resume = $this->getUserResume(auth()->id());
        if ($resume){
            $profile = PersonalInfo::where('resume_uid', $resume->id)->first();
        }else{
            $profile = null;
        }

        return view('frontend.new_portals.includes.profile', compact('resume', 'profile', 'student'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function classmate(Request $request)
    {
        $user = auth()->user();
        $resume = $this->getUserResume(auth()->id());
        $student = $this->requestManager->getElementsFromApi($this->studentPrefix . '/annual-object', ['student_id_card'], [$user->email], []);
        //dd($student);

        return view('frontend.new_portals.includes.classmate');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function involveProject(Request $request)
    {

        return view('frontend.new_portals.includes.involve_project');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function history(Request $request)
    {

        return view('frontend.new_portals.includes.history');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function setting(Request $request)
    {
        $user = auth()->user();
        $resume = $this->getUserResume(auth()->id());
        $student = $this->requestManager->getElementsFromApi($this->studentPrefix . '/prop', ['student_id_card'], [$user->email], []);
       // dd($student['name_latin']);

        return view('frontend.new_portals.includes.setting', compact('resume','student'));
    }

    public function timetable(Request $request){
        $year = $request->year;
        $semester = $request->semester;
        $week = $request->week;

        return Response::json([
            'status'=>true,
            'year' => $year,
            'semester' => $semester,
            'week' => $week
        ]);
    }

}