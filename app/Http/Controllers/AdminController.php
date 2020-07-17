<?php


namespace App\Http\Controllers;


use App\Http\Requests\ProjecCrudRequest;
use App\Http\Requests\UserCrudRequest;
use App\Services\AdminService;

class AdminController extends CrudController
{
    public function __construct()
    {
        $this->serviceClassName = AdminService::class;
        $this->requestFormClassName = UserCrudRequest::class;
        parent::__construct();
    }
}
