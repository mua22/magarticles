<ul>
@foreach($categories as $category)
<li>
    <a href="{{url('/categories/'.$category->tree_slug)}}">{{$category->name}}</a>

    <ul>
        @foreach($category->descendants as $child)
            <li>
                <a href="{{url('/categories/'.$child->tree_slug)}}">{{$child->name}}</a>
            </li>

    @endforeach
    </ul>
</li>
    @endforeach
</ul>