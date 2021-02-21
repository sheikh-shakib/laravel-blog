
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin Panel</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('admin')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin')}}/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @yield('style')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->

    <!-- SEARCH FORM -->
            <!-- Message End -->
            <!-- Message End -->
      <!-- Notifications Dropdown Menu -->
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{asset('admin')}}/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('web')}}/images/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('dashboard')}}" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>
        <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
                      with font-awesome or any other icon font library -->
                  <li class="nav-item has-treeview menu-open">
                    <a href="{{route('dashboard')}}" class="nav-link {{ (request()->is('admin-login/dashboard')) ? 'active' : '' }}">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                        Dashboard
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('category.index')}}" class="nav-link {{ (request()->is('admin-login/category*')) ? 'active' : '' }}">
                      <i class="nav-icon fas fa-tags"></i>
                      <p>
                        Categories
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('tag.index')}}" class="nav-link {{ (request()->is('admin-login/tag*')) ? 'active' : '' }}">
                      <i class="nav-icon fas fa-tag"></i>
                      <p>
                        Tags
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('post.index')}}" class="nav-link {{ (request()->is('admin-login/post*')) ? 'active' : '' }}">
                      <i class="nav-icon fas fa-file-alt"></i>
                      <p>
                        Posts
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('contact.index')}}" class="nav-link {{ (request()->is('admin-login/contact*')) ? 'active' : '' }}">
                      <i class="nav-icon far fa-envelope"></i>
                      <p>
                        Messages
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('user.index')}}" class="nav-link {{ (request()->is('admin-login/user*')) ? 'active' : '' }}">
                      <i class="nav-icon fas fa-user"></i>
                      <p>
                        User
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('setting.index')}}" class="nav-link {{ (request()->is('admin-login/setting*')) ? 'active' : '' }}">
                      <i class="nav-icon fas fa-cog"></i>
                      <p>
                        Setting
                      </p>
                    </a>
                  </li>
                  <li class="nav-header">My Account</li>
                  <li class="nav-item">
                    <a href="{{route('user.profile')}}" class="nav-link {{ (request()->is('admin-login/profile*')) ? 'active' : '' }}">
                      <i class="nav-icon far fa-user"></i>
                      <p>
                        My Profile
                      </p>
                    </a>
                  </li>
                  <li class="nav-item mt-auto">
                    <a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link" >
                      
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                      <i class="nav-icon fas fa-sign-out-alt"></i>
                      <p>Log out</p> 
                    </a>
                </li>
                  <li class="text-center mt-5 ">
                    <a class="btn btn-primary" href="{{route('index')}}" class="nav-link" target="_blank" >
                      <p class="m-0">View Site</p> 
                    </a>
                </li>
                </ul>
              </nav>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      @yield('content')

  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('admin')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin')}}/js/adminlte.min.js"></script>
<script src="{{asset('admin')}}/js/bs-custom-file-input.min.js"></script>
<script>
  $(document).ready(function () {
  bsCustomFileInput.init()
})
</script>
@yield('script')
</body>
</html>
