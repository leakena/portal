<?php

namespace App\Http\Controllers\Frontend\Api\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use App\Utils\Http\Facades\ApiRequestManager;


class StudentController extends Controller
{

    protected $apiRequestManager;
    private $prefix;

    public function __construct(ApiRequestManager $apiRequestManager) {
        $this->apiRequestManager = $apiRequestManager;
        $this->prefix = '/api/student';
    }

    public function score() {

        $studentData = $this->apiRequestManager->getElementsFromApi($this->prefix.'/score', ['student_annual_id', 'semester_id'], [20486, null]);

        $studentData = $studentData['data'];
        return view('frontend.partials.portals.score', compact('studentData'));

    }
}
