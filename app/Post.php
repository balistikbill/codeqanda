<?php

namespace App;

use App\Post;
use App\Comment;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    	'post_title',
    	'post_body',
    	'post_channel',
    	'slug'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    
}
