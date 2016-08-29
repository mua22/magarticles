@extends('backend.master')
@section('title')
	 Editing {{$record->name}}
@stop
@section('content')
	@include('backend.tags._form', ['record' => $record])
@stop