<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Post extends Model
{
    protected $guarded = array('id');
    protected $fillable = ['user_id','category_id','title','content','image'];

    public function category()
    {
        return $this->belongsTo(\App\Category::class, 'category_id');
    }

    public function users()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(\App\Comment::class, 'post_id', 'id');
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}
