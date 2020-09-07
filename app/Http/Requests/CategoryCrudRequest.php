<?php


namespace App\Http\Requests;


class CategoryCrudRequest extends RequestValidation
{
    public $rules = [
        'name' => 'required|string',
        'parent_category' => 'integer'
    ];

    public $messages = [
        'name.required' => 'O campo nome deve ser informado',
        'name.string' => 'Informe o campo nome em um formato válido',
        'parent_category.integer' => 'Informe o campo categoria pai com um formato válido'
    ];
}
