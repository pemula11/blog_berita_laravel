@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Post Categories, {{ auth()->user()->name }} </h1>
        
    </div>

    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show col-lg-6" role="alert">
        <strong>{{ session('success') }}</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

<div class="table-responsive col-lg-6">
    <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create New Category</a>
        <table class="table table-striped table-sm">
          <thead>

              <tr>
                  <th scope="col">#</th>
                  <th scope="col">Category Name</th>
                  <th scope="col">Action</th>
              </tr>
       
          </thead>
          <tbody>
          @foreach($categories as $cat)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $cat->name }}</td>
              <td> 
                  
                <a href="/dashboard/categories/{{ $cat->slug }}/edit" class="badge bg-warning">
                    <span data-feather="edit"></span> 
                </a>    
                <form action="/dashboard/categories/{{ $cat->id }}" class="d-inline" method="post">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('yakin hapus data?')"> 
                        
                        <span data-feather="x-circle"></span> 
                        
                    </button>
                </form>
                 
                 
               </td>
              
            </tr>
        @endforeach
          </tbody>
        </table>
      </div>
@endsection

