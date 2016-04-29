@extends('backend.master')

@section('content')
	<section class="content-header">
		<h1>Articles</h1>
	</section>
	<div class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Create Articles</h3>
					</div>
					@include('backend.admin.articles.form')
				</div>
			</div>
		</div>
	</div>
@stop