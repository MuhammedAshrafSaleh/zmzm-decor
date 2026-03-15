<?php

namespace App\Http\Requests\guarantee;

use Illuminate\Foundation\Http\FormRequest;

class UpdateYoutubeGuranteeRequest extends FormRequest
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
            'url' => ['required','string','max:100', 'min:5'],
            'image' => ['nullable','max:500','mimes:png,jpg,jpeg']
        ];
    }
}
