<ul class="list-unstyled blog-tags margin-bottom-30">

    @if(isset($tags))

        @foreach($tags as $tag)
            <li>
                <a href="#">
                    <i class="fa fa-tags"></i>
                    {{$tag->name}}
                </a>
            </li>
        @endforeach

    @endif



    {{--<li><a href="#"><i class="fa fa-tags"></i> Music</a></li>
    <li><a href="#"><i class="fa fa-tags"></i> Internet</a></li>
    <li><a href="#"><i class="fa fa-tags"></i> Money</a></li>
    <li><a href="#"><i class="fa fa-tags"></i> Google</a></li>
    <li><a href="#"><i class="fa fa-tags"></i> TV Shows</a></li>
    <li><a href="#"><i class="fa fa-tags"></i> Education</a></li>
    <li><a href="#"><i class="fa fa-tags"></i> People</a></li>
    <li><a href="#"><i class="fa fa-tags"></i> People</a></li>
    <li><a href="#"><i class="fa fa-tags"></i> Math</a></li>
    <li><a href="#"><i class="fa fa-tags"></i> Photos</a></li>
    <li><a href="#"><i class="fa fa-tags"></i> Electronics</a></li>
    <li><a href="#"><i class="fa fa-tags"></i> Apple</a></li>
    <li><a href="#"><i class="fa fa-tags"></i> Canada</a></li>--}}
</ul>