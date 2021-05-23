@extends('layout.main')

@section('title', 'Majors')


@section('container')
<div class="container">
    <div class="row mt-4">
        <div class="col-8">
            <h1><i class="bi bi-award"></i> Majors</h1>
        </div>
        <div class="col-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white">
                  <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Majors</li>
                </ol>
              </nav>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
           
            <div class="card">
                <div class="card-body">
                 <a href="" class="btn btn-primary mb-3"><i class="bi bi-plus-lg"></i> Create</a>               
                                   
                  <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">No Major</th>
                        <th scope="col">Major Name</th>
                                                <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($majors as $row)
                        <tr>

                         <th scope="row">{{$loop->iteration}}</th>
                         <td>{{$row->major_code}}</td>
                         <td>{{$row->major_name}}</td>
                         
                          
                         <td>
                             <a href="" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                             <a href="" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</a>
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