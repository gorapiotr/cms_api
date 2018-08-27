<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 27.08.2018
 * Time: 20:47
 */

namespace Modules\User\Http\Controllers;


use Illuminate\Routing\Controller;
use Modules\User\Model\User;
use Modules\User\Presenters\PermissionPresenter;

class PermissionController extends Controller
{

    public function getPermissions(int $user_id)
    {
        $user = User::findOrFail($user_id);
        $presenter = new PermissionPresenter($user);

        return $presenter;
    }
}