
@extends('layout.main')
@section('container')







  <h1>POST CATEGORY  </h1>


  <div class="container">
  <div class="row">
  @foreach ($categories as $cat)
    <div class="col-md-4">
    <a href="/blog?category={{ $cat->slug }}"> 
      <div class="card bg-dark text-white">
      <img src="http://source.unsplash.com/500x400/?{{ $cat->name }}" class="card-img-top" alt="{{ $cat->name }}">
   
        <div class="card-img-overlay d-flex align-items-center p-0">
          
          <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color:rgba(0, 0, 0, 0.7)">{{ $cat->name }}</h5>
        </div>
      </div>
      </a>
    </div>

    @endforeach
  </div>

</div>

  @foreach ($categories as $cat)

<ul>
    <li>
        <a href="/categories/{{ $cat->slug }}"> {{ $cat->name }} </a>
    </li>

</ul>
  
 @endforeach
@endsection




 