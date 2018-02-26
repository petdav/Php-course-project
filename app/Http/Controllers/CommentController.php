<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function save(Post $post, Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);
        $post->addComment($request->body);
        return back()->with('status', 'Comment was added');
    }
}