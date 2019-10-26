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
            'name' => 'required|max:255|unique:users',
            'phone' => 'required|unique:users',
            'email' => 'required|max:255|email|unique:users',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter name',
            'name.unique' => 'Name has existed',
            'email.required' => 'Please enter email',
            'email.unique' => 'Email has existed',
            'email.email' => 'Email wrong format',
            'phone.required' => 'Please enter phone',
            'password.required' => 'Password failed',
            'password.min' => 'Password min 6'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $error = array_values((new ValidationException($validator))->errors())[0];
        throw new HttpResponseException(response() -> json(
            [
                'message' => $error,
                'code' => 422,
            ]
        ));
    }
}
