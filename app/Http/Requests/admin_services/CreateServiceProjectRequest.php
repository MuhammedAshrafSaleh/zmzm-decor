<?php

namespace App\Http\Requests\admin_services;

use Illuminate\Foundation\Http\FormRequest;

class CreateServiceProjectRequest extends FormRequest
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
            'name' => ['required','string', 'max:50', 'min:3'],
            'button' => ['required','string', 'max:50', 'min:3'],
            'service_id' => ['required','integer', 'exists:services,id'],
            'image' => ['required','max:1000','mimes:png,jpg,jpeg']
        ];
    }
}
