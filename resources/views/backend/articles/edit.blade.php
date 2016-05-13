@extends('backend.master')

@section('title')
	Editing Article {{$article->title}}
@stop
@section('content')
	<div class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">{{$article->title}}</h3>
					</div>
					@include('backend.articles.form', ['article' => $article]);
				</div>
			</div>
		</div>
	</div>
@stop