@extends('backend.master')
@section('title')
	 Editing {{$record->name}}
@stop
@section('content')
	@include('backend.tags.form', ['record' => $record])
@stop