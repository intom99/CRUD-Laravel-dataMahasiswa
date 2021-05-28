@extends('layout.main')

@section('title','Detail Student')
    
@section('container')

<div class="container">
    <div class="row mt-4">
        <div class="col-8">
            <h1><i class="bi bi-person-fill"></i> Detail Student</h1>
        </div>
        <div class="col-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white">
                  <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/students')}}">Students</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
              </nav>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <a href="{{url('/students')}}" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left"></i> Back</a>
                    <a href="" class="btn btn-primary mb-3"><i class="bi bi-pencil-square"></i> Edit</a>
                    <table class="table table-bordered">
                       
                        
                          <tr>
                            <th scope="row">NIM</th>
                            <td>{{$student->nim}}</td>   
                          </tr>
                          <tr>
                            <th scope="row">Name</th>
                            <td>{{$student->name}}</td>   
                          </tr>
                          <tr>
                            <th scope="row">Email</th>
                            <td>{{$student->email}}</td>   
                          </tr>
                          <tr>
                            <th scope="row">Address</th>
                            <td>{{$student->address}}</td>   
                          </tr>
                          <tr>
                            <th scope="row">Major</th>
                            <td>{{$student->major->major_name}}</td>   
                          </tr>
                          <tr>
                            <th scope="row">Course</th>
                            <td>{{$student->course->course_name}}</td>   
                          </tr>   
                      </table>

                </div>
            </div>
        </div>
    </div>
</div>
    

@endsection