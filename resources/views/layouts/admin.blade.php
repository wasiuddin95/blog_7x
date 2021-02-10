<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>AdminLTE 3 | Starter</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin') }}/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    {{-- Toaster Css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @yield('style')
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
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('dashboard') }}" class="brand-link">
                <img src="{{ asset('admin') }}/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Blog Site</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <a href="{{ route('user.profile') }}">
                        <img src="{{ Auth::user()->image }}" class="img-circle elevation-2" alt="User Image">
                        </a>
                    </div>
                    <div class="info">
                        <a href="{{ route('user.profile') }}" class="d-block">{{Auth::user()->name}}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item"> <!--  has-treeview menu-open -->
                            <a href="{{ route('dashboard') }}" class="nav-link {{ (request()->is('admin/dashboard*')) ? 'active': '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    {{-- <i class="right fas fa-angle-left"></i> --}}
                                </p>
                            </a>
                            {{-- <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Active Page</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Inactive Page</p>
                                    </a>
                                </li>
                            </ul> --}}
                        </li>
                        <li class="nav-item mt-auto">
                            <a href="{{ route('category.index') }}" class="nav-link {{ (request()->is('admin/category*')) ? 'active': '' }}">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>
                                Categories
                                <span class="right badge badge-danger">New</span>
                            </p>
                            </a>
                        </li>
                        <li class="nav-item mt-auto">
                            <a href="{{ route('tag.index') }}" class="nav-link {{ (request()->is('admin/tag*')) ? 'active': '' }}">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>
                                Tags
                                <span class="right badge badge-danger">New</span>
                            </p>
                            </a>
                        </li>
                        <li class="nav-item mt-auto">
                            <a href="{{ route('post.index') }}" class="nav-link {{ (request()->is('admin/post*')) ? 'active': '' }}">
                            <i class="nav-icon fas fa-pen-square"></i>
                            <p>
                                Post
                                <span class="right badge badge-danger">New</span>
                            </p>
                            </a>
                        </li>
                        <li class="nav-item mt-auto">
                            <a href="{{ route('contact.index') }}" class="nav-link {{ (request()->is('admin/contact*')) ? 'active': '' }}">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p>
                                Contact Message
                                <span class="right badge badge-danger">New</span>
                            </p>
                            </a>
                        </li>
                        <li class="nav-item mt-auto">
                            <a href="{{ route('user.index') }}" class="nav-link {{ (request()->is('admin/user*')) ? 'active': '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Users
                                <span class="right badge badge-danger">New</span>
                            </p>
                            </a>
                        </li>
                        <li class="nav-item mt-auto">
                            <a href="{{ route('setting.index') }}" class="nav-link {{ (request()->is('admin/setting*')) ? 'active': '' }}">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Setting
                                <span class="right badge badge-danger">New</span>
                            </p>
                            </a>
                        </li>
                        <li class="nav-header">My Account</li>
                        <li class="nav-item mt-auto">
                            <a href="{{ route('user.profile') }}" class="nav-link {{ (request()->is('admin/profile*')) ? 'active': '' }}">
                            <i class="nav-icon far fa-user"></i>
                                <p>My Profile</p>
                            </a>
                        </li>
                        <li class="nav-item mt-auto">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                                {{ __('Logout') }}
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                <p>Logout</p>
                            </form>
                            </a>
                        </li>
                        <li class="text-center mt-5">
                            <a href="{{ route('website') }}" target="_blank" class="btn btn-primary text-white">
                                <p class="mb-0">View Website</p>
                            </a>
                        </li>
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
                Developed By: Wasi Uddin
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('admin') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin') }}/js/adminlte.min.js"></script>
    <!-- Custom file Js -->
    <script src="{{ asset('admin') }}/js/bs-custom-file-input.min.js"></script>
    {{-- Toastr Js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{-- Sweet Alert JS --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    {{-- Sweet Alert delete Js --}}
    {{-- <script type="text/javascript">
        $(function(){
            $(document).on('click','#delete',function(e){
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.value) {
                        window.location.href = link;
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                    }
                    })
            });
        });
    </script> --}}

    @yield('script')

    <script>
        @if(Session::has('success'))
          toastr.success("{{ Session::get('success') }}");
        @endif

        $(document).ready(function () {
            bsCustomFileInput.init()
        })

    </script>

</body>

</html>
