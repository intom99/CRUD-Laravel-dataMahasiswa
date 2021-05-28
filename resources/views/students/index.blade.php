@extends('layout.main')

@section('title', 'Student')


@section('container')
<div class="container">
    <div class="row mt-4">
        <div class="col-8">
            <h1><i class="bi bi-person-fill"></i> Student</h1>
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
                
                 <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" title="create" data-toggle="modal" data-target="#createData">
  <i class="bi bi-plus-lg"></i>  Create
</button>

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
@if(!empty($students))  
<table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">NIM</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
        <th scope="col">Major</th>
        <th scope="col">Course</th>
                                <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($students as $row)
        <tr>

          <th scope="row">{{ ($students ->currentpage()-1) * $students ->perpage() + $loop->index + 1 }}</th>
         <td>{{$row->nim}}</td>
         <td>{{$row->name}}</td>
         <td>{{$row->email}}</td>
         <td>{{$row->address}}</td>
         <td>{{$row->major->major_name}}</td>
         <td>{{$row->course->course_name}}</td>
         
         
          
         <td>
             <a href="" class="btn btn-primary mr-2" title="Edit"><i class="bi bi-pencil-square"></i></a>
           

             <form action="{{action('StudentsController@destroy', $row->id)}}" method="post" class="d-inline">
              @method('delete')
              @csrf
               <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
             </form>
         </td>

        </tr>
         @endforeach
        
    
    </tbody>
  </table>
  @else
  <p>data not available</p>
  @endif
  {{-- end of table --}}

    <div class="table-nav">
      <hr>
           <div class="count-data">
              <strong> Count : {{$student_count}}</strong>
            </div>
            <div class="paging">
                {{$students->links()}}
            </div>
    </div>
    {{-- end of table-nav --}}
                

                </div>
              </div>

        </div>
    </div>
</div>
@endsection