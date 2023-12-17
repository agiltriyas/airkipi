<!DOCTYPE html>
<html lang="en-US" class="no-js">

<head>

    <!-- Title -->
    <title>Airkipi - Minuman Kemasan - {{(isset($title))? $title :''}}</title>
    <meta name="title" content="{{isset($tagTitle) ?$tagTitle: 'airkipi minuman kemasan'}}">


    <!-- Required Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Airkipi minuman kemasan">
    <meta name="keywords" content="{{isset($tags) ?$tags: 'airkipi, minuman kemasan'}}">
    <meta name="robots" content="index, follow">
    <meta name="language" content="Indonesia">
    <meta name="type" content="{{isset($tagType) ?$tagType: 'article'}}">
    <meta name="type" content="{{isset($tagImage) ?$tagImage: ''}}">
    <meta name="tagurl" content="{{isset($tagUrl) ?$tagUrl: 'https://airkipi.com'}}">
    <meta name="tagsitename" content="{{isset($tagSitename) ?$tagSitename: 'airkipi.com'}}">
    <meta name="author" content="Wiene Surya Putras">

    <!-- favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="icon.png">
    <link rel="apple-touch-icon" href="{{url('storage').'/' .General::logo()->sectionContent[0]->value}}">
    <link rel="icon" type="image/x-icon" href="{{url('storage').'/' .General::logo()->sectionContent[0]->value}}">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/fullPage.js/dist/jquery.fullpage.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/vendor/slick/slick.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/vendor/vegas/vegas.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/vendor/magnific-popup/dist/magnific-popup.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/vendor/animate.css/animate.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/all.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/vendor/themify-icons/css/themify-icons.css')}}" type="text/css">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CMontserrat:200,300,400,500,700&display=swap">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/theme.css')}}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

</head>

<body class="layout-wide">

    <!-- Loader -->
    <div class="loader bg-dark">
        <div class="spinner-grow text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <div id="top"></div>

    <!-- Site navigation -->
    <nav class="site-navbar site-navbar-transparent navbar navbar-expand-lg navbar-dark fixed-top bg-white shadow-light p-lg-4" data-navbar-base="navbar-dark" data-navbar-toggled="navbar-light" data-navbar-scrolled="navbar-light">

        <!-- Brand -->
        <a class="navbar-brand" href="{{route('lp-index')}}">
            <img src="{{url('storage').'/' .General::logo()->sectionContent[0]->value}}" class="" width="100" alt="">
        </a>

        <!-- Toggler -->
        <button class="navbar-toggler-alternative" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-alternative-icon"></span>
        </button>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarCollapse">

            <!-- Navigation -->
            <ul class="navbar-nav ml-auto" id="navigation">
                <li class="nav-item active" data-menuanchor="home">
                    <a class="nav-link" href="{{(count(Request::segments()) !=0) ? route('lp-index') : ''}}#home">Home</a>
                </li>
                <li class="nav-item" data-menuanchor="what-we-do">
                    <a class="nav-link" href="{{(count(Request::segments()) !=0) ? route('lp-index') : ''}}#what-we-do">What we do</a>
                </li>
                <li class="nav-item" data-menuanchor="our-product">
                    <a class="nav-link" href="{{(count(Request::segments()) !=0) ? route('lp-index') : ''}}#our-product">Our product</a>
                </li>
                <li class="nav-item" data-menuanchor="our-activities">
                    <a class="nav-link" href="{{(count(Request::segments()) !=0) ? route('lp-index') : ''}}#our-activities">Our activities</a>
                </li>
                <li class="nav-item" data-menuanchor="contact">
                    <a class="nav-link" href="{{(count(Request::segments()) !=0) ? route('lp-index') : ''}}#contact">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Back To Top Button -->
    <a href="#top" class="backtotop">
        <span>Back To Top</span>
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Scroll progress -->
    <div class="scroll-progress">
        <div class="sp-left">
            <div class="sp-inner"></div>
            <div class="sp-inner progress"></div>
        </div>
        <div class="sp-right">
            <div class="sp-inner"></div>
            <div class="sp-inner progress"></div>
        </div>
    </div>

    <!-- Fullpage content -->
    @yield('content')
    <!-- Fullpage content end -->

    <!-- Footer -->
    @include('include.footer')
    <!-- footer end -->

    <!-- Fullpage - Social icons -->
    <nav class="ln-social-icons">
        <ul class="mx-auto">
            @if(is_array($data['socmed']['feature']))
            @for($i=0;$i < count($data['socmed']['feature']);$i++) <li><a href="{{ explode('|',$data['socmed']['feature'][$i])[1] }}"><i class="fab fa-{{ explode('|',$data['socmed']['feature'][$i])[0] }}{{(explode('|',$data['socmed']['feature'][$i])[0] == 'facebook') ? '-f' : ''}}"></i></a></li>

                @endfor
                @else
                <li><a href="{{ explode('|',$data['socmed']['feature'][0])[1] }}"><i class="fab fa-{{explode('|',$data['socmed']['feature'][0])[0]}}-f"></i></a></li>
                @endif
        </ul>
    </nav>

    <!-- Fullpage - Copyright -->
    <div class="ln-copyright text-right">
        <p>© 2023 Lana - All Rights Reserved - <a href="#!">Terms of Service</a></p>
    </div>

    <!-- Libs JS -->
    <script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/popper.js/dist/popper.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/vendor/fullPage.js/dist/scrolloverflow.min.js')}}"></script>
    <script src="{{asset('assets/vendor/fullPage.js/dist/jquery.fullpage.min.js')}}"></script>
    <script src="{{asset('assets/vendor/waypoints/lib/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-smooth-scroll/jquery.smooth-scroll.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-form/dist/jquery.form.min.js')}}"></script>
    <script src="{{asset('assets/vendor/magnific-popup/dist/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jQuery.countdown/dist/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('assets/vendor/granim.js/dist/granim.min.js')}}"></script>
    <script src="{{asset('assets/vendor/slick/slick.min.js')}}"></script>
    <script src="{{asset('assets/vendor/vegas/vegas.min.js')}}"></script>

    <!-- Theme JS -->
    <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>