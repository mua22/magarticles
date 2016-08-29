@extends('backend.master')

@section('content')
	<section class="content-header">
		<h1>Dashboard</h1>
	</section>
	<div class="content">
		@if(Session::has('flash_message'))
			<div class="alert alert-success">
				{{Session::get('flash_message')}}
			</div>
		@endif
	</div>
@stop