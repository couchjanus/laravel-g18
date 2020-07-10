<?php

namespace App\Http\Controllers;

use App\{Comment, Post, User};
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->body = $request->get('body');
        $comment->creator()->associate($request->user());
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($comment);
        return back();
    }

    public function replyStore(Request $request)
    {
        $reply = new Comment();
        $reply->body = $request->get('body');
        $reply->creator()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($reply);
        return back();
    }
}
