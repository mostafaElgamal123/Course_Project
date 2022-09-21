<?php

namespace App\Http\Requests\Web\Dashborad;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
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
            'name'                =>'required|min:3|max:150',
            'description'         =>'required|min:3|max:100000',
            'url'                 =>'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'image'               =>'image|mimes:webp|max:1000',
            'rating'              =>'required|numeric|between:0,99.99',
            'course_id'           =>'required'
        ];
    }
}
