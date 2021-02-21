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
                        <h3 class="card-title">User list</h3>
                        <a href="{{route('user.create')}}" class="btn btn-primary">Add User</a>
                      </div>
                      </div>
                </div>
                <!-- /.card-header -->
                @if ($users->count())
                  <div class="card-body p-0">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Image</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th style="width: 40px">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>
                              <div style="max-width: 50px; max-height:50px; overflow:hidden ">
                                <img src="@if ($user->image)
                                {{asset($user->image)}}
                                @else
                                {{asset('web')}}/images/user.png
                              @endif" alt="" class="img-fluid">
                              </div>
                            </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td class="d-flex">
                              <a href="{{route('user.edit',[$user->id])}}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
                              <a href="{{route('user.show',[$user->id])}}" class="btn btn-sm btn-success mr-1"><i class="fas fa-eye"></i></a>
                              <form action="{{route('user.destroy',[$user->id])}}" method="POST" >
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
                      {{ $users->links() }}
                  </div>
                  </div>
                  @else
                  <tr>
                    <td colspan="5">
                        <h5 class="mx-auto">No Users Found</h5>
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