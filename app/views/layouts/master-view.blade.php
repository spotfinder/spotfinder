<!doctype html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>SpotFinder</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">    
    <link rel="shortcut icon" href="favicon.ico">  
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Covered+By+Your+Grace' rel='stylesheet' type='text/css'>  
    <!-- Global CSS -->
    <link rel="stylesheet" href="{{ URL::to('') }}/assets/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Plugins CSS -->    
    <link rel="stylesheet" href="{{ URL::to('') }}/assets/plugins/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="{{ URL::to('') }}/assets/plugins/flexslider/flexslider.css">
    <link rel="stylesheet" href="{{ URL::to('') }}/assets/plugins/animate-css/animate.min.css">
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{ URL::to('') }}/assets/css/styles.css">
    <!-- Form CSS-->
    <link href="/css/signin.css" rel="stylesheet">
    <style type="text/css">
        .alert{
            margin-top: 90px;
        }
    </style>
@yield('top-script')
</head> 

<body data-spy="scroll">
    
    <!-- ******HEADER****** --> 
    <header id="top" class="header navbar-fixed-top">  
        <div class="container">            
            <h1 class="logo pull-left">
                <a class="scrollto" href="#promo">
                    <img id="logo-image" class="logo-image" src="{{ URL::to('') }}/assets/images/logo/magnifying-glass.gif" alt="Logo">
                    <span class="logo-title"><a href="{{{ action('HomeController@showHome') }}}">SpotSpy</a></span>
                </a>
            </h1><!--//logo-->              
            <nav id="main-nav" class="main-nav navbar-right" role="navigation">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button><!--//nav-toggle-->
                </div><!--//navbar-header-->            
                <div class="navbar-collapse collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active nav-item sr-only"><a class="scrollto" href="#promo">Home</a></li>
                        <li class="nav-item"><a href="{{ URL::to('') }}/#features">Features</a></li>
                        <li class="nav-item"><a href="{{ URL::to('') }}/#how">How it works</a></li>
                        <li class="nav-item"><a href="{{ URL::to('') }}/#faq">FAQ</a></li>
                        <li class="nav-item"><a href="{{ URL::to('') }}/#story">Story</a></li>
                        <li class="nav-item last"><a href="{{ URL::to('') }}/#contact">Contact</a></li>
                        <li class="dropdown">
                        @if (Auth::check())
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">MY ACCOUNT<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{{ action('HomeController@showReservation') }}}">Reserve a spot!</a></li>
                                <li><a href="{{{ action('RegisterController@index') }}}">Edit My Account</a></li>
                                @if (Auth::user()->isAdmin())   
                                    <li><a href="{{{ action('AdminController@index') }}}">Admin Dashboard</a></li>
                                @endif
                                <li><a href="{{{ action('HomeController@logout') }}}">Logout ({{{ Auth::user()->first_name }}})</a></li>
                            </ul>
                            </li>
                        @endif
                    </ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </nav><!--//main-nav-->           
        </div>
    </header><!--//header-->

    <!-- Success and Error messages when submiting forms -->
        @if (Session::has('successMessage'))
            <div class="alert alert-success" style="text-align:center">{{{ Session::get('successMessage') }}}</div>
        @endif
        @if (Session::has('errorMessage'))
            <div class="alert alert-danger" style="text-align:center">{{{ Session::get('errorMessage') }}}</div>
        @endif

@yield('content')


        <!-- Javascript -->          
    <script type="text/javascript" src="/assets/plugins/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="/assets/plugins/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="/assets/plugins/detectmobilebrowser.js"></script>      
    <script type="text/javascript" src="/assets/plugins/jquery.easing.1.3.js"></script>   
    <script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>     
    <script type="text/javascript" src="/assets/plugins/jquery-inview/jquery.inview.min.js"></script>
    <script type="text/javascript" src="/assets/plugins/FitVids/jquery.fitvids.js"></script>
    <script type="text/javascript" src="/assets/plugins/jquery-scrollTo/jquery.scrollTo.min.js"></script>    
    <script type="text/javascript" src="/assets/plugins/jquery-placeholder/jquery.placeholder.js"></script>
    <script type="text/javascript" src="/assets/plugins/flexslider/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="/assets/js/main.js"></script>
    <!--[if !IE]>--> 
    <script type="text/javascript" src="/assets/js/animations.js"></script> 
    <!--<![endif]-->

        <!-- Fade out error or success messages after forms are submitted -->
    <script type="text/javascript">

        $('.alert-success').hide();
        $('.alert-danger').hide();
        $('.alert-success').fadeIn(2000);
        $('.alert-danger').fadeIn(2000);

        displayTime = setTimeout(showMessages, 3000);
        //
        function showMessages(){
            setTimeout(hideMessages, 3000);
        }

        // function to stop / reset the timer
        function hideMessages() {
            clearTimeout(displayTime);
            $('.alert-success').fadeOut(2000);
            $('.alert-danger').fadeOut(2000);
        }

        showMessages();



    </script> 

@yield('bottom-script')
</body>
</html> 