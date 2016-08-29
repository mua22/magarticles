@extends('backend.master')
@section('content')
<table class='table'>
	<tbody>
		<tr>
			<th>id</th>
			<th>name</th>
			<th>slug</th>
			<th>node_depth</th>
			<th>article_count</th>
			<th>child_count</th>
			<th>tree_slug</th>
			<th>_lft</th>
			<th>_rgt</th>
			<th>parent_id</th>
			<th>created_at</th>
			<th>updated_at</th>
			<th>Actions</th>
		</tr>
		@foreach($records as $record)
			<tr>
				<td>{{$record->id}}</td>
				<td>{{$record->name}}</td>
				<td>{{$record->slug}}</td>
				<td>{{$record->node_depth}}</td>
				<td>{{$record->article_count}}</td>
				<td>{{$record->child_count}}</td>
				<td>{{$record->tree_slug}}</td>
				<td>{{$record->_lft}}</td>
				<td>{{$record->_rgt}}</td>
				<td>{{$record->parent_id}}</td>
				<td>{{$record->created_at}}</td>
				<td>{{$record->updated_at}}</td>
				<td><a class="btn btn-info btn-sm" href="{{route('backend.categories.edit', $record->id)}}"><i class="fa fa-btn fa-edit"></i>Update</a>
			<form action="{{ route('backend.categories.destroy',$record->id) }}" method="POST" class='inline'>
						{!! csrf_field() !!}
						{!! method_field('DELETE') !!}

						<button type="submit" id="delete-task-{{ $record->id }}" class="btn btn-danger btn-sm">
							<i class="fa fa-btn fa-trash"></i>Delete
						</button>
					</form></td>
			</tr>
		@endforeach
	</tbody>
</table>
@stop