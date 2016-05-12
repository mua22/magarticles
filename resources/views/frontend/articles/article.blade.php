<h2><a href="{{route('frontend.article.show', $article->slug)}}">{{$article->title}}</a></h2>
	<p><span class="glyphicon glyphicon-time"></span> {{$article->created_at->format('d/m/Y')}}</p>
	<p>{{$article->body}}</p>
<hr>