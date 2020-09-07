<?php


namespace App\Services;


use App\Post;
use Illuminate\Support\Facades\DB;

class PostService extends DefaultService
{
    public function __construct()
    {
        $this->resourceName = Post::class;
    }

    public function findAll($resourcesPerPage)
    {
        return parent::findAll($resourcesPerPage);
    }

    public function findByNameAndCategory(string $name, int $category)
    {
        return DB::table('posts')
            ->where('category_id', $category)
            ->where('title', 'like', "%{$name}%")
            ->paginate();
    }

    public function findByName(string $name)
    {
        return DB::table('posts')
            ->where('title', 'like', "%{$name}%")
            ->paginate();
    }

    public function findByCategory(int $category)
    {
        return DB::table('posts')
            ->where('category_id', $category)
            ->paginate();
    }
}
