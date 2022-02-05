@extends('layout.main')
@section('container')

<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
        <h2 class="mb-3"> {{ $post["title"] }} </h2>
            
        <p>oleh : <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none"> {{ $post->author->name }}</a> 
            in <a href="/blog?category={{ $post->category->slug }}"> {{ $post->category->name }} </a>
        </p>
        @if($post->image)
        <div style="max-height : 350px; overflow:hidden;">
        
        <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top" alt="{{ $post->category->name }} " class="img-fluid">
        </div>
        @else
            <img src="http://source.unsplash.com/1200x400/?{{ $post->category->name }}" class="card-img-top mt-3" alt="{{ $post->category->name }} " class="img-fluid">
        @endif


        <article class="my-3 fs-5">
        {!! $post->body !!}
        </article>
            

        </div>
    </div>
</div>

<article class="mb-5">

 </article>
    


@endsection


