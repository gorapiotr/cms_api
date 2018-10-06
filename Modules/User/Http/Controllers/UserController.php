<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Modules\User\Model\User;
use Modules\User\Presenters\UserPresenter;
use Modules\User\Presenters\UsersListPresenter;

class UserController extends Controller
{

    /**
     * Get users list
     *
     * @return UsersListPresenter
     */
    public function index()
    {
        $users = User::paginate(10);

        $presenter = new UsersListPresenter($users);

        return $presenter;
    }

    /**
     * Get login user
     *
     * @return UserPresenter
     */
    public function show()
    {
        $user = User::findOrFail(Auth::id());

        $presenter = new UserPresenter($user);

        return $presenter;
    }

    /**
     * Get other user data
     *
     * @param Request $request
     * @return UserPresenter
     */
    public function showOtherUser(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        $presenter = new UserPresenter($user);

        return $presenter;
    }

    public function update(Request $request, int $user_id)
    {
        /** @var User $user */
        $user = User::findOrFail($user_id);

        if($request->hasFile('avatar_file')) {
            $path = Storage::putFile(
                'public/avatar', $request->file('avatar_file'));
            $user->avatar = $path;
            $user->avatar_type = 'image';
        }

        $user->name = $request->name;
        $user->save();

        $presenter = new UserPresenter($user);

        return $presenter;
    }

}
