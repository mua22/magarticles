<form class="form" method="post" action="{{isset($record) ? route("backend.categories.update", $record->id) : route("backend.categories.store")}}\">
<div class="form-group">
			{{Form::label('name','Name:')}}
			{{Form::text('name',isset($record->name)? $record->name: null,['class'=>'form-control'])}}
		</div>
<div class="form-group">
			{{Form::label('node_depth','Node_depth:')}}
			{{Form::text('node_depth',isset($record->node_depth)? $record->node_depth: null,['class'=>'form-control'])}}
		</div>
<div class="form-group">
			{{Form::label('article_count','Article_count:')}}
			{{Form::text('article_count',isset($record->article_count)? $record->article_count: null,['class'=>'form-control'])}}
		</div>
<div class="form-group">
			{{Form::label('child_count','Child_count:')}}
			{{Form::text('child_count',isset($record->child_count)? $record->child_count: null,['class'=>'form-control'])}}
		</div>
<div class="form-group">
			{{Form::label('tree_slug','Tree_slug:')}}
			{{Form::text('tree_slug',isset($record->tree_slug)? $record->tree_slug: null,['class'=>'form-control'])}}
		</div>
<div class="form-group">
			{{Form::label('_lft','_lft:')}}
			{{Form::text('_lft',isset($record->_lft)? $record->_lft: null,['class'=>'form-control'])}}
		</div>
<div class="form-group">
			{{Form::label('_rgt','_rgt:')}}
			{{Form::text('_rgt',isset($record->_rgt)? $record->_rgt: null,['class'=>'form-control'])}}
		</div>
<div class="form-group">
			{{Form::label('parent_id','Parent_id:')}}
			{{Form::text('parent_id',isset($record->parent_id)? $record->parent_id: null,['class'=>'form-control'])}}
		</div>
<input type="hidden" name="_token" value="{{csrf_token()}}"></input>

		@if(isset($record))
			<input type="hidden" name="_method" value="put">
		@endif
<div class="form-group">
			{{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
		</div>

</form>