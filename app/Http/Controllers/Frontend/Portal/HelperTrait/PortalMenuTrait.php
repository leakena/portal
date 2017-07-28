<?php

namespace App\Http\Controllers\Frontend\Portal\HelperTrait;

use App\Models\Access\User\User;
use App\Models\Portal\Resume\PersonalInfo;
use App\Models\Portal\Resume\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
        $studentData = $this->controller->getElementByApi($this->studentPrefix . '/program', ['student_id_card'], [$user->email], []);
        $studentGrades = $this->controller->getElementByApi($this->studentPrefix . '/annual-object', ['student_id_card'], [$user->email], []);
        $student = $this->requestManager->getElementsFromApi($this->studentPrefix . '/prop', ['student_id_card'], [$user->email], []);
        foreach ($studentGrades as $studentGrade){
            if($studentGrade == end($studentGrades)){
                $studentGrade = $studentGrade;
            }
        }

        $resume = $this->getUserResume(auth()->id());
        if ($resume){
            $profile = PersonalInfo::where('resume_uid', $resume->id)->first();
        }else{
            $profile = null;
        }

        return view('frontend.new_portals.includes.profile', compact('resume', 'profile', 'student', 'studentData', 'studentGrade'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function classmate(Request $request)
    {
        $url = $request->url();
        if($request->page) {
            $page = $request->page;
        } else {
            $page = 1;
        }
        $user = auth()->user();
        $classmates = $this->requestManager->getElementsFromApi($this->studentPrefix . '/student-classmate', ['student_id_card'], [$user->email], []);
        $idCards = collect($classmates)->pluck('id_card')->toArray();
        $classmates = array_chunk($classmates, 2);
        $collection = collect($classmates);


        $usersResumes = User::join('resumes', function ($joinResume) use($idCards) {
            $joinResume->on('resumes.user_uid', '=', 'users.id')
                ->whereNotNull('resumes.user_uid')
                ->whereIn('users.email', $idCards);
        })->join('personal_infos', function ($joinPersonal) {
            $joinPersonal->on('personal_infos.resume_uid', '=', 'resumes.id')
                ->whereNotNull('personal_infos.resume_uid');
        })->select(
            [
                'users.email as id_card', 'resumes.career_profile', 'personal_infos.birth_place', 'personal_infos.profile', 'personal_infos.email'
            ]
        )->get();

        $userResumes = collect($usersResumes)->keyBy('id_card')->toArray();
        $classmates = $collection->forPage($page, 5);
        return view('frontend.new_portals.includes.classmate', compact('classmates', 'page', 'url', 'userResumes'));
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


        return view('frontend.new_portals.includes.setting', compact('resume','student'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about_us(){
        return view('frontend.new_portals.about_us');
    }

}