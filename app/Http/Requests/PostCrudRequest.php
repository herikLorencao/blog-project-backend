<?php


namespace App\Http\Requests;


class PostCrudRequest extends RequestValidation
{
    public $rules = [
        'title' => 'required|string',
        'content' => 'required|string'
    ];

    public $messages = [
        'title.required' => 'O campo título deve ser informado',
        'title.string' => 'Informe o campo título em um formato válido',
        'content.required' => 'O campo conteúdo deve ser informado',
        'content.string' => 'Informe o campo conteúdo em um formato válido'
    ];
}
