<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Foundation\Http\FormRequest;

class LoggingInRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id'       => 'required',
            'password' => 'required',
        ];
    }

    /**
     * Get the needed authorization credentials from the request.
     * @return array
     * @throws BindingResolutionException
     */
    public function getCredentials()
    {
        $id = $this->get('id');

        if ($this->isEmail($id)) {
            return [
                'email'    => $id,
                'password' => $this->get('password')
            ];
        }

        return $this->only('id', 'password');
    }

    /**
     * Validate if provided parameter is valid email.
     *
     * @param $param
     *
     * @return bool
     * @throws BindingResolutionException
     */
    private function isEmail($param)
    {
        $factory = $this->container->make(ValidationFactory::class);

        return ! $factory->make(
            ['username' => $param],
            ['username' => 'email']
        )->fails();
    }
}
