<?php


namespace App\Services;


use App\Comment;

class CommentService extends DefaultService
{
    public function __construct()
    {
        $this->resourceName = Comment::class;
    }
}
