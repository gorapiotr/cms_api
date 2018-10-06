<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 06.10.2018
 * Time: 15:13
 */

namespace Modules\Post\Presenters;


use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollectionPresenter extends ResourceCollection
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {

        $return['data'] = PostPresenter::collection($this->collection);

        return $return;
    }
}