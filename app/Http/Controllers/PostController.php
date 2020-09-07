<?php


namespace App\Http\Controllers;


use App\Http\Requests\PostCrudRequest;
use App\Services\PostService;
use http\Env\Request;

class PostController extends CrudController
{
    public function __construct()
    {
        $this->serviceClassName = PostService::class;
        $this->requestFormClassName = PostCrudRequest::class;
        parent::__construct();
    }

    public function index(\Illuminate\Http\Request $request)
    {
        $service = new PostService();

        if (isset($request->name) && isset($request->category)) {
            return $service->findByNameAndCategory($request->name, $request->category);
        }

        if (isset($request->name)) {
            return $service->findByName($request->name);
        }

        if (isset($request->category)) {
            return $service->findByCategory($request->category);
        }

        return $service->findAll($request->per_page);
    }
}
