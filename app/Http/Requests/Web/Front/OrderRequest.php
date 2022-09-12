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
            'name'                              =>'required|min:3|max:250',
            'phone'                             =>'required|numeric',
            'email'                             =>'required|email|unique:users,email',
            'city'                              =>'required|min:3|max:150',
            'educational_qualification'         =>'required|min:3|max:350'
        ];
    }
}
