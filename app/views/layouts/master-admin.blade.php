<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Dashboard - Spot Finder Admin</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">

	<!-- Add custom CSS here -->
	<link href="css/sb-admin.css" rel="stylesheet">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<!-- Page Specific CSS -->
	<link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
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
		  <a class="navbar-brand" href="index.html">SpotFinder Admin</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
		  <ul class="nav navbar-nav side-nav">
			<li class="active"><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<!-- <li><a href="charts.html"><i class="fa fa-bar-chart-o"></i> Charts</a></li>
			<li><a href="tables.html"><i class="fa fa-table"></i> Tables</a></li>
			<li><a href="forms.html"><i class="fa fa-edit"></i> Forms</a></li>
			<li><a href="typography.html"><i class="fa fa-font"></i> Typography</a></li>
			<li><a href="bootstrap-elements.html"><i class="fa fa-desktop"></i> Bootstrap Elements</a></li>
			<li><a href="bootstrap-grid.html"><i class="fa fa-wrench"></i> Bootstrap Grid</a></li>
			<li><a href="blank-page.html"><i class="fa fa-file"></i> Blank Page</a></li> -->
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Dropdown <b class="caret"></b></a>
			  <ul class="dropdown-menu">
				<li><a href="#">Dropdown Item</a></li>
				<li><a href="#">Another Item</a></li>
				<li><a href="#">Third Item</a></li>
				<li><a href="#">Last Item</a></li>
			  </ul>
			</li>
		  </ul>

		  <ul class="nav navbar-nav navbar-right navbar-user">
			<li class="dropdown messages-dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge">7</span> <b class="caret"></b></a>
			  <ul class="dropdown-menu">
				<li class="dropdown-header">7 New Messages</li>
				<li class="message-preview">
				  <a href="#">
					<span class="avatar"><img src="http://placehold.it/50x50"></span>
					<span class="name">John Smith:</span>
					<span class="message">Hey there, I wanted to ask you something...</span>
					<span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
				  </a>
				</li>
				<li class="divider"></li>
				<li class="message-preview">
				  <a href="#">
					<span class="avatar"><img src="http://placehold.it/50x50"></span>
					<span class="name">John Smith:</span>
					<span class="message">Hey there, I wanted to ask you something...</span>
					<span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
				  </a>
				</li>
				<li class="divider"></li>
				<li class="message-preview">
				  <a href="#">
					<span class="avatar"><img src="http://placehold.it/50x50"></span>
					<span class="name">John Smith:</span>
					<span class="message">Hey there, I wanted to ask you something...</span>
					<span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
				  </a>
				</li>
				<li class="divider"></li>
				<li><a href="#">View Inbox <span class="badge">7</span></a></li>
			  </ul>
			</li>
			<li class="dropdown alerts-dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> Alerts <span class="badge">3</span> <b class="caret"></b></a>
			  <ul class="dropdown-menu">
				<li><a href="#">Default <span class="label label-default">Default</span></a></li>
				<li><a href="#">Primary <span class="label label-primary">Primary</span></a></li>
				<li><a href="#">Success <span class="label label-success">Success</span></a></li>
				<li><a href="#">Info <span class="label label-info">Info</span></a></li>
				<li><a href="#">Warning <span class="label label-warning">Warning</span></a></li>
				<li><a href="#">Danger <span class="label label-danger">Danger</span></a></li>
				<li class="divider"></li>
				<li><a href="#">View All</a></li>
			  </ul>
			</li>
			<li class="dropdown user-dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ $user->first_name }} <b class="caret"></b></a>
			  <ul class="dropdown-menu">
				<li><a href="{{{ action('RegisterController@index') }}}"><i class="fa fa-user"></i> Profile</a></li>
				<li><a href="{{{ action('HomeController@showReservation') }}}"><i class="fa fa-calendar-o"></i> Reserve a Spot!</a></li>
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
			  Welcome to SpotFinder {{$user->first_name}} {{$user->last_name}}!
			</div>
		  </div>
		</div><!-- /.row -->

		<div class="row">
		  <div class="col-lg-3">
			<div class="panel panel-info">
			  <div class="panel-heading">
				<div class="row">
				  <div class="col-xs-6">
					<i class="fa fa-users fa-5x"></i>
				  </div>
				  <div class="col-xs-6 text-right">
					<p class="announcement-heading">{{$users = count($users);}}</p>
					<p class="announcement-text">Existing Users</p>
				  </div>
				</div>
			  </div>
			  <a href="#">
				<div class="panel-footer announcement-bottom">
				  <div class="row">
					<div class="col-xs-6">
					  View Mentions
					</div>
					<div class="col-xs-6 text-right">
					  <i class="fa fa-arrow-circle-right"></i>
					</div>
				  </div>
				</div>
			  </a>
			</div>
		  </div>
		  <div class="col-lg-3">
			<div class="panel panel-warning">
			  <div class="panel-heading">
				<div class="row">
				  <div class="col-xs-6">
					<i class="fa fa-road fa-5x"></i>
				  </div>
				  <div class="col-xs-6 text-right">
					<p class="announcement-heading">{{$lots = count($lots);}}</p>
					<p class="announcement-text">Lots</p>
				  </div>
				</div>
			  </div>
			  <a href="#">
				<div class="panel-footer announcement-bottom">
				  <div class="row">
					<div class="col-xs-6">
					  Complete Tasks
					</div>
					<div class="col-xs-6 text-right">
					  <i class="fa fa-arrow-circle-right"></i>
					</div>
				  </div>
				</div>
			  </a>
			</div>
		  </div>
		  <div class="col-lg-3">
			<div class="panel panel-danger">
			  <div class="panel-heading">
				<div class="row">
				  <div class="col-xs-6">
					<i class="fa fa-calendar fa-5x"></i>
				  </div>
				  <div class="col-xs-6 text-right">
					<p class="announcement-heading">{{$reservations = count($reservations);}}</p>
					<p class="announcement-text">Reservations</p>
				  </div>
				</div>
			  </div>
			  <a href="#">
				<div class="panel-footer announcement-bottom">
				  <div class="row">
					<div class="col-xs-6">
					  Fix Issues
					</div>
					<div class="col-xs-6 text-right">
					  <i class="fa fa-arrow-circle-right"></i>
					</div>
				  </div>
				</div>
			  </a>
			</div>
		  </div>
		  <div class="col-lg-3">
			<div class="panel panel-success">
			  <div class="panel-heading">
				<div class="row">
				  <div class="col-xs-6">
					<i class="fa fa-truck fa-5x "></i>
				  </div>
				  <div class="col-xs-6 text-right">
					<p class="announcement-heading">{{$spaces = count($spaces);}}</p>
					<p class="announcement-text">Total Spaces</p>
				  </div>
				</div>
			  </div>
			  <a href="#">
				<div class="panel-footer announcement-bottom">
				  <div class="row">
					<div class="col-xs-6">
					  Complete Orders
					</div>
					<div class="col-xs-6 text-right">
					  <i class="fa fa-arrow-circle-right"></i>
					</div>
				  </div>
				</div>
			  </a>
			</div>
		  </div>
		</div><!-- /.row -->
	</div><!-- /#wrapper -->
@yield('content')

	<!-- JavaScript -->
	<script src="/assets/js/jquery-1.10.2.js"></script>
	<script src="/assets/js/bootstrap.js"></script>

	<!-- Page Specific Plugins -->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
	<script src="/assets/js/morris/chart-data-morris.js"></script>
	<script src="/assets/js/tablesorter/jquery.tablesorter.js"></script>
	<script src="/assers/js/tablesorter/tables.js"></script>
@yield('bottom-script')
  </body>
</html>
