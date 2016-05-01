@extends('backend.master')
@section('content')
<table class='table'>
	<tbody>
		<tr>
			<th>id</th>
			<th>name</th>
			<th>slug</th>
			<th>created_at</th>
			<th>updated_at</th>
			<th>Actions</th>
		</tr>
		@foreach($records as $record)
			<tr>
				<td>{{$record->id}}</td>
				<td>{{$record->name}}</td>
				<td>{{$record->slug}}</td>
				<td>{{$record->created_at}}</td>
				<td>{{$record->updated_at}}</td>
				<td><a class="btn btn-info btn-sm" href="{{route('backend.tags.edit', $record->id)}}">Update</a></td>
			</tr>
		@endforeach
	</tbody>
</table>
@stop