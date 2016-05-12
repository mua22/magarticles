@extends('frontend.master')

@section('content')
	<div class="col-md-12">
		@include('frontend.articles.article', ['article' => $article])
      <div class="tags">
         Tags: 
         @foreach($article->tags as $tag)
            <a href="#"> {{$tag->name}}</a>
         @endforeach
      </ul>
	</div>
@stop
