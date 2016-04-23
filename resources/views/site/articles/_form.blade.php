
<div class="form-group">
    {{Form::label('title','Title:')}}
    {{Form::text('title',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('body','body:')}}
    {{Form::textarea('body',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('published_at','Published On:')}}
    {{Form::input('date','published_at',date('Y-m-d'),['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('category_at','Category:')}}
    {{Form::select('tags',$categories,$selected_id,['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('Tags','Tags:')}}
    {{Form::select('tags[]',$tags,null,['class'=>'form-control','multiple'])}}
</div>
<div class="form-group">
    {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
</div>