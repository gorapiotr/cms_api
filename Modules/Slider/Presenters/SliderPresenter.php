<?php
/**
 * Created by PhpStorm.
 * User: macias
 * Date: 24.11.18
 * Time: 13:29
 */

namespace Modules\Slider\Presenters;


use Illuminate\Http\Resources\Json\Resource;

class SliderPresenter extends Resource
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        $return = [
            'file_name' => $this->file_name,
            'image_url' => $this->image_url,
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