<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{asset('css/theme.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=1685796441681454";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div class="container">
    <header id="header">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- start header top -->
                <div class="header_top">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('home')}}">Home</a></li>
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                My Profile
                            </a>
                        </li>

                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout {{ Auth::user()->name }}</a></li>
                        <li><a href="{{ url('/backend') }}">Backend</a></li>

                    @endif

                    <li>
                        <a href="#">Contact</a>
                    </li>


                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Articles <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="blog-home-1.html">Articles 1</a>
                            </li>
                            <li>
                                <a href="blog-home-2.html">Articles 2</a>
                            </li>
                            <li>
                                <a href="blog-post.html">Articles</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Other Pages <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="full-width.html">Recent Article</a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>








    <header id="header">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- start header top -->
                <div class="header_top">
                    <div class="header_top_left">

                    </div>

                </div><!-- End header top -->
                <!-- start header bottom -->
                <div class="header_bottom">
                    <div class="header_bottom_left">
                        <!-- for img logo -->
                        <!-- <a class="logo" href="index.html">
                          <img src="img/logo.jpg" alt="logo">
                         </a>-->
                        <!-- for text logo -->
                        <a class="logo" href="{{route('home')}}">
                            mag<strong>Articles</strong> <span>Have a Tip: Tell Others</span>
                        </a>
                    </div>
                    <div class="header_top_right">
                        <form class="search_form">
                            <input type="text" placeholder="Text to Search">
                            <input type="submit" value="">
                        </form>
                    </div>
                    <div class="header_bottom_right">
                        <a href="#"><img src="img/addbanner_728x90_V1.jpg" alt="img"></a>
                    </div>
                </div><!-- End header bottom -->
            </div>
        </div>
    </header><!-- End header area -->
    <div id="navarea">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav custom_nav">
                        <li class=""><a href="{{route('home')}}">Home</a></li>

                        <li><a href="">Blogs</a></li>
                        <li><a href="">Ask a Question</a></li>
                        <li><a href="/articles/create">Submit Article</a></li>
                        <li><a href="/events/calendar">Calendar</a></li>
                        <li><a href="/events">Events</a></li>



                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>
    </div>
    <section id="mainContent">
        <dic class="content_bottom">
            <div class="col-lg-9">
                <div class="content_bottom_left">
                    <div class="single_page_area">
                        @yield('breadcrumb')
                        @if(Session::has('flash_message'))
                            <div class="alert alert-success">
                                {{Session::get('flash_message')}}
                            </div>
                        @endif
                        @yield('content')
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="content_bottom_right">
                    @yield('sidebar')
                </div>

            </div>
        </dic>
    </section>

</div>
<footer id="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="single_footer_top wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
                        <h2>Flicker Images</h2>
                        <ul class="flicker_nav">
                            <li>
                                <a href="#"><img src="img/devhill/75x75.jpg" alt="img"></a>
                            </li>
                            <li>
                                <a href="#"><img src="img/devhill/75x75.jpg" alt="img"></a>
                            </li>
                            <li>
                                <a href="#"><img src="img/devhill/75x75.jpg" alt="img"></a>
                            </li>
                            <li>
                                <a href="#"><img src="img/devhill/75x75.jpg" alt="img"></a>
                            </li>
                            <li>
                                <a href="#"><img src="img/devhill/75x75.jpg" alt="img"></a>
                            </li>
                            <li>
                                <a href="#"><img src="img/devhill/75x75.jpg" alt="img"></a>
                            </li>
                            <li>
                                <a href="#"><img src="img/devhill/75x75.jpg" alt="img"></a>
                            </li>
                            <li>
                                <a href="#"><img src="img/devhill/75x75.jpg" alt="img"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="single_footer_top wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
                        <h2>Labels</h2>
                        <ul class="labels_nav">
                            <li><a href="#">Gallery</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Games</a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Sports</a></li>
                            <li><a href="#">Technology</a></li>
                            <li><a href="#">Slider</a></li>
                            <li><a href="#">Life &amp; Style</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="single_footer_top wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">
                        <h2>About Us</h2>
                        <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed nec laoreet orci, eget ullamcorper quam. Phasellus lorem neque, </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="footer_bottom_left">
                        <p>All Rights Reserved <a href="index.html">magExpress</a></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="footer_bottom_right">
                        <p>Designed By <a href="http://wpfreeware.com/">WpFreeware</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@yield('scripts')
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
