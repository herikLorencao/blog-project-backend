<?php


namespace App\Http\Controllers;


use App\Http\Requests\CategoryCrudRequest;
use App\Services\CategoryService;
use App\Services\ProjectService;

class CategoryController extends CrudController
{
    public function __construct()
    {
        $this->serviceClassName = CategoryService::class;
        $this->requestFormClassName = CategoryCrudRequest::class;
        parent::__construct();
    }
}
