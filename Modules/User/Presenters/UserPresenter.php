<?php
/**
 * Created by PhpStorm.
 * User: tvo
 * Date: 02.08.18
 * Time: 20:10
 */

namespace Modules\User\Presenters;


use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Storage;
use Modules\User\Model\User;

class UserPresenter extends Resource
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        /** @var User $this */
        $return = [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'avatar' => $this->avatar_type == 'image' ? asset(Storage::url($this->avatar)) : $this->avatar,
            'avatar_type' => $this->avatar_type
        ];
        return $return;
    }
}