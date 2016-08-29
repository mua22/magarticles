@extends('backend.master');

@section('content')

<table class="table table-bordered">
    <tr>
        <th>UserName</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    @foreach($records as $record)
        <tr>
            <td>{{$record->name}}</td>
            <td>{{$record->email}}</td>
            <td></td>
        </tr>
        @endforeach
</table>

    @stop

@section('title')
    Users
    @stop