<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 06.10.2018
 * Time: 15:13
 */

namespace Modules\Post\Presenters;

use Illuminate\Http\Resources\Json\Resource;
use Modules\Post\Model\Post;

class PostPresenter extends Resource
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        /** @var Post $this */
        $return = [
            'id' => $this->id,
            'content' => $this->content,
            'slug' => $this->slug,
            'created_at' => $this->created_at->toDateString(),
            'created_by' => [
                'id' => $this->createdBy->id,
                'name' => $this->createdBy->name,
                'email' => $this->createdBy->email
            ],
            'updated_at' => $this->created_at->toDateString(),
            'updated_by' => [
                'id' => $this->updatedBy->id,
                'name' => $this->updatedBy->name,
                'email' => $this->updatedBy->email
            ]
        ];
        return $return;
    }

}