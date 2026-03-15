<?php

namespace App\Http\Requests\projects;

use Illuminate\Foundation\Http\FormRequest;

class CreateImageProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'image.*' => ['required','max:5000', 'mimes:png,jpg,jpeg'],
            'work_id' => ['required','integer', 'exists:works,id'],
            'image_category_id' => ['required','integer', 'exists:images_categories,id'],
            'show_in_front' => ['required','integer', 'between:0,1'],
        ];
    }
}
