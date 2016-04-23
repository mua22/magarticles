@extends('site.master');
@section('content')
<h1>Create New Article</h1>


        {{Form::open(['url'=>'articles'])}}
    @include('site.articles._form');

        {{Form::close()}}
        @include('errors.list')
    @stop
