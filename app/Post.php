<?php


namespace App;


use DateTime;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'content', 'admin_id'];
}
