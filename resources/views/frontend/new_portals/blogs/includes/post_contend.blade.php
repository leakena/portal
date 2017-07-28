<div class="profile-blog">

    <img class="rounded-x user_post_profile" data-placement="right" data-toggle="tooltip"
         title="{{ strtoupper(User::iPosted($post->create_uid)->name) }}"
         src="{{isset(User::iPosted($post->create_uid)->resume->personalInfo->profile)?asset('img/backend/profile'.'/'. User::iPosted($post->create_uid)->resume->personalInfo->profile):asset('portals/assets/img/team/img32-md.jpg')}}"
         alt="" style="width: 70px; height: 70px">

    {{--{{ dd(User::iPosted($post->create_uid)->resume) }}--}}


    <h2 class="margin-top-10" ><a
                href="#"><strong>{{ isset($post->title)?$post->title:'' }}</strong></a></h2>
    {{--<h2 style="margin-top: -15px; margin-bottom: 0px" ><a href="#">{{ strtoupper(User::iPosted($post->create_uid)->name) }}</a></h2>--}}
    <ul class="list-unstyled list-inline blog-info">
        <li><i class="fa fa-calendar"></i> {{DateManager::fullDate($post->created_at)}}</li>
        {{--<li><i class="fa fa-comments"></i> <a href="#">24 Comments</a></li>--}}
        <li>
            <i class="fa fa-tags"></i>
            @if(isset($tagBypostIds[$post->id]))
                <?php $str = ''; $check = [];?>
                @foreach($tagBypostIds[$post->id] as $tag)

                    @if(!in_array($collectionTags[$tag->category_tag_id]->tag_id, $check))
                        <?php $str .= $collectionTags[$tag->category_tag_id]->name . ', '; $check[] = $collectionTags[$tag->category_tag_id]->tag_id?>
                    @else
                        @continue
                    @endif
                @endforeach
                {{trim($str, ', ')}}
            @endif
        </li>
    </ul>
    <p class="margin-left-10 post_content" style="text-align: justify">
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        {!! str_limit($post->body, $limit = 200, $end = '...<a class="see_more" style="color: #3498db;" href=""> See more</a>') !!}
    </p>
    {{--<p><a class="btn-u btn-u-sm" href="blog_item.html">Read More <i
                    class="fa fa-angle-double-right margin-left-5"></i></a></p>--}}
</div>