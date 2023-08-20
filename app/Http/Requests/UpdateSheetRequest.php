<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSheetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => [
                'required',
                'filled',
                'string',
                'min:0',
            ],
            'name' => [
                'required',
                'filled',
                'integer',
                'min:0',
            ],
            'sheet_image' => [
                'required',
                'filled',
                'string',
                'min:0',
            ],
        ];
    }
}
