@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">User Profile</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
            <li class="breadcrumb-item active">User list</li>
            <li class="breadcrumb-item active">User Profile</li>
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
                            <h3 class="card-title">Update User</h3>
                            <a href="{{route('user.index')}}" class="btn btn-primary">Back to user list</a>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-lg-9">
                        <div class="card card-primary ">
                          <!-- form start -->
                          <form action="{{route('user.profile.update',[$user->id])}}" method="POST" enctype="multipart/form-data">
                           @csrf
                            <div class="card-body">
                              <div class="row">
                                <div class="col-6">
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
                                </div>
                                <div class="col-6">
                                  <div class="form-group">
                                    <label for="exampleInputFile">User Photo</label>
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="description">Description</label>
                                      <textarea name="description" id="description" placeholder="Description" class="form-control" cols="50" rows="5">{{$user->description}}</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- /.card-body -->
                                  @if (Session::has('success'))
                                      <div class="alert alert-success">
                                        {{Session::get('success')}}
                                      </div>
                                  @endif
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
                              <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                          </form>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="card text-center">
                            <div style="width: 250px; height:250px;" class="mb-5 m-auto p-2" >
                              <img src="@if ($user->image)
                              {{asset($user->image)}}
                              @else
                              {{asset('web')}}/images/user.png
                            @endif" class="img-fluid rounded-circle image-rounded" alt="">
                            </div>
                            <div class="mt-5">
                              <h5>{{$user->name}}</h5>
                              <p>{{$user->email}}</p>
                            </div>
                        </div>
                      </div>
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