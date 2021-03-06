<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractorRequest extends FormRequest
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
            'name'        => 'required|string|min:5|unique:contractors,name',
            'description' => 'required|string|min:10',
            'status'      => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'name'        => 'nombre',
            'description' => 'descripción',
            'status'      => 'estado'
        ];
    }
}
