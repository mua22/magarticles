<form class="form" method="post" action="{{isset($record) ? route("backend.tags.update", $record->id) : route("backend.tags.store")}}\">
<div class="form-group">
			{{Form::label('name','Name:')}}
			{{Form::text('name',isset($record->name)? $record->name: null,['class'=>'form-control'])}}
		</div>
<input type="hidden" name="_token" value="{{csrf_token()}}"></input>

		@if(isset($record))
			<input type="hidden" name="_method" value="put">
		@endif
<div class="form-group">
			{{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
		</div>

</form>