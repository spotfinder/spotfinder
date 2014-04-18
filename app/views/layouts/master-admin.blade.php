<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Dashboard - Spot Finder Admin</title>

	<!-- Bootstrap core CSS -->
	<link href="{{ URL::to('') }}/css/bootstrap.css" rel="stylesheet">

	<!-- Add custom CSS here -->
	<link href="{{ URL::to('') }}/css/sb-admin.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ URL::to('') }}/font-awesome/css/font-awesome.min.css">
	<!-- Page Specific CSS -->
	<link rel="stylesheet" href="{{ URL::to('') }}/assets/css/morris-0.4.3.min.css">
	 <!-- Global CSS -->
    <!-- <link rel="stylesheet" href="{{ URL::to('') }}/assets/plugins/bootstrap/css/bootstrap.min.css"> -->
	<style >
		h1 small{
		 	color: #FFF;
		}

	</style>
  </head>
@yield('top-script')

<body>

	<div id="wrapper">
	  <!-- Sidebar -->
	  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="{{{ action ('AdminController@index') }}}">SpotFinder Admin</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
		  <ul class="nav navbar-nav side-nav">
			<li class="active"><a href="{{{ action ('AdminController@index') }}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  </ul>

		  <ul class="nav navbar-nav navbar-right navbar-user">
			<li class="dropdown user-dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->first_name}} <b class="caret"></b></a>
			  <ul class="dropdown-menu">
				<li><a href="{{{ action('RegisterController@index') }}}"><i class="fa fa-user"></i> Profile</a></li>
				<li><a href="{{{ action('HomeController@showReservation') }}}"><i class="fa fa-calendar-o"></i> Reserve a Spot!</a></li>
				<li><a href = "{{{ action ('AdminController@create') }}} "><i class="fa fa-users"></i> Create a User</a></li>
				<li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
				<li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
				<li class="divider"></li>
				<li><a href="{{{ action('HomeController@logout') }}}"><i class="fa fa-power-off"></i> Log Out</a></li>
			  </ul>
			</li>
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </nav>

	  <div id="page-wrapper">

		<div class="row">
		  <div class="col-lg-12">
			<h1>Dashboard <small>Statistics Overview</small></h1>
			<ol class="breadcrumb">
			  <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
			</ol>
			<div class="alert alert-success alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  Welcome to SpotFinder {{Auth::user()->first_name}} {{Auth::user()->last_name}}!
			</div>
		  </div>
		</div><!-- /.row -->
		<!-- Success and Error messages when submiting forms -->
        @if (Session::has('successMessage'))
            <div class="alert alert-success" style="text-align:center">{{{ Session::get('successMessage') }}}</div>
        @endif
        @if (Session::has('errorMessage'))
            <div class="alert alert-danger" style="text-align:center">{{{ Session::get('errorMessage') }}}</div>
        @endif

@yield('content')
    <!-- Fade out error or success messages after forms are submitted -->

	<!-- JavaScript -->
	<script src="{{ URL::to('') }}/assets/js/jquery-1.10.2.js"></script>
	<script src="{{ URL::to('') }}/assets/js/bootstrap.js"></script>

	<!-- Page Specific Plugins -->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="{{ URL::to('') }}/assets/js/morris/morris-0.4.3.min.js"></script>
	<script src="{{ URL::to('') }}/assets/js/morris/chart-data-morris.js"></script>
	<script src="{{ URL::to('') }}/assets/js/tablesorter/jquery.tablesorter.js"></script>
	<script src="{{ URL::to('') }}/assets/js/tablesorter/tables.js"></script>
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
