@extends('layouts.frontend')
@section('content')

      <!-- <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          <a class="p-2 text-muted" href="#">World</a>
          <a class="p-2 text-muted" href="#">U.S.</a>
          <a class="p-2 text-muted" href="#">Technology</a>
          <a class="p-2 text-muted" href="#">Design</a>
          <a class="p-2 text-muted" href="#">Culture</a>
          <a class="p-2 text-muted" href="#">Business</a>
          <a class="p-2 text-muted" href="#">Politics</a>
          <a class="p-2 text-muted" href="#">Opinion</a>
          <a class="p-2 text-muted" href="#">Science</a>
          <a class="p-2 text-muted" href="#">Health</a>
          <a class="p-2 text-muted" href="#">Style</a>
          <a class="p-2 text-muted" href="#">Travel</a>
        </nav>
      </div> --> 

       <!-- <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark mt-5">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
          <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>
          <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
        </div>
      </div> -->


      <div class="row row-cols-1 row-cols-md-3 g-4 mt-5">
      @foreach ($posts as $post)

      <div class="col">
        <div class="card h-100">
          <img src="{{ asset('thumbnail/' . $post->thumbnail) }}" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="Thumbnail">
          <div class="card-body">
            <h5 class="card-title">
              <a href="#" class="text-dark text-decoration-none">{{ $post->title }}</a>
            </h5>
            <p class="card-text text-muted">{{$post->User->name}} | {{ date('y-m-d', strtotime($post->created_at)) }}</p>
            <p class="card-text">{{ $post->description }}</p>
          </div>
          <div class="card-footer bg-transparent border-top-0">
            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary btn-sm">Continue reading</a>
          </div>
        </div>
      </div>


      @endforeach

@endsection