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
            <li class="breadcrumb-item active">Create Post</li>
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
                            <h3 class="card-title">Create Post</h3>
                            <a href="{{route('post.index')}}" class="btn btn-primary">Back to post list</a>
                        </div>
                        </div>
                    </div>
                    <div class="card card-primary ">
                        @if (Session::has('msg'))
                        <div class="alert alert-success">
                            {{Session::get('msg')}}
                        </div>
                        @endif
                        <!-- form start -->
                        <form action="{{route('post.update',[$post->id])}}" method="POST" enctype="multipart/form-data">
                         @csrf
                         @method('PUT')
                          <div class="card-body">
                            <div class="form-group">
                              <label for="name">Post Title</label>
                            <input type="name" class="form-control" id="name" name="title" placeholder="Enter post Name" value="{{$post->title}}">
                            </div>
                            <div class="row">
                                <div class="col-10">
                                    <div style="margin-top: 25px" class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose Image</label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div style="max-width: 100px; margin-left:auto; max-height:100px; overflow:hidden ">
                                        <img src="{{asset($post->image)}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Category Select</label>
                                <select name="category" class="custom-select">
                                @foreach ($categories as $category)
                                  <option  @if ($post->category_id==$category->id)selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                                </select>
                              </div>
                              <div class="form-group d-flex flex-wrap">
                                <label  style="margin-right: 10px">Tag Select:</label>
                                @foreach ($tags as $tag)
                                  <div class="custom-control custom-checkbox" style="margin-right: 20px">
                                    <input class="custom-control-input" type="checkbox" name="tags[]" id="tag{{$tag->name}}" value="{{$tag->id}}" @foreach ($post->tags as $t)
                                        @if ($tag->id == $t->id)
                                            checked
                                        @endif
                                    @endforeach>
                                    <label for="tag{{$tag->name}}" class="custom-control-label">{{$tag->name}}</label>
                                  </div>
                                @endforeach
                              </div>
                            <div class="form-group">
                              <label for="description">Description</label>
                                <textarea name="description" id="description" placeholder="Description" class="form-control" cols="50" rows="5">{{$post->description}}</textarea>
                            </div>
                          </div>
                          <!-- /.card-body -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
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
@section('style')
<link rel="stylesheet" href="{{asset('admin')}}/css/summernote-bs4.min.css">
@endsection

@section('script')
<script src="{{asset('admin')}}/js/summernote-bs4.min.js"></script>
<script>
  $('#description').summernote({
      placeholder: 'Hello Bootstrap 4',
      tabsize: 2,
      height: 200
  });
</script>
@endsection