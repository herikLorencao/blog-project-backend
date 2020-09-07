<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'parent_category'];
    public $timestamps = false;

    public function subcategory()
    {
        return $this->belongsTo(Category::class);
    }
}
