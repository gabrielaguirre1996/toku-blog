@extends('layouts.app')

@section('content')
<br>
<br>
<form action="{{ route('update_post', ['post' => $post->id]) }}" method="post">

  @csrf
  @method('PUT')

  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" value="{{ $post->title }}">
  </div>

  <div class="form-group">
    <label for="content">Content</label>
    <textarea name="content" rows="8" class="form-control">{{ $post->content }}</textarea>
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-outline-primary">Edit Post</button>
  </div>
</form>
@endsection
