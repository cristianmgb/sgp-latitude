<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssociateRequest extends FormRequest
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
            'first_name'     => 'required|string|min:5',
            'last_name'      => 'required|string|min:5',
            'email'          => 'required|email:rfc,dns|unique:associates,email',
            'identification' => 'required|numeric',
            'phone'          => 'required|numeric',
            'status'         => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'first_name'     => 'nombres',
            'last_name'      => 'apellidos',
            'email'          => 'correo electrónico',
            'identification' => 'identificación',
            'phone'          => 'teléfono',
            'status'         => 'estado'
        ];
    }
}
