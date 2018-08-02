<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
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
        $users = User::all();

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

    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        $user->name = $request->name;
        $user->save();

        $presenter = new UserPresenter($user);

        return $presenter;
    }

}
