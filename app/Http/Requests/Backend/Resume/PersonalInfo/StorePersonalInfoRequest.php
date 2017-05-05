<?php

namespace App\Http\Requests\Backend\Resume\PersonalInfo;

use App\Http\Requests\ApiRequest;
use \Illuminate\Support\Facades\Auth;

class StorePersonalInfoRequest extends ApiRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

       return  $this->studentAccess(Auth::user()->email);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'name' => 'required|max:255',
            'status_id' => 'max:255',
            'dob'   => 'required',
            'birth_place' => 'required',
            'email'     => 'required|email',
            'phone'     => 'required',
            'address'  => 'required'

        ];
    }
}
