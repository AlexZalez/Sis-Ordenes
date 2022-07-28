<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionCliente extends FormRequest
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
            'nombre' => 'required|between:10,100',
            'cedula' => 'required|digits_between:7,8|integer',
            'prefijo' => 'required|in:0424,0412,0416,0426,0414,0244',
            'telefono' => 'required|digits:7',
        ];
    }
    
    public function messages (){
        return [
            'nombre.required'=>'Debes colocar un nombre',

            'cedula.required'=>'Debes colocar una cedula',
            'cedula.integer'=>'Debes colocar solo numeros',
            'cedula.max'=>'Debes escribir menos de 10 digitos',
            
            'prefijo.required'=>'Debes colocar un prefijo',
            'telefono.required'=>'Debes colocar un numero',
            'telefono.digits'=>'No debes superar los 7 digitos',

        ];
    }
}
