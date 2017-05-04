<?php

namespace App\Http\Requests;

use App\Utils\Http\Facades\ApiRequestManager;
use Illuminate\Foundation\Http\FormRequest;

class ApiRequest extends FormRequest
{
    protected $requestManager;
    public function __construct(ApiRequestManager $apiRequestManager) {

        $this->requestManager = $apiRequestManager;
    }

    public function studentAccess($studentIdCard) {

        $student = $this->requestManager->getElementsFromApi('/api/student/program', ['student_id_card'], [$studentIdCard], []);

        if(is_array($student)) {
            return true;
        }
        return false;
    }



    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
