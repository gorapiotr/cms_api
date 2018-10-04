<?php
/**
 * Created by PhpStorm.
 * User: tvo
 * Date: 02.08.18
 * Time: 20:05
 */

namespace Modules\User\Presenters;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UsersListPresenter extends ResourceCollection
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return ['data' => UserPresenter::collection($this)];
    }

}