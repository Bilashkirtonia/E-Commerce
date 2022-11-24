<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashbord</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ asset('') }}backend/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('') }}backend/css/adminlte.min.css">
  <link rel="stylesheet" href="{{ asset('') }}backend/css/select2.min.css">
  <link rel="stylesheet" href="{{ asset('') }}backend/css/select2-bootstrap4.min.css">
  <style>
    .notifyjs-corner{
      z-index: 10000 !important;
    }
  </style>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  

  {{-- <!-- Font Awesome -->
  <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
  />
  <!-- Google Fonts -->
  <link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
  />
  <!-- MDB -->
  <link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css"
  rel="stylesheet"
  />
<!-- Font Awesome Icons --> --}}


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <p>{{ Auth::User()->name }}  <i class="far fa-user"></i></p>
          
        </a>
        <div class="dropdown-menu dropdown-menu-right">
                     
          
          <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
           </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ asset('') }}../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dashbord</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('') }}../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::User()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

              @php
                $prifix = Request::route()->getPrefix();
                $route = Route::current()->getName();
                
              @endphp

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @if (@Auth::user()->role == 'admin')
               <li class="nav-item {{ ($prifix == '/user')?'menu-open':'' }}">
                 <a href="#"  class="nav-link {{ ($prifix == '/user')?'menu-open':'' }}">
                   <i class="nav-icon fas fa-tachometer-alt"></i>
                   <p>
                     Manage user
                     <i class="right fas fa-angle-left"></i>
                   </p>
                 </a>
                 <ul class="nav nav-treeview">
                   <li class="nav-item">
                     <a href="{{ route('view_user') }}" class="nav-link  ">
                       <i class="far fa-circle nav-icon"></i>
                       <p>View user</p>
                     </a>
                   </li>
                   
                 </ul>
               </li>
               @endif      
          
              
          {{-- --}}
          <li class="nav-item {{ ($prifix == '/profile')?'menu-open':'' }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manage profile
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{ route('profile.view') }} " class="nav-link {{ ($route == 'profile.view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View profile</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{ route('profile.password_view') }}" class="nav-link {{ ($route == 'profile.password_view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change password</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ ($prifix == '/logo')?'menu-open':'' }}">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Logo & slide
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('view_logo') }}" class="nav-link {{ ($route == 'view_logo')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('view_slide') }}" class="nav-link {{ ($route == 'view_slide')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Slider</p>
                </a>
              </li>
            </ul>
          </li>

          

          <li class="nav-item {{ ($prifix == '/contact')?'menu-open':'' }}">
            <a href="" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Contact
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('view_contact') }}" class="nav-link {{ ($route == 'view_contact')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ ($prifix == '/about')?'menu-open':'' }}">
            <a href="" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                About
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('view_about') }}" class="nav-link {{ ($route == 'view_about')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About us</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ ($prifix == '/category')?'menu-open':'' }}">
            <a href="" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Categories
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('view_category') }}" class="nav-link {{ ($route == 'view_category')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add category </p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ ($prifix == '/brand')?'menu-open':'' }}">
            <a href="" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Brand
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('view_brand') }}" class="nav-link {{ ($route == 'view_brand')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add brand </p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ ($prifix == '/color')?'menu-open':'' }}">
            <a href="" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Color
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('view_color') }}" class="nav-link {{ ($route == 'view_color')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add color </p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ ($prifix == '/size')?'menu-open':'' }}">
            <a href="" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Size
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('view_size') }}" class="nav-link {{ ($route == 'view_size')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add size </p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ ($prifix == '/product')?'menu-open':'' }}">
            <a href="" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('view_product') }}" class="nav-link {{ ($route == 'view_product')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add product </p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ ($prifix == '/customer')?'menu-open':'' }}">
            <a href="" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Customer
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('verify_view') }}" class="nav-link {{ ($route == 'verify_view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Verify customer </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('draft_view') }}" class="nav-link {{ ($route == 'draft_view')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Draft Customer </p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ ($prifix == '/order')?'menu-open':'' }}">
            <a href="" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manage order
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('pending_order') }}" class="nav-link {{ ($route == 'pending_order')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending order </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('approve_order') }}" class="nav-link {{ ($route == 'approve_order')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approve order </p>
                </a>
              </li>
            </ul>
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
      @yield('content')

      @if (session()->has('success'))
       <script>
         $(function(){
          $.notify("{{ session()->get('success') }}",{globalPosition:'top right',className:'success'});
        });
       </script>
      @endif
      
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  {{-- <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside> --}}
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  {{-- <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer> --}}
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- MDB -->
{{-- <script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"
></script> --}}
<!-- jQuery -->
<script>
  $(function(){
    $('.select2').select2()
  });
</script>

<script>
  $(document).ready(function(){
    $('#image').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#showImage').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    })
  });
</script>
<script src="{{ asset('') }}backend/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('') }}backend/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('') }}backend/js/adminlte.min.js"></script>

<script src="{{ asset('') }}backend/js/jquery.validate.min.js"></script>
<script src="{{ asset('') }}backend/js/additional-methods.min.js"></script>

<script src="{{ asset('') }}backend/js/jquery.validate.min.js"></script>
<script src="{{ asset('') }}backend/js/additional-methods.min.js"></script>


<script src="{{ asset('') }}backend/js/select2.full.min.js"></script>
</body>
</html>
