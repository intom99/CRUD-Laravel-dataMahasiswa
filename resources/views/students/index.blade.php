@extends('layout.main')

@section('title', 'Courses')


@section('container')
<div class="container">
    <div class="row mt-4">
        <div class="col-8">
            <h1><i class="bi bi-user"></i> Student</h1>
        </div>
        <div class="col-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white">
                  <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Students</li>
                </ol>
              </nav>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
           
            <div class="card">
                <div class="card-body">
                 {{-- <a href="" class="btn btn-primary mb-3"><i class="bi bi-plus-lg"></i> Create</a>   --}}
                 
                 <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createData">
  <i class="bi bi-plus-lg"></i>  Create
</button>

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

                

                </div>
              </div>

        </div>
    </div>
</div>
@endsection