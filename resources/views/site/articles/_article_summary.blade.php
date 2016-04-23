<article>

    <h2 class=""><a href="{{url('/articles',$article->slug)}}">
            {{$article->title}}

        </a></h2>
    <div class="comments_box">
        <span class="meta_date">{{$article->published_at->diffForHumans()}}</span>
        <span class="meta_comment">{{$article->comment_count}} Comments</span>
        <span>In: {{$article->category->name}}</span>
        <span class="fb-share-button" data-href="{{url('/articles',$article->id)}}" data-layout="button" data-mobile-iframe="false"></span>
    </div>


    <p>{{$article->body}}</p>
</article>

