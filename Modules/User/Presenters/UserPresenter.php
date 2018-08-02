<?php
/**
 * Created by PhpStorm.
 * User: tvo
 * Date: 02.08.18
 * Time: 20:10
 */

namespace Modules\User\Presenters;


use Illuminate\Http\Resources\Json\Resource;

class UserPresenter extends Resource
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        $return = [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
        ];
        return $return;
    }
}