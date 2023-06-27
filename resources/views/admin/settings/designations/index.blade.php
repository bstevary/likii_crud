@extends('layouts.app')
@section('header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <a href="{{route('home')}}" class="tn btn-primary btn-sm">Back to Home </a>
                <h5>Designations</h5>
            </div>
            <div class="col-md-3">
             <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModalLong">
                    Add Designation
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <form action="POST" class="modal-dialog" role="document">
                        @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Designation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Designation</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              
                              </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="table-responsive">
            @if($designations->count())
            <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($designations as $designation)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$designation->name}}</td>
                    <td>{{$designation->description}}</td>
                    <td>
   <!-- Button trigger modal -->
   <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$designation->id}}">
    Edit
</button>

<!-- Modal -->
<div class="modal fade" id="edit{{$designation->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <form action="POST" class="modal-dialog" role="document">
        @csrf
        @method('PATCH')
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Designation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Designation</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              
              </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
        </div>
    </div>
    </div>
</div>
   <!-- Button trigger modal -->
   <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#exampleModalLong">
    dELETE
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <form action="POST" class="modal-dialog" role="document">
        @csrf
        @method('DELETE')
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
           Are you sure you would like to delete,<b>{{$designation->name}}</b>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
        </div>
    </div>
    </div>
</div>
                    </td>
                  </tr>
                   @endforeach
                </tbody>
              </table>
            @else
              Not added yet
            @endif
        </div>
    </div>
@endsection