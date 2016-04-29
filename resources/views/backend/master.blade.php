<!DOCTYPE html>
<html>
<head>
	<title>MagArticles Backend</title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="{{asset('admin/bootstrap/css/bootstrap.min.css')}}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{asset('admin/css/AdminLTE.min.css')}}">
	<!-- AdminLTE Skins. Choose a skin from the css/skinsfolder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="{{asset('admin/css/skins/_all-skins.min.css')}}">
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<!-- Header starts from here -->
		<header class="main-header">
			<a href="{{route('backend.welcome')}}" class="logo"><span class="logo-mini"><b>A</b>LT</span><span class="logo-lg"><b>Admin</b>LTE</span></a>
			<nav class="navbar navbar-static-top">
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<span class="hidden-xs">{{Auth::user()->name}}</span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-header">
									<img src="{{asset('admin/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
									<p>{{Auth::user()->name}}</p>
								</li>
								<li class="user-footer">
									<div class="pull-right">
										<a href="{{url('/logout')}}" class="btn btn-default btn-flat">Sign out</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
	    </header>

		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<section class="sidebar">
				<ul class="sidebar-menu">
					<li class="header">MAIN NAVIGATION</li>
					<li>
						<a href="{{route('backend.admin.articles.create')}}">
							<i class="fa fa-users"></i><span>Create Articles</span>
							<small class="label pull-right bg-green">new</small>
						</a>
					</li>
				</ul>
			</section>
		</aside>

		<!-- main content area -->
		<div class="content-wrapper">
			@yield('content')
		</div>
	</div>

	<!-- jQuery 2.2.0 -->
	<script src="{{asset('admin/plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="{{asset('admin/bootstrap/js/bootstrap.min.js')}}"></script>
	<!-- FastClick -->
	<script src="{{asset('admin/plugins/fastclick/fastclick.js')}}"></script>
	<!-- AdminLTE App -->
	<script src="{{asset('admin/js/app.min.js')}}"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="{{asset('admin/js/demo.js')}}"></script>
</body>
</html>