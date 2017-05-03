<?php

namespace App\Http\Requests\Backend\Resume\PersonalInfo;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Backend\Resume\StudentAccess;
use Illuminate\Support\Facades\Auth;

class UpdatePersonalInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $access = new StudentAccess();
        $access->access(Auth::user()->email);
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
