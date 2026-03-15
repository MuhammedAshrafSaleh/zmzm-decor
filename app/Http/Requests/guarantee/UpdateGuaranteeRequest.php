<?php

namespace App\Http\Requests\guarantee;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGuaranteeRequest extends FormRequest
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
            'text' => ['required','string', 'max:200', 'min:3'],
            'image' => ['nullable','max:500','mimes:png,jpg,jpeg']
        ];
    }
}
