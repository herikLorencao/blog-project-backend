<?php


namespace App\Http\Requests;


class CategoryCrudRequest extends RequestValidation
{
    public $rules = [
        'name' => 'required|string'
    ];

    public $messages = [
        'name.required' => 'O campo nome deve ser informado',
        'name.string' => 'Informe o campo nome em um formato válido'
    ];
}
