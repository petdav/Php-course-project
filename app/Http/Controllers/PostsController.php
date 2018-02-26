<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
    public function create()
    {
        return view('posts.create');
    }
    public function save(PostsFormRequest $request)
    {
        $request->persist();
        return back()->with('status', 'Post was created');
    }
}