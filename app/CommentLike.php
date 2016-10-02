<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CommentLike extends Model
{
    protected $fillable = [
    	'post_id', 'user_id', 'comment_id'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function hasUserLiked()
    {
    	return true;
    }

    
}
