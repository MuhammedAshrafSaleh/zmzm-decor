<?php

namespace App\Http\Requests\footer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFooterContactRequest extends FormRequest
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
            'contact' => ['required','string', 'max:50', 'min:3'],
            'url' => ['required','string', 'max:300', 'min:3'],
            'image' => ['nullable', 'max:1000', 'mimes:png,jpg,jpeg'],
        ];
    }
}
