<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use App\Models\Access\User\Profile;
use App\Models\Access\User\User;
use App\Repositories\Frontend\Access\User\UserRepository;
use Illuminate\Support\Facades\Input;

/**
 * Class ProfileController.
 */
class ProfileController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * ProfileController constructor.
     *
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * @param UpdateProfileRequest $request
     *
     * @return mixed
     */
    public function update()
    {
        $user = User::find(auth()->id());
        $user->name = request('name');
        $user->save();

        $newProfile = new Profile();

        if (Input::file()) {

            $filename = Input::file('profile-image');
            $change = $filename->getClientOriginalExtension();
            $newfilename = auth()->id() . str_random(10) . '.';
            $filename->move('img/frontend/uploads/profile', "{$newfilename}" . $change);
            $newProfile->profile = $newfilename . $change;

        }
        $newProfile->user_uid = auth()->id();

        $newProfile->save();

        return redirect()->back();
    }
}
