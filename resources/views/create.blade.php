@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <br>
          <br>
            <div class="card">
                <div class="card-header">Create Post</div>
                <div class="card-body">
                  <form action="{{ route('store_post') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <br>
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="body">Add a description...</label>
                      <textarea name="body" rows="10" class="form-control"></textarea>
                    </div>

                    <label class="btn btn-default">
                      Browse <input type="file" name="image">
                    </label>

                    <div class="form-group">
                      <button type="submit" class="btn btn-outline-success">Create Post</button>
                    </div>
                    </form>
                </div>
            </div>
            <br><br>
        </div>
    </div>
</div>
@endsection
