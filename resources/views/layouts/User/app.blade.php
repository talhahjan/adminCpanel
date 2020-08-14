<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ ('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ ('assets/img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title')


  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />


  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/material-dashboard.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
  <!-- custom style -->
  <link href="{{ asset('css/ui.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('Menu_files/sky-mega-menu.css')}}">
  <link rel="stylesheet" href="{{ asset('Menu_files/sky-mega-menu-black.css')}}">
  <!--[if lt IE 9]>
      <link rel="stylesheet" href="{{ asset('css/sky-mega-menu-ie8.css')}}">
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js') }}"></script>
    <![endif]-->

  <!--[if lt IE 10]>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js') }}"></script>
      <script src="js/jquery.placeholder.min.js') }}"</script>
    <![endif]-->

</head>

<body>


  <div class="wrapper" style="margin-right: auto;margin-left:auto;max-width: 996px;padding:0;position: relative;top: 0;height: 100%;border: solid 1px; #000">

    <!-- start navbar -->
    <nav class="navbar navbar-dark navbar-expand bg-dark text-light" style="heigh: 22px!important">
      <ul class="nav mr-md-auto">
        <li class="nav-item dropdown">
          <a href="#" class="nav-link pl-0 dropdown-toggle" data-toggle="dropdown"> USD </a>
          <ul class="dropdown-menu small">
            <li><a class="dropdown-item" href="#">EUR</a></li>
            <li><a class="dropdown-item" href="#">AED</a></li>
            <li><a class="dropdown-item" href="#">RUBL </a></li>
          </ul>
        </li>
      </ul>









      <ul class="nav">
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user-circle"></i> My Account </a> </a>
          <ul class="dropdown-menu small">
            <li><a class="dropdown-item" href="#">English</a></li>
            <li><a class="dropdown-item" href="#">Arabic</a></li>
            <li><a class="dropdown-item" href="#">Russian </a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-shopping-cart"></i> My Cart <span class="badge badge-pill badge-danger">1</span> </a>
          <ul class="dropdown-menu small">
            <li><a class="dropdown-item" href="#">English</a></li>
            <li><a class="dropdown-item" href="#">Arabic</a></li>
            <li><a class="dropdown-item" href="#">Russian </a></li>
          </ul>
        </li>
        <li class="nav-item"><a href="#" class="nav-link"> <i class="fa fa-heart"></i> Wishlist </a></li>

      </ul>
    </nav> <!-- nav .// -->


    <!-- End Navbar -->


    <!-- search bar start -->

    <div class="container-fluid search-bar">
      <div class="row d-flex d-flex justify-content-between align-items-center">



        <div class="col-6 col-md-3 order-1">
          <a href="http://bootstrap-ecommerce.com" class="logo flex-start">
            <img class="logo" src="images/logo.png">
          </a> <!-- brand-wrap.// -->
        </div>

        <div class="col-6 col-md-4 order-2 order-md-3">

          <div class="d-flex justify-content-end user-menu">
            <div class="widget-header">
              @if (!$User)
              <small class="font-weight-bold">Welcome Guest !</small>
              <div>
                <a href="{{ route('login') }}">{{ __('Log In') }}</a> <span class="dark-transp"> | </span>
                <a href="user/profile">Register</a>
              </div>
            </div>

            @else
            <small class="font-weight-bold">
              <img src="{{ Auth::user()->profile->avatar ? asset(Auth::user()->profile->avatar) : asset('assets/admin_img/user2-160x160.jpg') }}" alt="Circle Image" class="rounded-circle img-fluid" style="height: 40px;width:40px">
              {{ $User['profile']['first_name'].' '.$User['profile']['last_name']}} </small>
            <div>
              <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a> <span class="dark-transp"> | </span>
              <a href="user/profile">Profile</a>
            </div>
          </div>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
          @endif




        </div> <!-- widgets-wrap.// -->


      </div>

      <div class="col-12 col-md-5 order-3 order-md-2">

        <form action="#" class="search">
          <div class="input-group w-100">

            <select class="custom-select" name="category_name">
              <option value="">All type</option>
              <option value="codex">Special</option>
              <option value="comments">Only best</option>
              <option value="content">Latest</option>
            </select>

            <input type="text" class="form-control" style="width:60%;" placeholder="Search 100000+ Products">

            <div class="input-group-append">
              <button class="btn btn-primary" type="submit">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
        </form> <!-- search-wrap .end// -->
      </div>



    </div>
  </div>




  <!-- search bar end -->

  <!-- sky mega menu start -->


  <!-- mega menu -->
  <ul class="sky-mega-menu sky-mega-menu-anim-flip sky-mega-menu-response-to-icons">
    <!-- home -->
    <li>
      <a href="#"><i class="fa fa-home"></i>Home</a>
      <!--/ home -->
    </li>


    <li>
      <a href="#"><i class="fa fa-folder-open"></i>Categories</a>
      <!--/ home -->
    </li>


    <li>
      <a href="#"><i class="fa fa-shopping-cart"></i>My Cart</a>
      <!--/ home -->
    </li>



    <!-- aDVANCE SEARCH -->
    <li aria-haspopup="true" class="right">
      <a href="#_"><i class="fa fa-search"></i>Advance Search</a>
      <div class="grid-container6">
        <form action="#">
          <fieldset>
            <div class="row">
              <section class="col col-6">
                <label class="input">
                  <i class="fa fa-append fa-user"></i>
                  <input type="text" placeholder="Name">
                </label>
              </section>
              <section class="col col-6">
                <label class="input">
                  <i class="fa fa-append fa-envelope-o"></i>
                  <input type="email" placeholder="E-mail">
                </label>
              </section>
            </div>

            <section>
              <label class="input">
                <i class="fa fa-append fa-tag"></i>
                <input type="text" placeholder="Subject">
              </label>
            </section>

            <section>
              <label class="textarea">
                <i class="fa fa-append fa-comment"></i>
                <textarea rows="4" placeholder="Message"></textarea>
              </label>
            </section>

            <button type="submit" class="button">Send message</button>
          </fieldset>
        </form>
      </div>
    </li>
    <!--/ Advance Search -->





  </ul>
  <!--/ mega menu -->




  <!-- sky mega menu end -->

  @yield('content')






  <!-- ========================= FOOTER ========================= -->
  <footer class="section-footer border-top bg-dark text-light">
    <div class="container footer-top  footer-dark padding-y">
      <div class="row">
        <aside class="col-md col-6">
          <h5 class="">Information</h5>
          <ul class="list-unstyled">
            <li> <a href="#">About us</a></li>
            <li> <a href="#">Career</a></li>
            <li> <a href="#">Find a store</a></li>
            <li> <a href="#">Rules and terms</a></li>
            <li> <a href="#">Sitemap</a></li>
          </ul>
        </aside>
        <aside class="col-md col-6">
          <h5>My Account</h5>
          <ul class="list-unstyled">
            <li> <a href="#">Contact us</a></li>
            <li> <a href="#">Money refund</a></li>
            <li> <a href="#">Order status</a></li>
            <li> <a href="#">Shipping info</a></li>
            <li> <a href="#">Open dispute</a></li>
          </ul>
        </aside>
        <aside class="col-md-4 col-12">


          <p class="mb-2">Follow us on social media</p>

          <div class="social-btn">
            <a href="javascript:void()" class="btn-social btn-outline-facebook waves-effect waves-light m-1"><i class="fa fa-facebook"></i></a>
            <a href="javascript:void()" class="btn-social btn-outline-twitter waves-effect waves-light m-1"><i class="fa fa-twitter"></i></a>
            <a href="javascript:void()" class="btn-social btn-outline-google-plus waves-effect waves-light m-1"><i class="fa fa-google-plus"></i></a>
            <a href="javascript:void()" class="btn-social btn-outline-instagram waves-effect waves-light m-1"><i class="fa fa-instagram"></i></a>
          </div>

        </aside>
      </div> <!-- row.// -->

    </div><!-- //container -->
  </footer>
  <!-- ========================= FOOTER END // ========================= -->
  </div>



  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/custom.js') }}" </script> <script src="{{ asset('assets/js/core/jquery.min.js') }}" </script> <script src="{{ asset('assets/js/core/popper.min.js') }}" </script> <script src="{{ asset('assets/js/core/bootstrap-material-design.min.js') }}" </script> <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}" </script> <!-- Plugin for the momentJs -->
    < script src = "{{ asset('assets/js/plugins/moment.min.js') }}"
  </script>
  <!--  Plugin for Sweet Alert -->
  <script src="{{ asset('assets/js/plugins/sweetalert2.js') }}" </script> <!-- Forms Validations Plugin -->
    < script src = "{{ asset('assets/js/plugins/jquery.validate.min.js') }}"
  </script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="{{ asset('assets/js/plugins/jquery.bootstrap-wizard.js') }}" </script> <!-- Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    < script src = "{{ asset('assets/js/plugins/bootstrap-selectpicker.js') }}"
  </script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="{{ asset('assets/js/plugins/bootstrap-datetimepicker.min.js') }}" </script> <!-- DataTables.net Plugin, full documentation here: https://datatables.net/ -->
    < script src = "{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"
  </script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="{{ asset('assets/js/plugins/bootstrap-tagsinput.js') }}" </script> <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    < script src = "{{ asset('assets/js/plugins/jasny-bootstrap.min.js') }}"
  </script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="{{ asset('assets/js/plugins/fullcalendar.min.js') }}" </script> <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    < script src = "{{ asset('assets/js/plugins/jquery-jvectormap.js') }}"
  </script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('assets/js/plugins/nouislider.min.js') }}" </script> <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    < script src = "https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js') }}"
  </script>
  <!-- Library for adding dinamically elements -->
  <script src="{{ asset('assets/js/plugins/arrive.min.js') }}" </script> <!-- Google Maps Plugin -->
    < script src = "https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE" >
  </script>
  <!-- Chartist JS -->
  <script src="{{ asset('assets/js/plugins/chartist.min.js') }}" </script> <!-- Notifications Plugin -->
    < script src = "{{ asset('assets/js/plugins/bootstrap-notify.js') }}"
  </script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/material-dashboard.js?v=2.1.0') }}" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  @yield('jScript')
</body>

</html>
