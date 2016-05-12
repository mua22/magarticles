<form class="form" method="post" action="{{isset($record) ? route("backend.tags.update", $record->id) : route("backend.tags.store")}}">
	<div class="box-body">
		<div class="form-group">
			<label for="title">Name:</label>
			<input class="form-control" type="text" name="name" value="{{isset($record->name)? $record->name: null}}"/>
		</div>
		<input type="hidden" name="_token" value="{{csrf_token()}}"></input>
		@if(isset($record))
			<input type="hidden" name="_method" value="put">
		@endif
		<div class="form-group">
			<input class="btn btn-primary form-control" value="Submit" type="submit">
		</div>
</form>