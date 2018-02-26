@extends('layouts.app')
@section('content')
<div class="col-lg-8">
    @forelse($posts as $post)
        <h1>{{$post->title}}</h1>
        <hr>
        <p>Posted on {{$post->created_at->diffForHumans()}}</p>
        <hr>
        <!-- Post Content -->
        <p class="lead">{{$post->body}}</p>
        <p><a href="/posts/{{$post->slug}}">Read more &rarr;</a></p>
        <hr>
    @empty
        <p>No posts found</p>
    @endforelse
</div>
@endsection