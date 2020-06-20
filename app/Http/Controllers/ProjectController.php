<?php


namespace App\Http\Controllers;


use App\Http\Requests\ProjectCrudRequest;
use App\Services\ProjectService;

class ProjectController extends CrudController
{
    public function __construct()
    {
        $this->serviceClassName = ProjectService::class;
        $this->requestFormClassName = ProjectCrudRequest::class;
        parent::__construct();
    }
}
