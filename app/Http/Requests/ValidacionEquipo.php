<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionEquipo extends FormRequest
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
            'tipo' => 'required|max:255',
            'marca' => 'required|max:255',
            'modelo' => 'required|max:255',
            'diagnostico_i' => 'required',
            'cliente_id' => 'required|numeric',
        ];
    }

    public function messages (){
        return [
            'required'=>'Debes rellenar este campo',
            'alpha_num'=>'Solo puedes ingresar, letras y numeros',
            'numeric'=>'Solo puedes ingresar numeros',


        ];
    }
}
