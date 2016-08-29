@extends('backend.master')
@section('title')
	 Editing {{$record->name}}
@stop
@section('content')
	@include('backend.categories.categories._form', ['record' => $record])
@stop