<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name' => [
                'required',
                'filled',
                'string',
                'min:0',
            ],
            'birthday' => [
                'nullable',
                '',
            ],
            'gender' => [
                'nullable',
                'integer',
            ],
            'email' => [
                'nullable',
                'string',
                Rule::unique(User::class)->ignore($this->user),
            ],
            'address' => [
                'nullable',
                'string',
            ],
            'phone_number' => [
                'nullable',
                'string',
                'min:0',
                'max:10'
            ],
            'job' => [
                'nullable',
                'string',
            ],
            'work_place' => [
                'nullable',
                'string',
            ],
        ];
    }
}
