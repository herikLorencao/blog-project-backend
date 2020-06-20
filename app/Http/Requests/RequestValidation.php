<?php


namespace App\Http\Requests;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class RequestValidation
{
    /** @var array $rules */
    public static $rules = [];

    /** @var array $messages */
    public static $messages = [];

    /** @var array $customAttributes */
    public static $customAttributes = [];
}
