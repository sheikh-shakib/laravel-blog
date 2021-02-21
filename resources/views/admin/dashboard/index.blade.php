@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<div class="row mr-2 ml-2">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$postcount}}</h3>

          <p>Post Count </p>
        </div>
        <div class="icon">
          <i class="fas fa-file-alt"></i>
        </div>
        
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{$categorycount}}</h3>

          <p>Category Count</p>
        </div>
        <div class="icon">
          <i class="fas fa-tags"></i>
        </div>
        
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{$usercount}}</h3>

          <p>User Count</p>
        </div>
        <div class="icon">
          <i class="fas fa-user"></i>
        </div>
        
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{$tagcount}}</h3>

          <p>Tag Count</p>
        </div>
        <div class="icon">
          <i class="fas fa-tag"></i>
        </div>
        
      </div>
    </div>
    <!-- ./col -->
  </div>
  <div class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="col-lg-12">
                    <div class="card-header">
                      <div class="d-flex justify-content-between">
                        <h3 class="card-title">Latest Post</h3>
                        <a href="{{route('post.index')}}" class="btn btn-primary">Post List</a>
                      </div>
                      </div>
                </div>
                <!-- /.card-header -->
                @if ($posts->count())
                  <div class="card-body p-0">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Image</th>
                          <th>Post Title</th>
                          <th>Author</th>
                          <th>Category</th>
                          <th>Tags</th>
                          <th style="width: 40px">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>
                              <div style="max-width: 50px; max-height:50px; overflow:hidden ">
                                <img src="{{asset($post->image)}}" alt="" class="img-fluid">
                              </div>
                            </td>
                            <td class="">{{$post->title}}</td>
                            <td>{{$post->user->name}}</td>
                            <td>{{$post->category->name}}</td>
                            <td>@foreach ($post->tags as $tag)
                                <span class="badge badge-primary">{{$tag->name}}</span>
                            @endforeach</td>
                            <td class="d-flex">
                              <a href="{{route('post.edit',[$post->id])}}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
                              <a href="{{route('post.show',[$post->id])}}" class="btn btn-sm btn-success mr-1"><i class="fas fa-eye"></i></a>
                              <form action="{{route('post.destroy',[$post->id])}}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                              </form>
                            </td> 
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  @else
                  <tr>
                    <td colspan="5">
                        <h5 class="mx-auto">No posts Found</h5>
                    </td>
                </tr>
                @endif
               
                <!-- /.card-body -->
              </div>
        </div>
        <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

@endsection