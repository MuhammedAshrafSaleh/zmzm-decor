<?php

namespace App\Http\Requests\current_works;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCurrentWorksRequest extends FormRequest
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
            'time' => ['required','string', 'max:50', 'min:3'],
            'location' => ['required','string', 'max:50', 'min:3'],
            'last_updated' => ['required','string', 'max:50', 'min:3'],
            'status' => ['nullable','integer', 'between:0,1'],
            'image' => ['nullable','max:1000','mimes:png,jpg,jpeg']
        ];
    }
}
