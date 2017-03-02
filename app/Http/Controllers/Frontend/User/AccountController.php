<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Access\User\Profile;

/**
 * Class AccountController.
 */
class AccountController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $profile = Profile::where(['user_uid' => auth()->id()])->first();
        return view('frontend.user.account', compact('profile'));
    }
}
