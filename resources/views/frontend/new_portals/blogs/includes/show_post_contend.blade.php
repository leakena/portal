<div class="profile-blog">

    <img class="rounded-x user_post_profile" data-placement="right" data-toggle="tooltip"
         title="{{ strtoupper(User::iPosted($post->create_uid)->name) }}"
         src="{{isset($post->user->resume->personalInfo->profile)?asset('img/backend/profile'.'/'. $post->user->resume->personalInfo->profile):asset('portals/assets/img/team/img32-md.jpg')}}"
         alt="">


    <h2 style="margin-top: -15px; margin-bottom: 0px"><a
                href="#">{{ isset($post->title)?$post->title:'' }}</a></h2>
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
    <p style="text-align: justify">

        {{$post->body}}
    </p>
    {{--<p><a class="btn-u btn-u-sm" href="blog_item.html">Read More <i
                    class="fa fa-angle-double-right margin-left-5"></i></a></p>--}}
</div>