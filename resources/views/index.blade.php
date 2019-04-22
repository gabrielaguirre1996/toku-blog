@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Recent Posts</h1>
            <a href="{{ route('create_post') }}" class="btn btn-success" style="float: right">Create New Post</a>
            <br>
            <br> -->
            <!-- <table class="table table-bordered">
                <!-- <thead>
                    <th>Title</th>
                    <th width="150px">Action</th>
                </thead> -->
                <!-- <tbody>
                @foreach($posts as $post)
                <tr>
                    <td><a href="{{ route('view_post', $post->id) }}">{{ $post->title }}</a></td>
                    <td><p><small>
                      Posted {{ $post->created_at->diffForHumans() }} by {{ $post->user->username }}
                    </small></p></td>
                    <td>
                        <a href="{{ route('view_post', $post->id) }}" class="btn btn-primary" style="float: right">View Post</a>
                    </td>
                </tr>
                @endforeach
                </tbody> -->

            <!-- </table> -->
            <br>
            <br>
            <div class="row">
            @foreach($posts as $post)
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <a href="{{ route('view_post', ['post' => $post->id]) }}">
                      {{ $post->title }}
                    </a>
                  </div>
                  <div class="card-body">
                    @if($post->image != null)
                    <a href="{{ route('view_post', ['post' => $post->id]) }}">
                      <img src="{{ asset($post->image) }}" alt="" class="card-img-top">
                    </a>
                    @endif
                    {{ $post->content }}
                    <br>
                    <br>
                    <p><small>
                      Posted {{ $post->created_at->diffForHumans() }} by {{ $post->user->username }}
                    </small></p>
                    <a href="{{ route('view_post', ['post' => $post->id]) }}" class="btn btn-outline-primary">View</a>
                  </div>
                </div>
                <br>
              </div>
          @endforeach
        </div>
        <!-- </div>
    </div>
</div> -->
@endsection
