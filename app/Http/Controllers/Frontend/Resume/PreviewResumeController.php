<?php

namespace App\Http\Controllers\Frontend\Resume;

use App\Http\Requests\Frontend\Resume\PreviewResumeRequest;
use App\Models\Portal\Resume\Resume;
use App\Repositories\Backend\PersonalInfo\PersonalInfoContract;
use App\Utils\Http\Facades\ApiRequestManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Access\User\User;

/**
 * Class PreviewResumeController
 * @package App\Http\Controllers\Frontend\Resume
 */
class PreviewResumeController extends Controller
{
    protected $prefix;
    public function __construct(PersonalInfoContract $personalIfoRepo, ApiRequestManager $apiRequestManager)
    {
        $this->requestManager = $apiRequestManager;
        $this->prefix = '/api/student';
        $this->personalInfos = $personalIfoRepo;
//        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function preview($name, $id, PreviewResumeRequest $request){
//        dd($id);
        $user = User::where('email', $id)->first();
        $resume = Resume::where('user_uid', $user->id)->first();
        $student = $this->requestManager->getElementsFromApi($this->prefix . '/prop', ['student_id_card'], [$resume->user->email], []);
        return view('frontend.new_portals.resumes.popup.print', compact('resume', 'student'));
    }
}
