<?php


namespace App\Services;


use App\Post;

class PostService extends DefaultService
{
    public function __construct()
    {
        $this->resourceName = Post::class;
    }
}
