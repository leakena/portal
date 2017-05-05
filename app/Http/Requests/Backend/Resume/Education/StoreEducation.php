<?php

namespace App\Http\Requests\Backend\Resume\Education;

use App\Http\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreEducation extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->studentAccess(Auth::user()->email);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'school'        => 'required',
            'major'         => 'required',
            'degree'        => 'required',
            'start_date'    => 'required',
            'is_present'    => 'required',
            'end_date'      => 'required',
        ];
    }
}
