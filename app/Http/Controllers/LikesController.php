<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comment;
use App\Post;
use App\Http\Requests;
use App\Classes\CommentLikes;

class LikesController extends Controller
{
    public function store(User $user, Post $post, Comment $comment, CommentLikes $commentLikes)
    {
    	// $test = new CommentLikes($user, $post, $comment)->addLike();
    	// $user = User::where('id', $userID);
    	$commentLikes->addLike($user, $post, $comment);

    }
}
