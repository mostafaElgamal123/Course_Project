<?php

namespace App\Http\Requests\Web\Dashborad;

use Illuminate\Foundation\Http\FormRequest;

class ChangeConstantRequest extends FormRequest
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
            'enrollnow'               =>'required|min:3|max:150',
            'title_section_content'   =>'required|min:3|max:300',
            'title_video1'            =>'required|min:3|max:400',
            'title_video2'            =>'required|min:3|max:400',
            'title_section_review'    =>'required|min:3|max:300',
            'title_form'              =>'required|min:3|max:300',
            'title_form_offer'        =>'required|min:3|max:400',
            'submit_form'             =>'required|min:3|max:150',
            'title_card'              =>'required|min:3|max:400',
            'title_coursefeature'     =>'required|min:3|max:400',
            'title_famousprogrammer'  =>'required|min:3|max:400',
        ];
    }
}
