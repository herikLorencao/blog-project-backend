<?php


namespace App\Http\Controllers;


use App\Http\Requests\CommentCrudRequest;
use App\Services\CommentService;

class CommentController extends CrudController
{
    public function __construct()
    {
        $this->serviceClassName = CommentService::class;
        $this->requestFormClassName = CommentCrudRequest::class;
        parent::__construct();
    }
}
