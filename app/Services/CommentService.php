<?php


namespace App\Services;


use App\Comment;
use Illuminate\Support\Facades\DB;

class CommentService extends DefaultService
{
    public function __construct()
    {
        $this->resourceName = Comment::class;
    }

    public function findByPostId(int $id)
    {
        return DB::table('comments')
            ->where('post_id', $id)
            ->paginate();
    }
}
