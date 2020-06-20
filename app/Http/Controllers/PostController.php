<?php


namespace App\Http\Controllers;


use App\Http\Requests\PostCrudRequest;
use App\Services\PostService;

class PostController extends CrudController
{
    public function __construct()
    {
        $this->serviceClassName = PostService::class;
        $this->requestFormClassName = PostCrudRequest::class;
        parent::__construct();
    }
}
