<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Post;
use App\Comment;
use App\CommentLike;
use App\Http\Requests;
use Illuminate\Http\Request;
use GrahamCampbell\Markdown\Facades\Markdown;

class DiscussController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    // {
    //     if ( isset($_GET['page']) ) 
    //     {
    //         $postPage = $_GET['page'];
    //     } else {
    //         $postPage = null;
    //     }

    //     if (! $postPage )
    //     {
    //         $posts = Post::orderBy('created_at', 'DESC')->limit(20)->get();
    //     } else {
    //         $skipNumber = $postPage;

    //         $skipNumber = ($skipNumber * 10) * 2;

           
    //         $posts = Post::orderBy('created_at', 'DESC')->skip($skipNumber - 20)->take(20)->get();
    //     }

        $postsForPagination = Post::orderBy('created_at', 'DESC')->paginate(20);

        return view('discuss.index', compact('postsForPagination'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discuss.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $request['slug'] = str_slug($request->post_title);

        Auth::user()->posts()->create($request->all());

        $posts = Post::orderBy('created_at', 'DESC')->get();

        $postsForPagination = Post::orderBy('created_at', 'DESC')->paginate(20);

        return view('discuss.index', compact('postsForPagination'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($channel, Post $post, $slug)
    {
        $comments = Comment::where('post_id', $post->id)->orderBy('created_at', 'ASC')->get();
        $likes = CommentLike::where('post_id', $post->id)->get();
        $hasLikedComment = Auth::user()->hasLikedCommentOnPost($post);


        $likesJoinedWithUser = CommentLike::where('post_id', $post->id)
                                ->join('users', 'comment_likes.user_id', 'users.id');

        $test = $likesJoinedWithUser->orderBy('user_id', 'ASC')->get()->toArray();

        $test2 = sort($test);

        // foreach($test as $test2) {
        //     echo $test2['userName'];
        // }
        // dd($test2);

        return view('discuss.post')->with('post', $post)
                                   ->with('comments', $comments)
                                   ->with('likes', $likes)
                                   ->with('hasLikedComment', $hasLikedComment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function comment($channel, Post $post, $slug, Request $request)
    {
        $request['user_id'] = Auth::user()->id;

        $post->comments()->create($request->all());

        return back();
    }
}
