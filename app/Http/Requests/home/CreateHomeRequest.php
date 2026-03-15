<?php

namespace App\Http\Requests\home;

use Illuminate\Foundation\Http\FormRequest;

class CreateHomeRequest extends FormRequest
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
            'head' => ['required','string', 'max:100', 'min:3'],
            'sub_head' => ['required','string', 'max:200', 'min:3'],
            'button' => ['required','string', 'max:50', 'min:3'],
            'sub_button' => ['required','string', 'max:50', 'min:3'],
            'image' => ['required','max:1000']
        ];
    }
}
