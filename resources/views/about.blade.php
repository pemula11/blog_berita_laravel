@extends('layout.main')
@section('container')

    <h1> Halaman About</h1>
    <h3>{{ $name }} </h3>
    <h3>{{ $email }}</h3>
    <h3><img src="img/{{ $img }}" alt="" srcset="" width="200" class="img-thumbnail rounded-circle"></h3>

@endsection