<?php

namespace App\Http\Requests\Frontend\Resume;

use App\Models\Access\User\User;
use App\Models\Portal\Resume\Resume;
use Illuminate\Foundation\Http\FormRequest;

class PreviewResumeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = User::where('email', $this->route('id'))->first();
        $resume = Resume::where('user_uid', $user->id)->first();
        if($resume instanceof Resume){
            if($resume->publish == 1){
                return true;
            }
        }
        return abort(404);
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
