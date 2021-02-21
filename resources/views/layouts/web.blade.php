<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Mini Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="../../css.css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('web')}}/fonts/icomoon/style.css">
    <link rel="stylesheet" href="{{asset('web')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('web')}}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('web')}}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('web')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('web')}}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('web')}}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{asset('web')}}/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="{{asset('web')}}/css/aos.css">

    <link rel="stylesheet" href="{{asset('web')}}/css/style.css">
    <style>
      .pagination{
        margin-bottom: 0px;
      }
    </style>
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar" role="banner">
      <div class="container-fluid">
        <div class="row align-items-center">
          
          <div class="col-12 search-form-wrap js-search-form">
            <form method="get" action="#">
              <input type="text" id="s" class="form-control" placeholder="Search...">
              <button class="search-btn" type="submit"><span class="icon-search"></span></button>
            </form>
          </div>

          <div class="col-4 site-logo">
            <a href="{{route('index')}}" class="text-black h2 mb-0">Shakib's Blog</a>
          </div>

          <div class="col-8 text-right">
            <nav class="site-navigation" role="navigation">
              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
                @foreach ($categories as $category)
                  <li><a href="{{route('web.category',['slug'=>$category->slug])}}">{{$category->name}}</a></li> 
                @endforeach
                <li class="d-none d-lg-inline-block"><a href="#" class="js-search-toggle"><span class="icon-search"></span></a></li>
              </ul>
            </nav>
            <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a></div>
          </div>

      </div>
    </header>
    
    @yield('content')
    
    
    <div class="site-footer">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4">
            <h3 class="footer-heading mb-4">About Us</h3>
            <p>{{$setting->about_site}}</p>
          </div>
          <div class="col-md-3 ml-auto">
            <!-- <h3 class="footer-heading mb-4">Navigation</h3> -->
            <ul class="list-unstyled float-left mr-5">
              <li><a href="{{route('index')}}">Home</a></li>
              <li><a href="{{route('web.about')}}">About Us</a></li>
              <li><a href="{{route('web.contact')}}">Contact Us</a></li>
            </ul>
            <ul class="list-unstyled float-left">
              @foreach ($categories as $category)
                <li><a href="{{route('web.category',['slug'=>$category->slug])}}">{{$category->name}}</a></li>
              @endforeach
            </ul>
          </div>
          <div class="col-md-4">
            

            <div>
              <h3 class="footer-heading mb-4">Connect With Us</h3>
              <p>
                <a target="_blank" href="@if($setting->facebook){{$setting->facebook}} @endif"><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                <a target="_blank" href="@if($setting->twitter){{$setting->twitter}}@endif"><span class="icon-twitter p-2"></span></a>
                <a target="_blank" href="@if($setting->instagram) {{$setting->instagram }}@endif"><span class="icon-instagram p-2"></span></a>
                <a target="_blank" href="@if($setting->reddit){{$setting->reddit}}@endif"><span class="icon-rss p-2"></span></a>
                <a target="_blank" href="@if($setting->email){{$setting->email}}@endif"><span class="icon-envelope p-2"></span></a>
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              {{$setting->copyright}} This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
          </div>
        </div>
      </div>
    </div>
    
  </div>

  <script src="{{asset('web')}}/js/jquery-3.3.1.min.js"></script>
  <script src="{{asset('web')}}/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="{{asset('web')}}/js/jquery-ui.js"></script>
  <script src="{{asset('web')}}/js/popper.min.js"></script>
  <script src="{{asset('web')}}/js/bootstrap.min.js"></script>
  <script src="{{asset('web')}}/js/owl.carousel.min.js"></script>
  <script src="{{asset('web')}}/js/jquery.stellar.min.js"></script>
  <script src="{{asset('web')}}/js/jquery.countdown.min.js"></script>
  <script src="{{asset('web')}}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{asset('web')}}/js/bootstrap-datepicker.min.js"></script>
  <script src="{{asset('web')}}/js/aos.js"></script>

  <script src="{{asset('web')}}/js/main.js"></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="../../gtag/js.js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
 @yield('script')   
  </body>
</html>