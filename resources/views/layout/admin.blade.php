<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Panel</title>
    <link rel="apple-touch-icon" href="icon.png">
    <link rel="apple-touch-icon" href="{{url('storage').'/' .General::logo()->sectionContent[0]->value}}">
    <link rel="icon" type="image/x-icon" href="{{url('storage').'/' .General::logo()->sectionContent[0]->value}}">

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    {{-- <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff"> --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/placeholder/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/placeholder/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/placeholder/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('images/placeholder/site.webmanifest')}}">
    <!-- Styles -->
    {{-- <link href="{{asset('assets/css/lib/chartist/chartist.min.css')}}" rel="stylesheet"> --}}
    <link href="{{asset('assets/css/lib/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/themify-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/lib/owl.theme.default.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/lib/weather-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/lib/menubar/sidebar.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/unix.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    @stack('after-style-admin')
</head>

<body>

    @include('include.sidebar')


    <div class="header">
        <div class="pull-left">
            <div class="logo"><a href="{{route('admin.home')}}">
                    <!-- <img src="assets/images/logo.png" alt="" /> --><span>Airkipi</span></a></div>
            <div class="hamburger sidebar-toggle">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
        </div>
        <div class="pull-right p-r-15">
            <ul>

                <li class="header-icon dib">
                    <a href="{{route('lp-index')}}"><i class="ti-eye"></i></a>
                </li>
                <li class="header-icon dib"><img class="avatar-img" src="assets/images/avatar/1.jpg" alt="" /> <span class="user-avatar">{{ucfirst(auth()->user()->name)}} <i class="ti-angle-down f-s-10"></i></span>
                    <div class="drop-down dropdown-profile">
                        <div class="dropdown-content-body">
                            <ul>
                                <li><a href=""><i class="ti-user"></i> <span>Profile</span></a></li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                        <i class="ti-power-off"></i>
                                        <span>{{ __('Logout') }}</span>
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                {{-- <h1><span>{{$title}}</span></h1> --}}
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{route('admin.home')}}">Dashboard</a></li>
                                    {{-- {{dd($breadcrumbs)}} --}}
                                    @if(isset($breadcrumbs))
                                    @foreach($breadcrumbs as $key => $breadcrumb)
                                    <li class="{{($key === array_key_last($breadcrumbs)) ? "active" : ""}}">
                                        @if($key === array_key_last($breadcrumbs))
                                        {{$breadcrumb['name']}}
                                        @else
                                        @if(isset($breadcrumb["id"]))
                                        @php $id = $breadcrumb["id"]; @endphp
                                        <a href="{{route($breadcrumb["url"],$id)}}">{{$breadcrumb['name']}}</a>
                                        @else
                                        <a href="{{route($breadcrumb["url"])}}">{{$breadcrumb['name']}}</a>
                                        @endif
                                        @endif
                                    </li>
                                    @endforeach
                                    @endif
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <div id="main-content">

                    @yield('content-admin')


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>Copyright airkipikipi.com</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('assets/js/lib/jquery.min.js')}}"></script>
    <!-- jquery vendor -->
    <script src="{{asset('assets/js/lib/jquery.nanoscroller.min.js')}}"></script>
    <!-- nano scroller -->
    <script src="{{asset('assets/js/lib/menubar/sidebar.js')}}"></script>
    <script src="{{asset('assets/js/lib/preloader/pace.min.js')}}"></script>
    <!-- sidebar -->
    <script src="{{asset('assets/js/lib/bootstrap.min.js')}}"></script>
    <!-- bootstrap -->
    <script src="{{asset('assets/js/lib/weather/jquery.simpleWeather.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/weather/weather-init.js')}}"></script>
    <script src="{{asset('assets/js/lib/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/circle-progress/circle-progress-init.js')}}"></script>
    {{-- <script src="{{asset('assets/js/lib/chartist/chartist.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/chartist/chartist-init.js')}}"></script> --}}
    <script src="{{asset('assets/js/lib/sparklinechart/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/sparklinechart/sparkline.init.js')}}"></script>
    <script src="{{asset('assets/js/lib/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/owl-carousel/owl.carousel-init.js')}}"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    @stack('after-script-admin')
</body>

</html>