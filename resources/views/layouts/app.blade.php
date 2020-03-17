<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'SaleRuby CRM') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('theme/images/SR-favicon.png')}}">
    <link href="{{asset('theme/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('theme/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('theme/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('theme/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css">

</head>
<body>
<div id="app">
    @guest
        <div class="container">
            <a href="{{ url('/') }}">
                SalesRuby CRM
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto"></ul>


                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">

                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                </ul>
            </div>
        </div>

        @else

            <div id="wrapper">
                <!-- Top Bar Start -->
                <div class="topbar">

                    <!-- LOGO -->
                    <div class="topbar-left">
                        <a href="index.html" class="logo">
                    <span class="logo-light">
                            <i class="mdi mdi-camera-control"></i> Sales Ruby
                        </span>
                            <span class="logo-sm">
                        <i class="mdi mdi-camera-control"></i>
                    </span>
                        </a>
                    </div>

                    <nav class="navbar-custom">
                        <ul class="navbar-right list-inline float-right mb-0">
                            <li class="dropdown notification-list list-inline-item">
                                <div class="dropdown notification-list nav-pro-img">

                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                       data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{--{{substr(Auth::user()->name, 0, 1)}}--}}
                                        {{Auth::user()->name}}
                                    </a>


                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <ul class="list-inline menu-left mb-0">
                            <li class="float-left">
                                <button class="button-menu-mobile open-left waves-effect">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>
                            <li class="d-none d-md-inline-block">
                                <form role="search" class="app-search">
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </li>
                        </ul>

                    </nav>

                </div>
                <!-- Top Bar End -->

                <!-- ========== Left Sidebar Start ========== -->
                <div class="left side-menu">
                    <div class="slimscroll-menu" id="remove-scroll">

                        <!--- Sidemenu -->
                        <div id="sidebar-menu">
                            <!-- Left Menu Start -->
                            <ul class="metismenu" id="side-menu">
                                <li class="menu-title">Menu</li>
                                <li>
                                    <a href="{{route('home')}}" class="waves-effect">
                                        <i class="icon-accelerator"></i><span> Dashboard </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0);" class="waves-effect">
                                        <i class="mdi mdi-account-circle"></i>
                                        <span> Leads
                                            <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                                        </span>
                                    </a>

                                    <ul class="submenu">
                                        <li><a href="{{route('leads.create')}}">Add Lead</a></li>
                                        <li><a href="{{route('leads.index')}}">Manage Leads</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="javascript:void(0);" class="waves-effect"><i
                                                class="mdi mdi-chart-line"></i><span> My Tasks <span
                                                    class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                    <ul class="submenu">
                                        <li><a href="deadline.html">Deadlines</a></li>
                                        <li><a href="missed.html">Missed</a></li>
                                        <li><a href="closed.html">Closed</a></li>
                                    </ul>
                                </li>

                                <li class= "{{ Auth::user()->hasRole('Sales') ? 'hide' : ''}}">
                                    <a href="javascript:void(0);" class="waves-effect"><i
                                                class="mdi mdi-account-group"></i> <span>Users<span
                                                    class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span>
                                    </a>
                                    <ul class="submenu">
                                        <li><a href="{{route('users.create')}}">Add User</a></li>
                                        <li><a href="{{route('users.index')}}">Manage Users</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="javascript:void(0);" class="waves-effect"><i
                                                class="mdi mdi-package-variant"></i> <span> Products <span
                                                    class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span>
                                    </a>
                                    <ul class="submenu">
                                        <li><a href="{{route('products.create')}}">Add Product</a></li>
                                        <li><a href="{{route('products.index')}}">Manage Products</a></li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                        <!-- Sidebar -->
                        <div class="clearfix"></div>

                    </div>
                    <!-- Sidebar -left -->

                </div>
                <!-- Left Sidebar End -->

                <!-- ============================================================== -->
                <!-- Start right Content here -->
                <!-- ============================================================== -->
                <div class="content-page">
                    <!-- Start content -->
                    <div class="content">
                        <div class="container-fluid">
                            <div class="page-title-box">
                                <div class="row align-items-center">
                                    <div class="col-sm-6">
                                        <h4 class="page-title">Dashboard</h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-right">
                                            <li class="breadcrumb-item"><a href="javascript:void(0);">Representative</a>
                                            </li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- end page-title -->

                            <div class="row">

                                <div class="col-sm-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-heading p-4">
                                            <div class="mini-stat-icon float-right">
                                                <i class="mdi mdi-account-plus bg-primary  text-white"></i>
                                            </div>
                                            <div>
                                                <h5 class="font-16">Registrations</h5>
                                            </div>
                                            <p class="text-muted mt-2 mb-0">Online </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-heading p-4">
                                            <div class="mini-stat-icon float-right">
                                                <i class="mdi mdi-thumb-up bg-success text-white"></i>
                                            </div>
                                            <div>
                                                <h5 class="font-16">Closed Deal</h5>
                                            </div>
                                            <p class="text-muted mt-2 mb-0">Closed Tasks</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-heading p-4">
                                            <div class="mini-stat-icon float-right">
                                                <i class="mdi mdi-phone-missed bg-warning text-white"></i>
                                            </div>
                                            <div>
                                                <h5 class="font-16">Missed Deal</h5>
                                            </div>
                                            <p class="text-muted mt-2 mb-0">Missed Tasks</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-heading p-4">
                                            <div class="mini-stat-icon float-right">
                                                <i class="mdi mdi-calendar-check bg-danger text-white"></i>
                                            </div>
                                            <div>
                                                <h5 class="font-16">Deadline</h5>
                                            </div>
                                            <p class="text-muted mt-2 mb-0">Approaching</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endguest

            {{--CONTENT--}}
                <div class="content-page">
                    @yield('content')
                </div>


</div>


<script src="{{asset('theme/js/jquery.min.js')}}"></script>
<script src="{{asset('theme/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('theme/js/metismenu.min.js')}}"></script>
<script src="{{asset('theme/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('theme/js/waves.min.js')}}"></script>
<script src="{{asset('theme/pages/dashboard.init.js')}}"></script>
<!-- App js -->
<script src="{{asset('theme/js/app.js')}}"></script>

<!-- Scripts -->
{{--<script src="{{ asset('js/app.js') }}" defer></script>--}}
</body>
</html>