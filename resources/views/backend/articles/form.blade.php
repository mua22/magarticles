<form class="form" method="post" action="{{isset($article) ? route('backend.articles.update', $article->id) : route('backend.articles.store')}}">
	<div class="box-body">
		<div class="form-group">
			<label for="title">Title:</label>
			<input class="form-control" type="text" name="title" value="{{isset($article->title)? $article->title: null}}"/>
		</div>
		<div class="form-group">
			<label for="body">Body:</label>
			<textarea class="form-control" name="body" cols="50" rows="10">{{isset($article->body)? $article->body: null}}</textarea>
		</div>
		<div class="form-group">
			<label for="date">Date:</label>
			<input class="form-control" type="date" name="date" value="{{isset($article->title)? $article->published_at->format('d/m/Y'): date('d/m/Y')}}"/>
		</div>
		<div class="form-group">
			<select class="form-control" name="category_id">
				@foreach($categoryList as $key => $category)
					@if($key == (isset($article->category_id) ? $article->category_id : null))
						<option value="{{$key}}" selected="selected">{{$category}}</option>
					@else
						<option value="{{$key}}">{{$category}}</option>
					@endif
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<select class="form-control" name="tags[]" multiple="multiple">
				@foreach($tagsList as $key => $tag)
					@if(isset($article) && in_array($key, $article->tags()->lists('id', 'id')->toArray()))
						<option value="{{$key}}" selected="selected">{{$tag}}</option>
					@else
						<option value="{{$key}}">{{$tag}}</option>
					@endif
				@endforeach
			</select>
		</div>
		<input type="hidden" name="user_id" value="{{Auth::user()->id}}"></input>
		<input type="hidden" name="_token" value="{{csrf_token()}}"></input>
		@if(isset($article))
			<input type="hidden" name="_method" value="put">
		@endif
		<div class="form-group">
			<input class="btn btn-primary form-control" value="Submit" type="submit">
		</div>
	</div>
</form>
