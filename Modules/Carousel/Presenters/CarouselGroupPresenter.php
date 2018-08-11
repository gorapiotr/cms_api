<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 11.08.2018
 * Time: 10:02
 */

namespace Modules\Carousel\Presenters;


use Illuminate\Http\Resources\Json\Resource;

class CarouselGroupPresenter extends Resource
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
            'name' => $this->name
        ];
        return $return;
    }
}