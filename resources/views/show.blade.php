@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <br>
          <br>
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center text-success">Tōku</h3>
                    <br/>
                    @if($post->image != null)
                      <img src="{{ asset($post->image) }}" class="card-img-top">
                    @endif
                    <h2>{{ $post->title }}</h2>
                    <p>
                        {{ $post->body }}
                    </p>
                    <p>Posted {{ $post->created_at->diffForHumans() }} by {{ Auth::user()->username }} </p>
                    <hr />
                    <h4>Display Comments</h4>

                    @include('display_comments', ['comments' => $post->comments, 'post_id' => $post->id])

                    <hr />
                    <h4>Add comment</h4>
                    <form method="post" action="{{ route('store_comments', ['post' => 'post_id']) }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="body"></textarea>
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Add Comment" />
                        </div>
                    </form>
                    <div class="container">
                    <form action="{{ route('delete_post', ['post' => $post->id]) }}" method="POST">
                      <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-md">Back</a>
                      <a href="{{ route('edit_post', ['post' => $post->id]) }}" class="btn btn-outline-info btn-md">Edit</a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-outline-danger btn-md"name="button">Delete</button>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
