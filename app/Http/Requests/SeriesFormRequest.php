<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
            'nome' => ['required', 'min:2'],
        ];
    }
}
//    public function messages() {
//        return [
//            'nome.*' => 'O campo nome é obrigatório e precisa de pelo menos :min caracteres' //forma nova
//            'nome.required' => "Campo nome obrigatório!",                                    //forma antiga
//            'nome.min' => 'Campo nome com no mínimo :min caracteres!'
//            ];
//        //na pasta lang/en o arquivo validation.php estão os textos  de mensagens no 
//        //'https://github.com/lucascudo/laravel-pt-BR-localization/blob/master/src/pt-BR/validation.php
//        //criei o validation.php em português e criei uma copia no validation_1.php que está em inglês 
//    }
