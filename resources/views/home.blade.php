@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Post') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="post" action="{{route('posts.store')}}">
                        @csrf
                        <div class="form-group">
                            <label>Post Title</label>
                            <input type="text" name="title" class="form-control mt-2" placeholder="Enter post title" required>
                        </div>
                        <div class="form-group mt-2">
                            <label>Post Description</label>
                            <textarea rows="10"  type="text" name="description" class="form-control mt-2" placeholder="Enter post description" required></textarea>
                            
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">Post</button>
                    </form>
                    <!-- {{ __('You are logged in!') }} -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
