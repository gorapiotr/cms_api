<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 15.10.2018
 * Time: 10:15
 */

namespace Modules\Post\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'slug' => [
                'string',
                'required',
                Rule::unique('posts', 'slug')
            ],
            'content' => [
                'string',
                'required'
            ],
            'lead' => [
                'string',
                'required'
                ],
            'title' => [
                'string',
                'required'
            ],
            'public' => [
                'required'
            ]

        ];
    }
}