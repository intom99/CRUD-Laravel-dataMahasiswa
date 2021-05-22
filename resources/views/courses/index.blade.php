@extends('layout.main')

@section('title', 'Courses')


@section('container')
<div class="container">
    <div class="row">
        <div class="col">
            
            <div class="card mt-4">
                <div class="card-body">
                 <a href="" class="btn btn-primary mb-3">+ Tambah</a>

                  
                                   
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

                         <th scope="row">2</th>
                         <td>{{$row->no_course}}</td>
                         <td>{{$row->course_name}}</td>
                         <td>{{$row->sks}}</td>
                         <td>{{$row->semester}}</td>
                          
                         <td>
                             <a href="" class="btn btn-primary">Edit</a>
                             <a href="" class="btn btn-danger">Delete</a>
                         </td>

                        </tr>
                         @endforeach
                        
                    
                    </tbody>
                  </table>



                </div>
              </div>

        </div>
    </div>
</div>
@endsection