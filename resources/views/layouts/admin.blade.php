<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/brands.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/brands.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/fontawesome.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/fontawesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/regular.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/regular.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/solid.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/solid.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/svg-with-js.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/svg-with-js.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/v4-shims.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/v4-shims.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('admin/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('admin/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.min.css')}}">
  <!-- Tiny MCE -->
  <script src="https://cdn.tiny.cloud/1/9zd7ey2gqr72w1xf4b6t8skrvh6plqy56bcs2ypd9wx3g5n5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak textcolor',
      toolbar_mode: 'floating',
   });
  </script>

  <script>
    $(function() {
      $('.selectpicker').selectpicker();
    });
  </script>

  <!-- toastr -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" 
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <!-- end toast -->
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="dashboard" class="nav-link">OLA!</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <span class="brand-text font-weight-light"> <img src="{{asset('images/logo_2.png')}}" title="Ola Sport Wears" alt="ola sport wears" style="width:20%"> OLA!</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
          @if(\Route::current()->getName() == 'dashboard')
            <a href="/dashboard" class="nav-link active">
          @else
            <a href="/dashboard" class="nav-link">
          @endif
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            @if(Route::current()->getName() == 'slider.index' || Route::current()->getName() == 'slider.create' || Route::current()->getName() == 'slider.edit' || Route::current()->getName() == 'slider.show')
              <a href="" class="nav-link active">
            @else
              <a href="" class="nav-link">
            @endif
                <i class="nav-icon fas fa-tree"></i>
                <p>
                  Slider
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @if(\Route::current()->getName() == 'slider.index')
                  <a href="/slider" class="nav-link active">
                @else
                  <a href="/slider" class="nav-link">
                @endif
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            @if(\Route::current()->getName() == 'about.index' || Route::current()->getName() == 'about.create' || Route::current()->getName() == 'about.edit' || Route::current()->getName() == 'about.show')
              <a href="" class="nav-link active">
            @else
              <a href="" class="nav-link">
            @endif
              <i class="nav-icon fas fa-lemon"></i>
              <p>
                About
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @if(\Route::current()->getName() == 'about.edit')
                  <a href="/about/1/edit" class="nav-link active">
                @else
                  <a href="/about/1/edit" class="nav-link">
                @endif
                    <i class="far fa-circle nav-icon"></i>
                    <p>Edit</p>
                  </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            @if(\Route::current()->getName() == 'category.index' || Route::current()->getName() == 'category.create' || Route::current()->getName() == 'category.edit' || Route::current()->getName() == 'category.show')
              <a href="" class="nav-link active">
            @else
              <a href="" class="nav-link">
            @endif
              <i class="nav-icon fas fa-wifi"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @if(\Route::current()->getName() == 'category.index')
                  <a href="/category" class="nav-link active">
                @else
                  <a href="/category" class="nav-link">
                @endif
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
              </li>
              <li class="nav-item">
                @if(\Route::current()->getName() == 'category.create')
                  <a href="/category/create" class="nav-link active">
                @else
                  <a href="/category/create" class="nav-link">
                @endif
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            @if(Route::current()->getName() == 'contact.index' || Route::current()->getName() == 'contact.create' || Route::current()->getName() == 'contact.edit' || Route::current()->getName() == 'contact.show')
              <a href="" class="nav-link active">
            @else
              <a href="" class="nav-link">
            @endif
                  <i class="nav-icon fas fa-wrench"></i>
                  <p>
                    Contact
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @if(\Route::current()->getName() == 'contact.edit')
                  <a href="/contact/1/edit" class="nav-link active">
                @else
                  <a href="/contact/1/edit" class="nav-link">
                @endif
                      <i class="far fa-circle nav-icon"></i>
                      <p>Edit</p>
                    </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
          @if(Route::current()->getName() == 'orders.index' || Route::current()->getName() == 'orders.create' || Route::current()->getName() == 'orders.edit' || Route::current()->getName() == 'orders.show')
            <a href="" class="nav-link active">
          @else
            <a href="" class="nav-link">
          @endif
              <i class="nav-icon fas fa-leaf"></i>
              <p>
                Orders
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @if(\Route::current()->getName() == 'orders.index')
                  <a href="/orders" class="nav-link active">
                @else
                  <a href="/orders" class="nav-link">
                @endif
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
          @if(Route::current()->getName() == 'product.index' || Route::current()->getName() == 'product.create' || Route::current()->getName() == 'product.edit' || Route::current()->getName() == 'product.show')
            <a href="" class="nav-link active">
          @else
            <a href="" class="nav-link">
          @endif
              <i class="nav-icon fas fa-leaf"></i>
              <p>
                Product
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @if(\Route::current()->getName() == 'product.index')
                  <a href="/product" class="nav-link active">
                @else
                  <a href="/product" class="nav-link">
                @endif
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
              </li>
              <li class="nav-item">
                @if(\Route::current()->getName() == 'product.create')
                  <a href="/product/create" class="nav-link active">
                @else
                  <a href="/product/create" class="nav-link">
                @endif
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            @if(Route::current()->getName() == 'socials.index' || Route::current()->getName() == 'socials.create' || Route::current()->getName() == 'socials.edit' || Route::current()->getName() == 'socials.show')
              <a href="" class="nav-link active">
            @else
              <a href="" class="nav-link">
            @endif
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  Socials
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @if(Route::current()->getName() == 'socials.edit')
                  <a href="/socials/1/edit" class="nav-link active">
                @else
                  <a href="/socials/1/edit" class="nav-link">
                @endif
                    <i class="far fa-circle nav-icon"></i>
                    <p>Edit</p>
                  </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            @if(Route::current()->getName() == 'term.index' || Route::current()->getName() == 'term.create' || Route::current()->getName() == 'term.edit' || Route::current()->getName() == 'term.show')
              <a href="" class="nav-link active">
            @else
              <a href="" class="nav-link">
            @endif
                  <i class="nav-icon fas fa-wrench"></i>
                  <p>
                    Terms and Conditions
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @if(\Route::current()->getName() == 'term.edit')
                  <a href="/term/1/edit" class="nav-link active">
                @else
                  <a href="/term/1/edit" class="nav-link">
                @endif
                      <i class="far fa-circle nav-icon"></i>
                      <p>Edit</p>
                    </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            @if(Route::current()->getName() == 'policies.index' || Route::current()->getName() == 'policies.create' || Route::current()->getName() == 'policies.edit' || Route::current()->getName() == 'policies.show')
              <a href="" class="nav-link active">
            @else
              <a href="" class="nav-link">
            @endif
                  <i class="nav-icon fas fa-wrench"></i>
                  <p>
                    Return Policy
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @if(\Route::current()->getName() == 'policies.edit')
                  <a href="/policies/1/edit" class="nav-link active">
                @else
                  <a href="/policies/1/edit" class="nav-link">
                @endif
                      <i class="far fa-circle nav-icon"></i>
                      <p>Edit</p>
                    </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            @if(Route::current()->getName() == 'sizes.index' || Route::current()->getName() == 'sizes.create' || Route::current()->getName() == 'sizes.edit' || Route::current()->getName() == 'sizes.show')
              <a href="" class="nav-link active">
            @else
              <a href="" class="nav-link">
            @endif
                  <i class="nav-icon fas fa-wrench"></i>
                  <p>
                    Size Guide
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @if(\Route::current()->getName() == 'sizes.edit')
                  <a href="/sizes/1/edit" class="nav-link active">
                @else
                  <a href="/sizes/1/edit" class="nav-link">
                @endif
                      <i class="far fa-circle nav-icon"></i>
                      <p>Edit</p>
                    </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            @if(Route::current()->getName() == 'password.index')
              <a href="" class="nav-link active">
            @else
              <a href="" class="nav-link">
            @endif
                <i class="nav-icon far fa-user"></i>
                <p>
                  User Management
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @if(Route::current()->getName() == 'change-password.index')
                  <a href="/change-password" class="nav-link active">
                @else
                  <a href="/change-password" class="nav-link">
                @endif
                    <i class="far fa-circle nav-icon"></i>
                    <p>Change Password</p>
                  </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="nav-icon fa fa-power-off"></i>
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('title')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">@yield('title')</a></li>
              <li class="breadcrumb-item active">Ola Sport Wear v1.0</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @yield('content')


<footer class="main-footer">
    <strong>Copyright &copy; <script type="text/javascript">document.write( new Date().getFullYear() );</script> 
        <a href="/">Ola Sport Wear Application</a>.</strong>
        All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('admin/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('admin/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('admiin/dist/js/pages/dashboard.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

  <!-- pop up -->
  <script>
  @if(Session::has('success'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('success') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
</script>
</body>
</html>