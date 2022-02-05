@extends('layout.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-md-5">

    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if(session()->has('logineror'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session('logineror') }}</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <main class="form-signin">
    <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>
  <form action="/login" method="post">
    @csrf 
    <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">

    <div class="form-floating">
      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" autofocus required placeholder="name@example.com" >
      <label for="email">Email address</label>
      @error('email') 
      <div class="invalid-feedback">
        {{ $message }}
      </div> 
      @enderror
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" id="password" required placeholder="Password">
      <label for="password">Password</label>
    </div>

    
    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
     </form>
     <small class="d-block text-center mt-3"> Belum punya akun? <a href="/register"> Daftar akun</a> </small>
</main>
    </div>
</div>



@endsection