<?php


namespace App\Http\Requests;


class TokenValidation extends RequestValidation
{
    /** @var array $rules */
    public static $rules = [
        'login' => 'required',
        'password' => 'required'
    ];

    /** @var array $rules */
    public static $messages = [
        'login.required' => 'Informe um login válido',
        'password.required' => 'Informe uma senha válida'
    ];
}
