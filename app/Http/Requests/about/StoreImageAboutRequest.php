<?php

namespace App\Http\Requests\about;

use Illuminate\Foundation\Http\FormRequest;

class StoreImageAboutRequest extends FormRequest
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
            'image' => ['required','max:500','mimes:png,jpg,jpeg']
        ];
    }
}
