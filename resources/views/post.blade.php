@extends('layout.main') @section('container') 
<h1 class="text-center">{{ $title }} </h1>

<div class="row justify-content-center mb3">
    <div class="col-md-6">
        <form action="/blog">
        
        @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
        @endif
        <div class="input-group mb-3">
             <input type="text" class="form-control" placeholder="Cari.." name="search" aria-label="Recipient's username" aria-describedby="button-addon2">
             <button class="btn btn-danger" type="submit" >Search</button>
        </div>

        </form>
    </div>
</div>


@if ($posts->count())

    
    <div class="card mb-3">

    @if($posts[0]->image)
        <div style="max-height : 400px; overflow:hidden;">
        
        <img src="{{ asset('storage/'. $posts[0]->image) }}" class="card-img-top" alt="{{ $posts[0]->category->name }} " class="img-fluid">
        </div>
    @else
    <img src="http://source.unsplash.com/1200x400/?{{ $posts[0]->category->name }}" class="card-img-top" alt="...">
    @endif
    
    <div class="card-body text-center">
        <h5 class="card-title"> <a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none text-dark"> {{ $posts[0]->title }} </a>  </h5>
        <p> <small class="text-muted"> by :
            <a href="/blog?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }} </a>
            in
            <a href="/blog?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a>
            Last updated {{ $posts[0]->created_at->diffForHumans() }}
        </small>
        </p>
        
        <p class="card-text">{{ $posts[0]->excerpt }}</p>
        <a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">
        Read more...
    </a>
    </div>
    </div>


<div class="container">
    <div class="row">
@foreach ($posts->skip(1) as $post)

        <div class="col-md-4 mb-3">
        <div class="card" >
            <div class="position-absolute bg-dark px-3 py2 " style="background-color: transparent"> <a href="/blog?category={{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a>  </div>
            
            @if($post->image)
                
                <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top" alt="{{ $post->category->name }} " class="img-fluid">
             @else
             <img src="http://source.unsplash.com/500x400/?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->title }}">
            @endif

            <div class="card-body">
                <h5 class="card-title"> <a href="/post/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a></h5>
                <p> <small class="text-muted"> by :
                    <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name}} </a>
                    in
                    <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>
                    Last updated {{ $post->created_at->diffForHumans() }}
                </small>
                </p>
                <p class="card-text">{{ $post->excerpt }}</p>
                <a href="/post/{{ $post->slug }}" class="text-decoration-none btn btn-primary">
                     Read more...
                </a>
            </div>
            </div> 
        </div>
  


@endforeach
</div>
</div>
@else    

<p class="text-center fs-4">Post no Found!</p>

@endif


<div class="d-flex justify-content-end">
{{ $posts->links() }}
</div>
@endsection