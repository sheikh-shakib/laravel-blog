@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tag list</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
            <li class="breadcrumb-item active">Tag list</li>
            <li class="breadcrumb-item active">Create Tag</li>
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
                            <h3 class="card-title">Create Tag</h3>
                            <a href="{{route('tag.index')}}" class="btn btn-primary">Back to tag list</a>
                        </div>
                        </div>
                    </div>
                    <div class="card card-primary ">
                        <!-- form start -->
                        <form action="{{route('tag.update',[$tag->id])}}" method="POST">
                         @csrf
                         @method('PUT')
                          <div class="card-body">
                            <div class="form-group">
                              <label for="name">tag Name</label>
                            <input type="name" class="form-control" id="name" name="name" placeholder="Enter tag Name" value="{{$tag->name}}">
                            </div>
                            <div class="form-group">
                              <label for="description">Description</label>
                                <textarea name="description" id="" placeholder="Description" class="form-control" cols="50" rows="5">{{$tag->description}}</textarea>
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