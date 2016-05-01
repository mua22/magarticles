@extends('backend.master')
@section('content')
	 Editing {{$record->name}}
@stop
@section('content')
	@include('backend.tags.form', ['record' => $record])
@stop