<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateScheduleRequest extends FormRequest
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
            'schedule_name' => [
                'required',
                'filled',
                'string',
                'min:0',
            ],
            'start_time' => [
                'required',
                'filled',
                'string',
                'min:0',
            ],
            'end_time' => [
                'required',
                'filled',
                'string',
                'min:0',
            ],
            'place' => [
                'required',
                'filled',
                'string',
                'min:0',
            ],
            'status' => [
                'required',
                'filled',
                'string',
                'min:0',
            ],
        ];
    }
}
