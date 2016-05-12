<ul>
   @foreach($categories as $category)
      <li>
         <a href="#">{{$category->name}}</a>
            <ul>
               @foreach($category->descendants as $child)
                  <li><a href="#">{{$child->name}}</a></li>
               @endforeach
            </ul>
      </li>
   @endforeach
</ul>
