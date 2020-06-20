<?php


namespace App\Http\Controllers;


use App\Http\Requests\AdminCrudRequest;
use App\Services\AdminService;

class AdminController extends CrudController
{
    public function __construct()
    {
        $this->serviceClassName = AdminService::class;
        $this->requestFormClassName = AdminCrudRequest::class;
        parent::__construct();
    }
}
