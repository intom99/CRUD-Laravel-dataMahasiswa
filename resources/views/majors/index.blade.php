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
                                 
                                  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createData">
  <i class="bi bi-plus-lg"></i>  Create
</button>

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

@if(!empty($majors))
                                   
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

                          <th scope="row">{{ ($majors ->currentpage()-1) * $majors ->perpage() + $loop->index + 1 }}</th>
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
                  @else
                  <p>data not available</p>
                  @endif
                  {{-- end of table --}}

                    <div class="table-nav">
                      <hr>
                           <div class="count-data">
                              <strong> Count : {{$major_count}}</strong>
                            </div>
                            <div class="paging">
                                {{$majors->links()}}
                            </div>
                    </div>
                    {{-- end of table-nav --}}

                </div>
                {{-- end of card-body --}}
              </div>
              {{-- end of cart --}}

        </div>
    </div>
</div>
@endsection


<!-- Modal Create Data-->
<div class="modal fade" id="createData" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="createDataLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createDataLabel">Create Data Major</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{action('MajorsController@store')}}">
          @csrf
          <div class="form-group">
            <label>Major Code</label>
            <input type="text" name="major_code" class="form-control @error('major_code') is-invalid @enderror" value="{{old('major_code')}}" placeholder="input code">
            @error('major_code') <div class="invalid-feedback">{{$message}}</div>@enderror
          </div>
          <div class="form-group">
            <label>Major Name</label>
            <input type="text" name="major_name" class="form-control @error('major_name') is-invalid @enderror" value="{{old('major_name')}}" placeholder="input name">
            @error('major_name') <div class="invalid-feedback">{{$message}}</div>@enderror
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