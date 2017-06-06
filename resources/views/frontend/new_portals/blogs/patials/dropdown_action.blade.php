<div class="btn-group pull-right">
    <i class=" btn fa fa-angle-down dropdown-toggle" style="font-size: 14pt"  data-toggle="dropdown" aria-expanded="false"></i>
    <ul class="dropdown-menu" role="menu">
        <li>
            <a href="{{route('frontend.portal.ajax_edit_post', $post->id)}}" class="btn_edit_post">
                <i class="fa fa-edit"> </i>
                Edit Post
            </a>
        </li>

        <li><a href="{{route('frontend.portal.delete_blog_post', $post->id)}}" class="btn_delete_post"><i class="fa fa-trash-o"></i> Delete Post</a></li>
        {{--<li class="divider"></li>
        <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>--}}
    </ul>
</div>