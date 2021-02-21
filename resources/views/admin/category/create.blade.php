@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Category list</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
            <li class="breadcrumb-item active">Category list</li>
            <li class="breadcrumb-item active">Create Category</li>
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
                            <h3 class="card-title">Create Category</h3>
                            <a href="{{route('category.index')}}" class="btn btn-primary">Back to category list</a>
                        </div>
                        </div>
                    </div>
                    <div class="card card-primary ">
                        <!-- form start -->
                        <form action="{{route('category.store')}}" method="POST">
                         @csrf
                          <div class="card-body">
                              @if (Session::has('success'))
                              <div class="alert alert-success">
                                {{Session::get('success')}}
                              </div>
                              @endif
                            <div class="form-group">
                              <label for="name">Category Name</label>
                              <input type="name" class="form-control" id="name" name="name" placeholder="Enter Category Name">
                            </div>
                            <div class="form-group">
                              <label for="description">Description</label>
                                <textarea name="description" id="" placeholder="Description" class="form-control" cols="50" rows="5"></textarea>
                            </div>
                          </div>
                          <!-- /.card-body -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ 'Name field is required ' }}</li>
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