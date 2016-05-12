@extends('frontend.master')

@section('content')
<div class="row">
	<!-- Blog Entries Column -->
	<div class="col-md-8">
		<h1 class="page-header">Latest Blog Posts</h1>

		@foreach($articles as $article)
			@include('frontend.articles.article', ['article' => $article])
		@endforeach
	</div>
	<!-- Blog Sidebar Widgets Column -->
	<div class="col-md-4">
		<div class="well">
			<h4>Blog Search</h4>
			<div class="input-group">
				<input class="form-control" type="text"/>
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
		</div>

		<!-- Blog Categories Well -->
		<div class="well">
			<h4>Blog Categories</h4>
			<div class="row">
				<div class="col-lg-6">
               @include('frontend.categories.index', ['categories' => $categories])
				</div>
			</div>
		</div>
	</div>
</div>
@stop
