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
        $resume = $this->getUserResume(auth()->id());
        $profile = PersonalInfo::where('resume_uid', $resume->id)->first();
        return view('frontend.new_portals.includes.profile', compact('resume', 'profile'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function classmate(Request $request)
    {

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


        return view('frontend.new_portals.includes.setting');
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