<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 15.08.2018
 * Time: 18:44
 */

namespace Modules\Settings\Presenters;


use Illuminate\Http\Resources\Json\Resource;

class SettingsPresenter extends Resource
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
            'key' => $this->key,
            'value' => $this->value,
            'type' => $this->type,
            'created_at' => $this->created_at->toDateString(),
            'created_by' => [
                'id' => $this->createdBy->id,
                'name' => $this->createdBy->name,
                'email' => $this->createdBy->email
            ],
            'updated_at' => $this->created_at->toDateString(),
            'updated_by' => [
                [
                    'id' => $this->updatedBy->id,
                    'name' => $this->updatedBy->name,
                    'email' => $this->updatedBy->email
                ],
            ]
        ];
        return $return;
    }

}