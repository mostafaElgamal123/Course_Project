<?php

namespace App\Http\Requests\Web\Front;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'name'                              =>'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|min:3|max:250',
            'phone'                             =>'required|size:11|regex:/^01[0125][0-9]{8}$/',
            'phone2'                            =>'nullable|size:11|regex:/^01[0125][0-9]{8}$/',
            'email'                             =>'required|email|unique:users,email',
            'city_id'                           =>'required|',
            'educational_qualification'         =>'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|min:3|max:350'
        ];
    }
}
