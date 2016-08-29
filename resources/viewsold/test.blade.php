<!-- Latest compiled and minified CSS & JS -->
<link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<h1 class="btn">{{$data->title}}</h1>

<h3>{{$data->user->email}}</h3>

Listed in: <h5>{{$data->category->name}}</h5>


<ul id="usman">
    <li class="link"><a href="" class="ali"></a></li>
    <li class="link"><a href="" class="ali"></a></li>
    <li class="link"><a href="" class="ali"></a></li>
    <li class="link"><a href="" class="ali"></a></li>
    <li class="link"><a href="" class="ali"></a></li>
    <li class="link"><a href="" class="ali"></a></li>
    <li class="link"><a href="" class="ali"></a></li>
    <li class="link"><a href="" class="ali"></a></li>
</ul>

<div class="form-group">
    {{Form::label('test','test:')}}
    {{Form::text('test',null,['class'=>'form-control'])}}
</div>