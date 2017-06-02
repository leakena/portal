@if(isset($posts))

    @foreach($posts as $post)


        <div class="col-md-1 pull-right no-padding">
            @if($post->create_uid == auth()->id())
                @include('frontend.new_portals.blogs.patials.dropdown_action')
            @endif
        </div>

        <div class="row blog blog-medium tag-box tag-box-v3 " style="margin-top: 5%">
            <div class="col-md-3" style="padding-left: 0px">
                @if($post->file)
                    <?php $split_str = explode('.', $post->file); $extention = $split_str[1]; ?>

                    @if($extention != 'png' && $extention != 'jpg')

                        @if($extention == 'pdf')

                            <a href="{{route('frontend.portal.view_pdf', $post->file)}}" target="_blank" data-event-key="attachment:click" data-event-resource-type="file" data-event-action="open" data-bypass="true">
                                <img class="img-responsive" src="{{asset('portals/icons/pdf.png')}}" alt="">
                            </a>
                        @endif

                        @if($extention == 'docx')
                            <a href="{{route('frontend.portal.view_pdf', $post->file)}}" target="_blank" data-event-key="attachment:click" data-event-resource-type="file" data-event-action="open" data-bypass="true">
                                <img class="img-responsive" src="{{asset('portals/icons/docx.png')}}" alt="">
                            </a>
                        @endif

                        @if($extention == 'pptx' || $extention == 'ppt')
                            <a  href="{{route('frontend.portal.view_pdf', $post->file)}}" target="_blank" data-event-key="attachment:click" data-event-resource-type="file" data-event-action="open" data-bypass="true">
                                <img class="img-responsive" src="{{asset('portals/icons/pptx.png')}}" alt="">
                            </a>
                        @endif


                        @if($extention == 'xlsx' || $extention == 'xls')
                            <a href="#" target="_blank" data-event-key="attachment:click" data-event-resource-type="file" data-event-action="open" data-bypass="true">
                                <img class="img-responsive" src="{{asset('portals/icons/xlsx.png')}}" alt="">
                            </a>
                        @endif
                    @else
                            <img class="img-responsive" src="{{asset('img/frontend/uploads/images').'/'.$post->file}}" alt="">
                    @endif
                @else
                    <h1>No File or Image</h1>

                @endif
            </div>
            <div class="col-md-8 no-padding" style="margin-top: 0px">
                <h2 style="margin-top: -15px; margin-bottom: 0px" ><a href="#">{{ strtoupper(User::iPosted($post->create_uid)->name) }}</a></h2>
                <ul class="list-unstyled list-inline blog-info">
                    <li><i class="fa fa-calendar"></i> {{DateManager::fullDate($post->created_at)}}</li>
                    {{--<li><i class="fa fa-comments"></i> <a href="#">24 Comments</a></li>--}}
                    <li>
                        <i class="fa fa-tags"></i>
                        @if(isset($tagBypostIds[$post->id]))
                            <?php $str=''; $check = [];?>
                            @foreach($tagBypostIds[$post->id] as $tag)

                                @if(!in_array($collectionTags[$tag->category_tag_id]->tag_id, $check))
                                        <?php $str .= $collectionTags[$tag->category_tag_id]->name.', '; $check[] = $collectionTags[$tag->category_tag_id]->tag_id?>
                                @else
                                    @continue
                                @endif
                            @endforeach
                            {{trim($str, ', ')}}
                        @endif
                    </li>
                </ul>
                <p> {{$post->body}}</p>
                {{--<p><a class="btn-u btn-u-sm" href="blog_item.html">Read More <i
                                class="fa fa-angle-double-right margin-left-5"></i></a></p>--}}
            </div>
        </div>

    @endforeach

@endif

