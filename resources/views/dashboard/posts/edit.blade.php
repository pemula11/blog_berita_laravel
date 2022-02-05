@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Post</h1>
        
</div>

<div class="col-lg-8">

    <form method="post" class="mb-3" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data">
      @method('put') 
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" onkeyup="createTextSlug()" value="{{ old('title', $post->title) }}" required autofocus>
        @error('title')
        <div id="validationServer03Feedback" class="invalid-feedback">
          {{ $message }}.
        </div>
         @enderror
      </div>
      <div class="mb-3">
        <label for="slug" class="form-label">slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $post->slug) }}" readonly required>
        @error('slug')
        <div id="validationServer03Feedback" class="invalid-feedback">
          {{ $message }}.
        </div>
         @enderror
      </div>
      <div class="mb-3">
        <label for="category" class="form-label">Cateogry</label>
        <select class="form-select" name="category_id" id="">
            @foreach($categories as $cat) 
              @if(old('category_id', $post->category_id) == $cat->id)
                <option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>
              @else  
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
              @endif
            @endforeach
        </select>
      </div>


      <div class="mb-3">
        <label for="image" class="form-label">Choose Image</label>
        <input type="hidden" name="oldImage" value="{{ $post->image }}">
        @if($post->image)
        <img src="{{ asset('storage/'. $post->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
       
        @else
        <img class="img-preview img-fluid mb-3 col-sm-5">
       
        @endif
         <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" onchange="previewImage()">
        @error('image')
          <div class="invalid-feedback">
            {{ $message }}.
          </div>
         @enderror
      
      </div>

      <div class="mb-3">
        
        <label for="body" class="form-label">Body</label>
        @error('body')
        <p class="text-danger"> {{ $message }} </p>
        @enderror
        <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
        <trix-editor input="body"></trix-editor>
      </div>

      <button type="submit" class="btn btn-primary">Update Post</button>
    </form>


</div>

<script src=""> 
    // const title = document.querySelector('#title');
    // const slud = document.querySelector('#slug');

    // title.addEventListener('change', function(){
    //     fetch('/dashboard/posts/checkSlug?title=' + title/value)
    //         .then(Response => Response.json())
    //         .then(data => slug.value = data.slug)
    // });
 </script>

<script>
  const title =document.querySelector('#title'); 
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








<!-- 
<script>
    function createTextSlug()
    {
        var title = document.getElementById("title").value;
                    document.getElementById("slug").value = generateSlug(title);
    }
    function generateSlug(text)
    {
        return text.toString().toLowerCase()
            .replace(/^-+/, '')
            .replace(/-+$/, '')
            .replace(/\s+/g, '-')
            .replace(/\-\-+/g, '-')
            .replace(/[^\w\-]+/g, '');
    }

    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })
</script> -->
@endsection

