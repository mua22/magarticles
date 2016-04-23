@extends('site.master')

@section('content')
<h3>{{$article->title}}</h3>
<p class="article">{{$article->body}}</p>
    @stop