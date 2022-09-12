<?php

namespace App\Http\Requests\Web\Dashborad;

use Illuminate\Foundation\Http\FormRequest;

class ReviewImageRequest extends FormRequest
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
            'review_image' =>'required|image|mimes:webp|max:1000',
            'status'       =>'required',
            'slug'         =>'required|min:3|max:150',
            'course_id'    =>'required'
        ];
    }
}
