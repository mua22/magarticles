@extends('layouts.app')

@section('content')
    <h1>Edit: {{$article->title}}</h1>
    {{Form::model($article,['url'=>'articles/'.$article->id,'method'=>'PATCH'])}}
    @include('articles._form');

    {{Form::close()}}
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)

                <li>{{$error}}</li>

            @endforeach
        </ul>
    @endif
    @stop