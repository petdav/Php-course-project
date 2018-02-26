@extends('layouts.app')
@section('content')
<form action="/posts" method="post">
    {{csrf_field()}}
    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
        <label class="control-label" for="title">Title:</label>
        <input class="form-control" type="text" name="title" id="title" value="{{old('title')}}">
        {!!$errors->first('title', '<p class="help-block">:message</p>')!!}
    </div>
    <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
        <label class="control-label" for="body">Contents:</label>
        <textarea class="form-control" name="body" id="body">{{old('body')}}</textarea>
        {!!$errors->first('body', '<p class="help-block">:message</p>')!!}
    </div>
    <button type="submit" class="btn btn-primary">Add a new forum post</button>
</form>
@endsection