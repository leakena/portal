
<ul class="list-unstyled blog-tags margin-bottom-30">

    @if(isset($categories))
        @foreach($categories as $category)
            <li>
                <a href="#" class="btn rounded btn-xs btn-twitter fa-fixed">
                    <i class="fa  fa-object-group"></i>
                    {{$category->name}}
                </a>
            </li>
        @endforeach

    @endif
</ul>