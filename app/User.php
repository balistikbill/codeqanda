<?php

namespace App;

use App\Post;
use App\CommentLike;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'userName', 'email', 'password', 'city', 'state'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRouteKeyName()
    {
        return 'userName';
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function hasLikedCommentOnPost(Post $post)
    {
        $commentLikesOfPost = CommentLike::where('post_id', $post->id)->get()->toArray();
        $postsComments = $post->comments();
        $hasLiked = false;

        foreach ($commentLikesOfPost as $like) {
            if ($like['user_id'] == \Auth::user()->id) {
                $hasLiked = true;
            } else {
                $hasLiked = false;
            }
        }

        return $hasLiked;
    }
}
