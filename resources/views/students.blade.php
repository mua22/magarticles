@extends('layouts.app')
<table class="table">
    <tr>
        <td>Name</td>
        <td>Age</td>
    </tr>
    @foreach($students as $student)
    <tr>
        <td>{{$student->name}}</td>
        <td>{{$student->age}}</td>
    </tr>
    @endforeach
</table>

</body>
</html>
