<?php


namespace App\Http\Requests;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class RequestValidation
{
    /** @var array $rules */
    public $rules = [];

    /** @var array $messages */
    public $messages = [];

    /** @var array $customAttributes */
    public $customAttributes = [];
}
