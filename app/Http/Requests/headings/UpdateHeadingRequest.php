<?php
namespace App\Http\Requests\headings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHeadingRequest extends FormRequest
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
           "head" => ['required', 'string', 'max:50', 'min:3'],
           "head_span" => ['required', 'string', 'max:50', 'min:3'],
           "category_name" => ['required', 'string', 'max:50', 'min:3'],
           "sub_head" => ['required', 'string', 'max:1000', 'min:3'],
        ];
    }
}
