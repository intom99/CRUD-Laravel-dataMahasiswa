@extends('layout.main')

@section('title', 'Courses')


@section('container')
<div class="container">
    <div class="row mt-4">
        <div class="col-8">
            <h1><i class="bi bi-bookmark-fill"></i> Course</h1>
        </div>
        <div class="col-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white">
                  <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Courses</li>
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
@if(!empty($courses))             
                  <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">No Course</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">SKS</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $row)
                        <tr>

                         <th scope="row">{{ ($courses ->currentpage()-1) * $courses ->perpage() + $loop->index + 1 }}</th>
                         <td>{{$row->no_course}}</td>
                         <td>{{$row->course_name}}</td>
                         <td>{{$row->sks}}</td>
                         <td>{{$row->semester}}</td>
                          
                         <td>
                          <button type="button" class="btn btn-primary mr-3" data-toggle="modal" data-target="#editData">
                            <i class="bi bi-pencil-square"></i> Edit
                          </button>
                             
                             <a href="" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</a>
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
                      <strong> Count : {{$course_count}}</strong>
                    </div>
                    <div class="paging">
                      {{$courses->links()}}
                    </div>
                  </div>

                 

                </div>
              </div>

        </div>
    </div>
</div>
@endsection




<!-- Modal Create Data-->
<div class="modal fade" id="createData" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="createDataLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createDataLabel">Create Data Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{action('CoursesController@store')}}">
          @csrf
          <div class="form-group">
            <label>No. Course</label>
            <input type="text" name="no_course" class="form-control @error('no_course') is-invalid @enderror" value="{{old('no_course')}}" placeholder="input no course">
            @error('no_course') <div class="invalid-feedback">{{$message}}</div>@enderror
          </div>
          <div class="form-group">
            <label>Course Name</label>
            <input type="text" name="course_name" class="form-control @error('course_name') is-invalid @enderror" value="{{old('course_name')}}" placeholder="input course name">
            @error('course_name') <div class="invalid-feedback">{{$message}}</div>@enderror
          </div>
          <div class="form-group">
            <label>SKS</label>
            <input type="text" name="sks" class="form-control" placeholder="input sks">
          </div>
          <div class="form-group">
            <label>Semester</label>
            <input type="text" name="semester" class="form-control" placeholder="input semester">
          </div>    
         
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Data-->
<div class="modal fade" id="editData" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editDataLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editDataLabel">Edit Course Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{action('CoursesController@store')}}">
          @csrf
          <div class="form-group">
            <label>No. Course</label>
            <input type="text" name="no_course" class="form-control @error('no_course') is-invalid @enderror" value="{{old('no_course')}}" placeholder="input no course">
            @error('no_course') <div class="invalid-feedback">{{$message}}</div>@enderror
          </div>
          <div class="form-group">
            <label>Course Name</label>
            <input type="text" name="course_name" class="form-control @error('course_name') is-invalid @enderror" value="{{old('course_name')}}" placeholder="input course name">
            @error('course_name') <div class="invalid-feedback">{{$message}}</div>@enderror
          </div>
          <div class="form-group">
            <label>SKS</label>
            <input type="text" name="sks" class="form-control" placeholder="input sks">
          </div>
          <div class="form-group">
            <label>Semester</label>
            <input type="text" name="semester" class="form-control" placeholder="input semester">
          </div>    
         
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </form>
      </div>
    </div>
  </div>
</div>