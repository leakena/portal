<?php

namespace App\Http\Requests\Backend\Resume\Language;

use App\Http\Requests\ApiRequest;
use Illuminate\Support\Facades\Auth;

class StoreLanguage extends ApiRequest
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
            'language_id'          => 'required',
            'proficiency'   => 'required'
        ];
    }
}
