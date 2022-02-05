@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Post</h1>
        
</div>

<div class="col-lg-8">

    <form method="post" class="mb-3" action="/dashboard/categories" enctype="multipart/form-data">
        @csrf
      <div class="mb-3">
        <label for="name" class="form-label">name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" onkeyup="createTextSlug()" value="{{ old('name') }}" required autofocus>
        @error('name')
        <div id="validationServer03Feedback" class="invalid-feedback">
          {{ $message }}.
        </div>
         @enderror
      </div>
      <div class="mb-3">
        <label for="slug" class="form-label">slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" readonly required>
        @error('slug')
        <div id="validationServer03Feedback" class="invalid-feedback">
          {{ $message }}.
        </div>
         @enderror
      </div>
      

      <button type="submit" class="btn btn-primary">Create Post</button>
    </form>


</div>


<script>
  const title =document.querySelector('#name'); 
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function(){
    fetch('/dashboard/posts/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  }) 

function previewImage(){
  const image = document.querySelector('#image');
  const imgPreview = document.querySelector('.img-preview')

  imgPreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);

  oFReader.onload = function(oFREvent){
    imgPreview.src = oFREvent.target.result;
  }
}
 </script>







@endsection

