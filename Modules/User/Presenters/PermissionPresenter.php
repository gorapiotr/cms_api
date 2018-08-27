<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 27.08.2018
 * Time: 20:57
 */

namespace Modules\User\Presenters;

use Illuminate\Http\Resources\Json\Resource;
use Modules\User\Model\Permission;

class PermissionPresenter extends Resource
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        $return = [
            'user_id' => $this->id,
            'user_name' => $this->name,
            'role' => $this->roles->first(),
            'permissions' => $this->allPermissions()->map(function(Permission $permission){return $permission->name;})->toArray()
        ];
        return $return;
    }
}