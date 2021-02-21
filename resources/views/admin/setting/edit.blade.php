@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Setting</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
            <li class="breadcrumb-item active">Setting</li>
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
                            <h3 class="card-title">Setting</h3>
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
                        <form action="{{route('setting.update',[$setting->id])}}" method="POST" enctype="multipart/form-data">
                         @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label for="name">Site Name</label>
                            <input type="name" class="form-control" id="name" name="name" placeholder="Enter Site Name" value="{{$setting->name}}">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="facebook">Facebook</label>
                                      <input type="Facebook" class="form-control" id="facebook" name="facebook" placeholder="Facebook Url" value="{{$setting->facebook}}">
                                      </div>
                                      <div class="form-group">
                                        <label for="twitter">Twitter</label>
                                      <input type="twitter" class="form-control" id="twitter" name="twitter" placeholder="twitter Url" value="{{$setting->twitter}}">
                                      </div>
                                      <div class="form-group">
                                        <label for="instagram">Instagram</label>
                                      <input type="instagram" class="form-control" id="instagram" name="instagram" placeholder="instagram Url" value="{{$setting->instagram}}">
                                      </div>
                                      <div class="form-group">
                                        <label for="phone">Phone</label>
                                      <input type="phone" class="form-control" id="phone" name="phone" placeholder="phone" value="{{$setting->phone}}">
                                      </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="reddit">Reddit</label>
                                      <input type="reddit" class="form-control" id="reddit" name="reddit" placeholder="reddit Url" value="{{$setting->reddit}}">
                                      </div>
                                      <div class="form-group">
                                        <label for="email">Email</label>
                                      <input type="email" class="form-control" id="email" name="email" placeholder="email Url" value="{{$setting->email}}">
                                      </div>
                                      <div class="form-group">
                                        <label for="copyright">Copyright</label>
                                      <input type="text" class="form-control" id="copyright" name="copyright" placeholder="copyright Url" value="{{$setting->copyright}}">
                                      </div>
                                      <div class="form-group">
                                        <label for="address">Address</label>
                                     <textarea name="address" id="address" class="form-control" placeholder="Enter address" rows="1">{{$setting->address}}</textarea>
                                      </div>
                                     
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-10">
                                    <div style="margin-top: 25px" class="custom-file">
                                        <input type="file" class="custom-file-input" name="site_logo" id="customFile">
                                        <label class="custom-file-label" for="customFile">Site Logo</label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div style="max-width: 100px; margin-left:auto; max-height:100px; overflow:hidden ">
                                        <img src="{{asset($setting->site_logo)}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="about_site">About</label>
                                <textarea name="about_site" id="about_site" placeholder="About Site" class="form-control" cols="50" rows="5">{{$setting->about_site}}</textarea>
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
                            <button type="submit" class="btn btn-primary">Update Setting</button>
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
{{-- <script>
  $('#description').summernote({
      placeholder: 'Description',
      tabsize: 2,
      height: 200
  });
</script> --}}
@endsection