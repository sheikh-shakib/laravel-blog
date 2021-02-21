@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">User list</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
            <li class="breadcrumb-item active">User list</li>
            <li class="breadcrumb-item active">Create User</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
    <div class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="col-lg-12">
                        <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Create User</h3>
                            <a href="{{route('user.index')}}" class="btn btn-primary">Back to user list</a>
                        </div>
                        </div>
                    </div>
                    <div class="card card-primary ">
                        <!-- form start -->
                        <form action="{{route('user.update',[$user->id])}}" method="POST">
                         @csrf
                         @method('PUT')
                          <div class="card-body">
                            <div class="form-group">
                              <label for="name">User Name</label>
                            <input type="name" class="form-control" id="name" name="name" placeholder="Enter user Name" value="{{$user->name}}">
                            </div>
                            <div class="form-group">
                                <label for="email">User Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter User Email" value="{{$user->email}}" >
                              </div>
                              <div class="form-group">
                                <label for="password">User Password <small>(enter password if you want to change)</small></label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter User Password">
                              </div>
                            {{-- <div class="form-group">
                              <label for="description">Description</label>
                                <textarea name="description" id="description" placeholder="Description" class="form-control" cols="50" rows="5">{{$user->description}}</textarea>
                            </div> --}}
                          </div>
                          <!-- /.card-body -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                      </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection