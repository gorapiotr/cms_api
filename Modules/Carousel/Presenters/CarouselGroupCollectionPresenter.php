<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 11.08.2018
 * Time: 10:03
 */

namespace Modules\Carousel\Presenters;


use Illuminate\Http\Resources\Json\ResourceCollection;

class CarouselGroupCollectionPresenter extends ResourceCollection
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {

        $return['data'] = CarouselGroupPresenter::collection($this->collection);

        return $return;
    }
}