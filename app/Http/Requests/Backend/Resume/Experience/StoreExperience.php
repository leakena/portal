<?php

namespace App\Http\Requests\Backend\Resume\Experience;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreExperience extends ApiRequest
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
            'resume_uid'    => 'required',
            'position'      => 'required',
            'company'       => 'required',
            'address'       => 'required',
            'start_date'    => 'required',
            'is_present'    => 'required',
            'end_date'      => 'required',
            'description'   => 'required|max:255',
        ];
    }
}
