<!DOCTYPE html>
<html>
<head>
	<title></title>
	<title>MagArticles</title>

	<!-- Fonts -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="{{asset('admin/bootstrap/css/bootstrap.css')}}">
	<link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">

</head>
<body>
	<!-- Navigation -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{route('homepage')}}">MagArticles</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
               @if(Auth::user())
                  <li><a href="{{route('backend.dashboard')}}">Backend</a></li>
                  <li><a href="{{url('logout')}}">Logout</a></li>
               @else
                  <li><a href="{{url('login')}}">Login</a></li>
               @endif
				</ul>
			</div>
		</div>
	</nav>

	<!-- Content -->
	<div class="container">
		@if(Session::has('flash_message'))
			<div class="alert alert-success">{{Session::get('flash_message')}}</div>
		@endif
		@yield('content')
    </div>
</body>
</html>
