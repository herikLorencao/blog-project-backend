<?php


namespace App\Http\Requests;


class LoginRequest extends RequestValidation
{
    public $rules = [
        'login' => 'required|string',
        'password' => 'required|string'
    ];

    public $messages = [
        'login.required' => 'O campo login deve ser informado',
        'login.string' => 'Informe um valor de login válido',
        'password.required' => 'O campo senha deve ser informado',
        'password.string' => 'Informe um valor de senha válida',
    ];
}
