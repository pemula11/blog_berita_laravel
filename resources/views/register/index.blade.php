@extends('layout.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-5">
    <main class="form-register">
    <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
  <form action="/register" method="post"> 
      @csrf
    <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">

    <div class="form-floating">
      <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" required value="{{ old('name') }}" placeholder="Jhon xina">
      <label for="name">Name</label>
      @error('name')
      <div id="validationServer03Feedback" class="invalid-feedback">
      {{ $message }}.
      </div>
      @enderror
    </div>
    <div class="form-floating">
      <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" required value="{{ old('username') }}" placeholder="Username">
      <label for="username">username</label>
      @error('username')
      <div id="validationServer03Feedback" class="invalid-feedback">
      {{ $message }}.
      </div>
      @enderror
    </div>
    <div class="form-floating">
      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" required value="{{ old('email') }}" placeholder="name@example.com">
      <label for="email">Email address</label>
      @error('email')
      <div id="validationServer03Feedback" class="invalid-feedback">
      {{ $message }}.
      </div>
      @enderror
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control rounded-buttom @error('password') is-invalid @enderror" id="password" required placeholder="Password">
      <label for="password">Password</label>
      @error('password')
      <div id="validationServer03Feedback" class="invalid-feedback">
      {{ $message }}.
      </div>
      @enderror
    </div>

    
    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
     </form>
     <small class="d-block text-center mt-3"> sudah punya akun? <a href="/login"> Login</a> </small>
</main>
    </div>
</div>




@endsection