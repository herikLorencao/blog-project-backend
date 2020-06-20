<?php


namespace App\Services;


use App\Category;

class CategoryService extends DefaultService
{
    public function __construct()
    {
        $this->resourceName = Category::class;
    }
}
