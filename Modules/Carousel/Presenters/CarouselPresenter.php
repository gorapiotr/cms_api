<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 09.08.2018
 * Time: 07:39
 */

namespace Modules\Carousel\Presenters;

use Illuminate\Http\Resources\Json\Resource;

class CarouselPresenter extends Resource
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
            'user_id' => $this->user_id,
            'name' => $this->name,
            'alt' => $this->alt,
            'active' => $this->active,
            'position' => $this->position
        ];
        return $return;
    }
}