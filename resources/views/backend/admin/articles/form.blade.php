<form class="form" method="post" action="{{isset($article) ? route('backend.articles.update', $article->id) : route('backend.articles.store')}}">
	<div class="box-body">
		<div class="form-group">
			{{Form::label('title','Title:')}}
			{{Form::text('title',isset($article->title)? $article->title: null,['class'=>'form-control'])}}
		</div>
		<div class="form-group">
			{{Form::label('body','body:')}}
			{{Form::textarea('body',isset($article->body)? $article->body: null,['class'=>'form-control'])}}
		</div>
		<div class="form-group">
			{{Form::label('published_at','Published On:')}}
			{{Form::input('date','published_at', isset($article->title)? $article->published_at: date('Y-m-d'),['class'=>'form-control'])}}
		</div>
		<div class="form-group">
			{{Form::label('category_at','Category:')}}
			{{Form::select('category_id',$categoryList=[], isset($article->category_id)? $article->category_id: null, ['class'=>'form-control'])}}
		</div>


		<div class="form-group">
			{{Form::label('Tags','Tags:')}}
			{{Form::select('tags[]', $tagsList=[], isset($article->id) ? $article->tags()->lists('id', 'id')->toArray() : [null], ['class'=>'form-control','multiple'])}}
		</div>
		<div class="form-group">
			{{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
		</div>
		<input type="hidden" name="user_id" value="{{Auth::user()->id}}"></input>
		<input type="hidden" name="_token" value="{{csrf_token()}}"></input>

		@if(isset($article))
			<input type="hidden" name="_method" value="put">
		@endif
    </div>
</form>
