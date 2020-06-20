<?php


namespace App\Http\Requests;


class AdminCrudRequest extends RequestValidation
{
    public $rules = [
        'email' => 'required|email',
        'login' => 'required',
        'password' => 'required|string',
        'oldPassword' => 'string'
    ];

    public $messages = [
        'email.required' => 'O campo email não foi informado',
        'email.email' => 'Informe um email válido',
        'login.required' => 'O campo login não foi informado',
        'password.required' => 'O campo password não foi informado',
        'password.string' => 'Informe uma senha válida',
        'oldPassword.string' => 'Informe um valor válido no campo oldPassword'
    ];
}
