<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <title>sejarahlokalsumatera.org &#8211; {{(isset($title))? $title :''}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <!-- favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="icon.png">
    <link rel="apple-touch-icon" href="{{asset('images/placeholder/favicon.ico')}}">
    <link rel="icon" type="image/x-icon" href="{{asset('images/placeholder/favicon.ico')}}">

    {{-- tag --}}

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="theme-color" content="#030303">
    <meta name="title" content="{{isset($tagTitle) ?$tagTitle: 'Sejarah lokal provinsi Sumatera Utara'}}">
    <meta name="description" content="{{isset($tagDescription) ?$tagDescription: 'Informasi sejarah indonesia khususnya provinsi sumatera utar, mengulik sejarah dari hikayat, budaya, tokoh, situs, dan lagu daerah. Serta mengajak pemuda indonesia untuk turut andil melestarikan sejarah baik dari segi cerita dan peninggalan -peninggalan sejarah' }}">
    <meta name="keywords" content="{{isset($tags) ?$tags: 'sejarah,jasmerah,sumatera utara,cerita sejarah, peninggalan sejarah'}}">
    <meta name="robots" content="index, follow">
    <meta name="language" content="Indonesia">
    <meta name="type" content="{{isset($tagType) ?$tagType: 'article'}}">
    <meta name="type" content="{{isset($tagImage) ?$tagImage: ''}}">
    <meta name="tagurl" content="{{isset($tagUrl) ?$tagUrl: 'https://sejarahlokalsumut.org'}}">
    <meta name="tagsitename" content="{{isset($tagSitename) ?$tagSitename: 'sejarahlokalsumut.org'}}">
    <meta name="author" content="Wiene Surya Putras">
    <!-- google fonts -->

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/placeholder/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/placeholder/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/placeholder/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('images/placeholder/site.webmanifest')}}">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,500;0,700;1,300;1,500&family=Poppins:ital,wght@0,300;0,500;0,700;1,300;1,400&display=swap"
        rel="stylesheet">
    <link href="{{asset('css/styles.css?537a1bbd0e5129401d28')}}" rel="stylesheet">
    @stack('after-style')

</head>

<body class="body-box bg-news-image">
    <!-- loading -->
    <div class="loading-container">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <ul class="list-unstyled">
                <li>
                    {{-- <img src="{{asset('images/placeholder/logo-sejarahlokalsumut.png')}}" alt="Alternate Text" width="400" /> --}}

                </li>
                <li>

                    <div class="spinner">
                        <div class="rect1"></div>
                        <div class="rect2"></div>
                        <div class="rect3"></div>
                        <div class="rect4"></div>
                        <div class="rect5"></div>

                    </div>

                </li>
                <li>
                    <p>Loading</p>
                </li>
            </ul>
        </div>
    </div>
    <!-- End loading -->

    <!-- Header news -->
    <header class="bg-light">
        <!-- Navbar  Top-->
        <div class="topbar d-none d-sm-block">
            <div class="container ">
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="topbar-left">
                            <div class="topbar-text">
                                {{date('d F Y')}}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="list-unstyled topbar-right">
                            <ul class="topbar-link">
                                <li><a href="{{route('about')}}" title="">Contact Us</a></li>
                                @if(auth()->user() !== null)
                                @role(['admin','superadmin'])
                                <li><a href="{{route('admin.home')}}" title="">{{ucfirst(auth()->user()->name)}}</a></li>
                                @else
                                <li><a href="{{route('user.home')}}" title="">{{ucfirst(auth()->user()->name)}}</a></li>
                                @endrole
                                @else
                                <li><a href="{{route('login')}}" title="">Login / Register</a></li>
                                @endif
                            </ul>
                            <ul class="topbar-sosmed">
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Navbar Top  -->
        <!-- Navbar  -->
        <!-- Navbar menu  -->
        <div class="navigation-wrap navigation-shadow bg-white">
            <nav class="navbar navbar-hover navbar-expand-lg navbar-soft">
                <div class="container">
                    <div class="offcanvas-header">
                        <div data-toggle="modal" data-target="#modal_aside_right" class="btn-md">
                            <span class="navbar-toggler-icon"></span>
                        </div>
                    </div>
                    <figure class="mb-0 mx-auto">
                        <a href="{{route('lp-index')}}">
                            <img src="{{General::about()->image}}" width="130" alt="" class="img-fluid logo">
                            {{-- sejarahlokalsumut.org --}}
                        </a>
                    </figure>

                    <div class="collapse navbar-collapse justify-content-between" id="main_nav99">
                        <ul class="navbar-nav ml-auto ">
                            <li class="nav-item dropdown">
                                <a class="nav-link active" href="{{route('lp-kategori','hikayat')}}"> Hikayat </a>

                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{route('lp-penilaian')}}"> Peniliaian Kesadaran
                                    Sejarah </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{route('lp-kategori','budaya')}}"> Budaya </a>
                            </li>

                            <li class="nav-item dropdown has-megamenu">
                                <a class="nav-link" href="{{route('lp-kategori','tokoh')}}"> Tokoh </a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{route('lp-kategori','situs')}}"> Situs </a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('lp-kategori','lagu-daerah')}}"> Lagu Daerah </a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('lp-laman-sejarah')}}"> Laman Sejarah </a></li>
                        </ul>


                        <!-- Search bar.// -->
                        <ul class="navbar-nav ">
                            <li class="nav-item search hidden-xs hidden-sm "> <a class="nav-link" href="#">
                                    <i class="fa fa-search"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- Search content bar.// -->
                        <div class="top-search navigation-shadow">
                            <div class="container">
                                <div class="input-group ">
                                    <form action="{{route('lp-search')}}" method="get">

                                        <div class="row no-gutters mt-3">
                                            <div class="col">
                                                <input class="form-control border-secondary border-right-0 rounded-0"
                                                    type="search" value="{{(isset($_GET['search'])) ? $_GET['search']: ''}}" placeholder="Search "
                                                    id="example-search-input4" name="search" required>
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right"
                                                    >
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Search content bar.// -->
                    </div> <!-- navbar-collapse.// -->
                </div>
            </nav>
        </div>
        <!-- End Navbar menu  -->
        <div id="modal_aside_right" class="modal fixed-left fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-aside" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="widget__form-search-bar  ">
                            <div class="row no-gutters">
                                <div class="col">
                                    <input class="form-control border-secondary border-right-0 rounded-0" value=""
                                        placeholder="Search">
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <nav class="list-group list-group-flush">
                            <ul class="navbar-nav ">
                                <li class="nav-item dropdown">
                                    <a class="nav-link active" href="{{route('lp-kategori','hikayat')}}"> Hikayat </a>
    
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{route('lp-penilaian')}}"> Peniliaian Kesadaran
                                        Sejarah </a>
                                </li>
    
                                <li class="nav-item dropdown">
                                    <a class="nav-link active" href="{{route('lp-kategori','budaya')}}"> Budaya </a>
                                </li>
    
                                <li class="nav-item dropdown has-megamenu">
                                    <a class="nav-link" href="{{route('lp-kategori','tokoh')}}"> Tokoh </a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="{{route('lp-kategori','situs')}}"> Situs </a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('lp-kategori','lagu-daerah')}}"> Lagu Daerah </a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('lp-laman-sejarah')}}"> Laman Sejarah </a></li>
                            </ul>

                        </nav>
                    </div>
                    <div class="modal-footer">
                        <p>© 2023 <a href="https://sejarahlokalsumut.org/">sejarahlokalsumut.org</a></p>
                    </div>

                </div>
            </div> <!-- modal-bialog .// -->
        </div> <!-- modal.// -->
        <!-- End Navbar  -->
    </header>
    <!-- End Header news -->
    
    

                @yield('content')

       

    <section class="wrapper__section p-0 bg-content">
        <div class="wrapper__section__components">
            <!-- Footer -->
            <footer>
                <div class="wrapper__footer bg__footer-dark pb-0">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-md-4">
                                <div class="widget__footer">
                                    <div class="dropdown-footer ">
                                        <h4 class="footer-title">
                                            Tetang Sejarahlokalsumatera.org
                                            <span class="fa fa-angle-down"></span>
                                        </h4>
                                    </div>
                                    <p>{{General::about()->description}}</p>

                                    <ul class="list-unstyled option-content is-hidden mt-2">
                                        <li>
                                            <a href="#"><i class="fa fa-whatsapp"></i> {{General::about()->phone}}</a>

                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-envelope"></i> {{General::about()->email}}</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-location-arrow"></i> {{General::about()->address}}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- Footer bottom -->
                <div class="wrapper__footer-bottom bg__footer-dark">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="border-top-1 bg__footer-bottom-section">
                                    <ul class="list-inline link-column">
                                        <li class="list-inline-item">
                                            <a href="/contact-us.html">
                                                contact us
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{route('lp-termofuse')}}"> terms of use</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{route('lp-policy')}}"> policy</a>
                                        </li>
                                    </ul>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <span>
                                                Copyright © 2023 sejarahlokalsumut.org
                                            </span>
                                        </li>
                                    </ul>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </footer>
        </div>
    </section>


    <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>

    <script type="text/javascript" src="{{asset('js/index.bundle.js?537a1bbd0e5129401d28')}}"></script>
    @stack('after-script')
</body>

</html>