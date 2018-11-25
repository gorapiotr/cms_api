<?php
/**
 * Created by PhpStorm.
 * User: macias
 * Date: 24.11.18
 * Time: 21:58
 */

namespace Modules\Slider\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
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
            'file_name' => 'string|required',
            'image_url' => 'string|required'
        ];
    }
}
