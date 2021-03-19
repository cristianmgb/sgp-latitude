<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'first_name'   => 'required|string|min:5',
            'last_name'    => 'required|string|min:5',
            'password'     => 'required|confirmed|min:5',
            'email'        => 'required|email:rfc,dns|unique:users,email',
            'status'       => 'required',
            'rol'          => 'required',
            'associate_id' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'first_name'   => 'nombres',
            'last_name'    => 'apellidos',
            'password'     => 'contraseña',
            'email'        => 'correo electrónico',
            'status'       => 'estado',
            'rol'          => 'rol',
            'associate_id' => 'asociado'
        ];
    }
}
