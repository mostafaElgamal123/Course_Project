<?php

namespace App\Http\Requests\Web\Dashborad;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'title'               =>'required|min:3|max:150',
            'description'         =>'required|min:3|max:100000',
            'image'               =>'required|image|mimes:webp|max:1000',
            'rating'              =>'required|numeric|between:0,99.99',
            'lectures'            =>'required|nullable|regex:/^(\d+(,\d{1,2})?)?$/',
            'price'               =>'required|nullable|regex:/^(\d+(,\d{1,2})?)?$/',
            'offer'               =>'required|nullable|regex:/^(\d+(,\d{1,2})?)?$/',
            'explanation_video'   =>'required|min:3|max:100000',
            'review_video'        =>'required|min:3|max:100000',
            'category_id'         =>'required|',
            'status'              =>'required|',
            'slug'                =>'required|min:3|max:150'
        ];
    }
}
