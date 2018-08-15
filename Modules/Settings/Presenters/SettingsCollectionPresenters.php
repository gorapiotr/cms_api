<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 15.08.2018
 * Time: 18:46
 */

namespace Modules\Settings\Presenters;


use Illuminate\Http\Resources\Json\ResourceCollection;

class SettingsCollectionPresenters extends ResourceCollection
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {

        $return['data'] = SettingsPresenter::collection($this->collection);

        return $return;
    }
}