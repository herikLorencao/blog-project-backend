<?php


namespace App\Http\Requests;


class CommentCrudRequest extends RequestValidation
{
    public $rules = [
        'content' => 'required|string',
        'reply_content' => 'integer'
    ];

    public $messages = [
        'content.required' => 'O campo conteúdo não foi informado',
        'content.string' => 'Informe um conteúdo válido',
        'reply_comment' => 'Informe um conteúdo para resposta válido'
    ];
}
