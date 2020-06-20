<?php


namespace App\Http\Controllers;


use App\Http\Requests\ProjecCrudRequest;
use App\Services\ProjectService;

class AdminController extends CrudController
{
    public function __construct()
    {
        $this->serviceClassName = ProjectService::class;
        $this->requestFormClassName = ProjecCrudRequest::class;
        parent::__construct();
    }
}