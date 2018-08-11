<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 09.08.2018
 * Time: 07:38
 */

namespace Modules\Carousel\Presenters;


use Illuminate\Http\Resources\Json\ResourceCollection;

class CarouselsCollectionPresenter extends ResourceCollection
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {

        $return['data'] = CarouselPresenter::collection($this->collection);

        return $return;
    }
}