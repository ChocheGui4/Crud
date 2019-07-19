<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearReglas extends FormRequest
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
            'name' => 'required|min:3|max:30|regex:/^([A-Z]{1}[a-zñáéíóú]+[\s]*)+$/',
            'apellidos' => 'required|min:3|max:40|regex:/^([A-Z]{1}[a-zñáéíóú]+[\s]*)+$/',
            'email' => 'required|regex:/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/',
            'password' => 'required|string|max:20'
        ];
    }
}
