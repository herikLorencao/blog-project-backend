<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'description', 'img_url', 'url', 'admin_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
