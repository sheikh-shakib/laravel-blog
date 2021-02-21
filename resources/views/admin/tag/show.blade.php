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
                        <h3 class="card-title">Tag list</h3>
                        <a href="{{route('tag.create')}}" class="btn btn-primary">Add Tag</a>
                      </div>
                      </div>
                </div>
                <!-- /.card-header -->
                @if ($tag->count())
                    <div class="card-body p-0">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Post Count</th>
                            <th style="width: 40px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$tag->id}}</td>
                                <td>{{$tag->name}}</td>
                                <td>{{$tag->slug}}</td>
                                <td>{{$tag->id}}</td>
                                <td class="d-flex">
                                <a href="{{route('tag.edit',[$tag->id])}}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
                                <form action="{{route('tag.destroy',[$tag->id])}}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                                </td> 
                            </tr>
                        </tbody>
                        </table>
                    </div>
                  <!-- /.card-body -->
                </div>
                @else
                    <tr>
                        <td colspan="5">
                            <h5>No Tags Found</h5>
                        </td>
                    </tr>
                @endif
            </div>   
        </div>   
        <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection