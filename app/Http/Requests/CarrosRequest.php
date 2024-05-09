<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CarrosRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            
            'modelo' => 'required|max:150|',
            'ano' => 'required|max:4|min:4|',
            'preco' => 'required|decimal:2',
            'marca' => 'required|max:150|',
            'cor' => 'required|max:150|',
            'peso' => 'required|max:150',
            'potencia' => 'required|max:150|',
            'descricao' => 'required|max:400|',
            

        ];
    }



public function failedValidation(Validator $validator)
{
    throw new HttpResponseException(response()->json([
        'success' => false,
        'error' => $validator->errors()
    ]));
}

public function messages()
{
    return[
        'modelo.required' => 'O campo modelo é obrigatorio',
        'modelo.max' => 'O campo modelo deve conter no maximo 150 caracteres',
       
        'marca.required' => 'O campo marca é obrigatorio',
        'modelo.max' => 'O campo marca deve conter no maximo 150 caracteres',
       
        'ano.required' => 'O campo ano é obrigatorio',
        'ano.max' => 'O campo ano deve conter no maximo 4 caracteres',
        'ano.min' => 'O campo ano deve conter no minimo 4 caracteres',
        
        'preco.required' => 'preço obrigatoria',
        'preco.decimal' => 'O formato de preço é invalido',

        'cor.required' => 'O campo cor é obrigatorio',
        'cor.max' => 'O campo cor deve conter no maximo 150 caracteres',

        'peso.required' => 'O campo peso é obrigatorio',
        'peso.max' => 'O campo peso deve conter no maximo 150 caracteres',

        'potencia.required' => 'O campo potencia é obrigatorio',
        'potencia.max' => 'O campo potencia deve conter no maximo 150 caracteres',

        'descricao.required' => 'O campo descricao é obrigatorio',
        'descricaoax' => 'O campo descricao deve conter no maximo 150 caracteres',
       
    ];
}

}
