@extends('layouts.app')

@section('content')
            <br>
            <br>
            @if(session()->has('status')){
              echo '<div style="text-align: center">';
              echo session()->get('status');
              echo '</div>';
            @endif
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
