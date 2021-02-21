@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Post list</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
            <li class="breadcrumb-item active">Post list</li>
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
                        <h3 class="card-title">Post list</h3>
                        <a href="{{route('post.create')}}" class="btn btn-primary">Add Post</a>
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
                  <div class="mt-2 col-md-12">
                    <div class="pagination">
                      {{ $posts->links() }}
                  </div>
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