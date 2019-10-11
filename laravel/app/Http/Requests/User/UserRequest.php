<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|max:255|email|unique:users',
            'name' => 'required|max:255|unique:users',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Please enter email',
            'email.unique' => 'Email has existed',
            'email.email' => 'Email wrong format',
            'name.required' => 'Please enter name',
            'name.unique' => 'Name has existed',
            'password.required' => 'Password failed',
            'password.min' => 'Password min 6'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $error = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response() -> json(
            [
                'erorr' => $error,
                'code' => 422,
            ]
        ));
    }
}
