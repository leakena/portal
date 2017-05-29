<?php

namespace App\Http\Controllers\Frontend\Portal\HelperTrait;

use App\Models\Portal\Resume\Resume;
use Illuminate\Http\Request;

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
        return view('frontend.new_portals.includes.profile', compact('resume'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function classmate(Request $request)
    {

        return view('frontend.new_portals.includes.classmate');
    }

    public function involveProject (Request $request)
    {

        return view('frontend.new_portals.includes.involve_project');
    }


    public function history (Request $request)
    {

        return view('frontend.new_portals.includes.history');
    }

    public function setting(Request $request)
    {


        return view('frontend.new_portals.includes.setting');
    }

}