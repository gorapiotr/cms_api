<?php
/**
 * Created by PhpStorm.
 * User: tvo
 * Date: 02.08.18
 * Time: 20:10
 */

namespace Modules\User\Presenters;


use Illuminate\Http\Resources\Json\Resource;
use Modules\User\Model\Permission;

class UserLoginPresenter extends Resource
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        $return = [
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => $this->name,
            'role' => $this->roles->first(),
            'permissions' => $this->allPermissions()->map(function(Permission $permission){return $permission->name;})->toArray()
        ];
        return $return;
    }
}