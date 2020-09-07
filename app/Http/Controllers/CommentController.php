<?php


namespace App\Http\Controllers;


use App\Http\Requests\CommentCrudRequest;
use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends CrudController
{
    public function __construct()
    {
        $this->serviceClassName = CommentService::class;
        $this->requestFormClassName = CommentCrudRequest::class;
        parent::__construct();
    }

    public function index(Request $request)
    {
        $service = new CommentService();

        if (isset($request->postId)) {
            return $service->findByPostId($request->postId);
        }

        return $service->findAll($request->per_page);
    }
}
