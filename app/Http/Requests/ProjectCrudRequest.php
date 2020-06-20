<?php


namespace App\Http\Requests;


class ProjectCrudRequest extends RequestValidation
{
    public $rules = [
        'title' => 'required|string',
        'description' => 'string',
        'img_url' => 'url',
        'url' => 'url|required',
        'admin_id' => 'required|integer'
    ];

    public $messages = [
        'title.required' => 'O campo título deve ser informado',
        'title.string' => 'Informe um valor de título válido',
        'description.string' => 'Informe uma descrição válida',
        'img_url.url' => 'Informe uma URL válida para imagem',
        'url.url' => 'Informe uma URL válida para o projeto',
        'url.required' => 'O campo url deve ser informado'
    ];
}
