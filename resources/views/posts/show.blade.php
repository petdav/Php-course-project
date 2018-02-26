@extends('layouts.app')
@section('content')
    <div class="col-lg-8">
        <h1>{{$post->title}}</h1>
        <hr>
        <p>Posted on {{$post->created_at}}</p>
        <hr>
        <p class="lead">{{$post->body}}</p>
        <h4>Comments</h4>
        @forelse($post->comments as $comment)
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Posted on
                        <small>{{$comment->created_at}}</small>
                    </h4>
                    {{$comment->body}}
                </div>
            </div>
        @empty
            <p>No comments yet</p>
        @endforelse
        @if(auth()->check())
            <form action="/posts/{{$post->id}}/comments" method="post">
                    {{csrf_field()}}
                    <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                        <label class="control-label" for="body">Your comment:</label>
                        <input class="form-control" type="text" name="body" id="body" value="{{old('body')}}">
                        {!!$errors->first('body', '<p class="help-block">:message</p>')!!}
                    </div>
                    <button type="submit" class="btn btn-primary">Add comment</button>
            </form>
        @else
            Please log in to comment
        @endif
    </div>
@endsection