<?php
/**
 * Created by PhpStorm.
 * User: maciejSobczak
 * Date: 24.11.18
 * Time: 13:13
 */

namespace Modules\Slider\Presenters;


use Illuminate\Http\Resources\Json\ResourceCollection;

class SliderCollectionPresenters extends ResourceCollection
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {

        $return['data'] = SliderPresenter::collection($this->collection);

        return $return;
    }
}