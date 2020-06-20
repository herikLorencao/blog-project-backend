<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;
    protected $fillable = ['content', 'reply_comment', 'post_id', 'reader_id'];

    public function reader()
    {
        return $this->belongsTo(Reader::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
