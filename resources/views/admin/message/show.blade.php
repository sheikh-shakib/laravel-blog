@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">View Message</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
            <li class="breadcrumb-item active">View Message</li>
            <li class="breadcrumb-item active">View Message</li>
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
                            <h3 class="card-title">View Message</h3>
                            <a href="{{route('contact.index')}}" class="btn btn-primary">Back to message list</a>
                        </div>
                        </div>
                    </div>
                        <!-- form start -->
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 200px">Name</th>
                                <td>
                                    {{$contact->name}}
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 200px">Email</th>
                                <td>
                                    {{$contact->email}}
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 200px">Subject</th>
                                <td>
                                    {{$contact->subject}}
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 200px">Message</th>
                                <td>
                                    {{$contact->message}}
                                </td>
                            </tr>
                        </table>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col-md-6 -->
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    </div>
@endsection