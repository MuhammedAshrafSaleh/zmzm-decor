<?php

namespace App\Http\Requests\projects;

use Illuminate\Foundation\Http\FormRequest;

class UpdateImageRequest extends FormRequest
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
            'work_id' => ['nullable','integer', 'exists:works,id'],
            'image_category_id' => ['nullable','integer', 'exists:images_categories,id'],
            'show_in_front' => ['nullable','integer', 'between:0,1'],
            'image' => ['nullable','max:1000','mimes:png,jpg,jpeg']
        ];
    }
}
