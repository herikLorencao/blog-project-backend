<?php


namespace App\Http\Controllers;


use App\Http\Requests\ProjecCrudRequest;
use App\Http\Requests\UserCrudRequest;
use App\Services\ProjectService;
use App\Services\ReaderService;

class ReaderController extends CrudController
{
    public function __construct()
    {
        $this->serviceClassName = ReaderService::class;
        $this->requestFormClassName = UserCrudRequest::class;
        parent::__construct();
    }
}
