@extends('backend.master')

@section('title')
	Articles List
@stop
@section('content')
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">All Articles</h3>
		</div>
		<div class="box-body no-padding">
			<table class="table table-striped">
				<tbody>
					<tr>
						<th style="width: 10px">#</th>
						<th>Title</th>
						<th>Action</th>
					</tr>
					@foreach($articles as $article)
						<tr>
							<td>{{$article->id}}</td>
							<td>{{$article->title}}</td>
							<td>
								<a class="btn btn-info btn-sm" href="{{route('backend.articles.edit', $article->id)}}">Update</a>
								{{ Form::open(['route' => ['backend.articles.destroy', $article->id], 'method' => 'delete', 'style' => 'display:inline']) }}
									<button type="submit" class="btn btn-danger btn-sm">Delete</button>
								{{ Form::close() }}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{{$articles->links()}}
		</div>
	</div>
@stop