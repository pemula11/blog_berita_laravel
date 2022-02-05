@extends('dashboard.layout.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
        <h2 class="mb-3"> {{ $post["title"] }} </h2>
            
        <p>oleh : <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none"> {{ $post->author->name }}</a> 
            in <a href="/blog?category={{ $post->category->slug }}"> {{ $post->category->name }} </a>

        </p>
        <a href="/dashboard/posts" class="btn btn-success"> 
             <span data-feather="arrow-left"></span>
              Back to My post
        </a>
        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"> 
             <span data-feather="edit"></span>
              Edit
        </a>
        <form action="/dashboard/posts/{{ $post->slug }}" class="d-inline" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('yakin hapus data?')"> 
                        
                        <span data-feather="x-circle"></span> Delete
                        
                    </button>
        </form>
        @if($post->image)
        <div style="max-height : 350px; overflow:hidden;">
        
        <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top mt-3" alt="{{ $post->category->name }} " class="img-fluid">
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
@endsection