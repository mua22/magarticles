@extends('site.master');

@section('content')

    @if(!empty($articles))
    @foreach($articles as $article)
        @include('site.articles._article_summary',array('article'=>$article))
    @endforeach
    @endif
@if(!empty($articles))
<div class="pagination_area">
    <nav>
        {{$articles->links()}}
    </nav>
</div>
@endif
    @stop
@section('sidebar')
    <div class="single_bottom_rightbar">
        <h2>Articles in {{$pageCategory->name}}</h2>
        @if(!empty($categories))
            <ul>
                @foreach($categories as $category)
                    <li><a href="/category/{{$category->tree_slug}}">{{$category->name}}</a></li>
                @endforeach


            </ul>
            <h2>Contribute</h2>
            <ul>
                <li><a href="/articles/create/{{$pageCategory->tree_slug}}">Submit Article Here</a></li>
                <li><a href="">Ask Question Here</a></li>
            </ul>
        @endif
    </div>
    @stop

@section('breadcrumb')
    {!! Breadcrumbs::render('category', $pageCategory) !!}
@stop
