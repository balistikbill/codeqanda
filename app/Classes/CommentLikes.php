<?php

namespace App\Classes;

use App\Post;
use App\User;
use App\Comment;
use App\CommentLike;

class CommentLikes {

	public function addLike(User $user, Post $post, Comment $comment)
	{
		CommentLike::create(['post_id' => $post->id, 'user_id' => $user->id, 'comment_id' => $comment->id]);
	}
}