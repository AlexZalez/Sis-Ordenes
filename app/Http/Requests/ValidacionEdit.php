<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionEdit extends FormRequest
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
            'nombre' => 'max:100',
            'cedula' => 'digits_between:7,8',
            'telefono' => 'digits:11',
            'tipo' => 'max:255',
            'marca' => 'max:255',
            'modelo' => 'max:255',
            'diagnostico_i' => 'max:255',
            'diagnostico_p' => 'max:255',
            'diagnostico_f' => 'max:255',
            'cliente_id' => 'numeric',
        ];
    }

    public function messages (){
        return [
            'nombre.max'=>'100 Caracteres Maximos',
            'tipo.max' => '255 Caracteres Maximos',
            'marca.max' => '255 Caracteres Maximos',
            'modelo.max' => '255 Caracteres Maximos',
            'diagnostico_i.max' => '255 Caracteres Maximos',
            'diagnostico_p.max' => '255 Caracteres Maximos',
            'diagnostico_f.max' => '255 Caracteres Maximos',

            'cedula.digits_between'=>'Debes escribir entre 7 u 8 numeros',
            
            'telefono.digits'=>'Debes colocar 7 numeros',

        ];
    }
}
