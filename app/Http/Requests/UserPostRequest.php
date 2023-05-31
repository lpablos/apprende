<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPostRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'                      => 'required|string|min:2|max:500',
            'email'                     => 'required|email',
            'password'                  => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required'                         => 'Escriba el nombre.',
            'name.min'                              => 'El nombre debe tener al 2 dos caracteres.',
            'name.max'                              => 'El nombre es muy grande, no debe pasar los 190 caracteres .',
            'email.required'                        => 'Ingrese un correo.',
            'email.email'                           => 'Ingrese un correo valido.',
            'password.required'                     => 'Ingrese la contraseña.',
            'password.min'                          => 'La contraseña debe tener al menos 6 caracteres.',
            
            /*
            
            'password.confirmed'                    => 'Confirme su contraseña',
            'password.min'                          => 'La contraseña debe tener al menos 6 caracteres.',
            */

        ];
    }

}
