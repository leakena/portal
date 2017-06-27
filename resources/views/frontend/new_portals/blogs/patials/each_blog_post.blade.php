@if(isset($posts))
    @foreach($posts as $post)

        <div class="col-md-1 pull-right no-padding">
            @if($post->create_uid == auth()->id())
                @include('frontend.new_portals.blogs.patials.dropdown_action')
            @endif
        </div>

        <div class="row blog blog-medium tag-box tag-box-v3 " style="margin-top: 5%">

            @if($post->file)

                <div class="col-md-2" style="padding-left: 0px">
                    @php
                        $split_str = explode('.', $post->file);
                        if (isset($split_str)){
                            $extention = $split_str[1];
                        }else{
                            $extention = '';
                        }
                    @endphp


                    @if($extention != 'png' && $extention != 'jpg' && $extention != 'jpeg')

                        @if($extention == 'pdf')

                            <a href="{{route('frontend.portal.view_pdf', $post->file)}}" target="_blank"
                               data-event-key="attachment:click" data-event-resource-type="file"
                               data-event-action="open" data-bypass="true">
                                {{--{{ $post->file }}--}}
                                {{--<a href="{{ asset('docs') }}/{{ $post->file }}" target="_blank">--}}
                                {{--<button class="btn btn-default btn-xs">Preview</button>--}}
                                {{--</a>--}}
                                <img class="img-responsive" src="{{asset('portals/icons/pdf.png')}}" alt="">
                            </a>
                        @endif

                        @if($extention == 'docx')
                            <a href="{{ asset('docs') }}/{{ $post->file }}" download="{{ $post->file }}">
                                <img class="img-responsive" src="{{asset('portals/icons/docx.png')}}" alt="">
                                {{--<img class="img-responsive" src="{{asset('portals/icons/new_docx.png')}}" alt="" style="margin: auto; ">--}}
                            </a>
                        @endif

                        @if($extention == 'pptx' || $extention == 'ppt')
                            <a href="{{ asset('docs') }}/{{ $post->file }}" download="{{ $post->file }}">

                                <img class="img-responsive" src="{{asset('portals/icons/pptx.png')}}" alt="">
                            </a>
                        @endif


                        @if($extention == 'xlsx' || $extention == 'xls')
                            <a href="#" target="_blank" data-event-key="attachment:click"
                               data-event-resource-type="file" data-event-action="open" data-bypass="true">
                                <img class="img-responsive" src="{{asset('portals/icons/xlsx.png')}}" alt="">
                            </a>
                        @endif
                    @else
                        <img class="img-responsive" src="{{ asset('img/frontend/uploads/images').'/'.$post->file }}"
                             alt="">
                    @endif
                    {{--<img class="img-responsive" src="{{ asset('img/frontend/uploads/images').'/'.$post->file }}" alt="">--}}

                </div>
                <div class="col-md-9 sm-margin-bottom-20 profile">
                    @include('frontend.new_portals.blogs.includes.post_contend')
                </div>
            @else

                <div class="col-md-12 sm-margin-bottom-20 profile">
                    @include('frontend.new_portals.blogs.includes.post_contend')
                </div>


            @endif


        </div>

    @endforeach

    @if(isset($last_post))
        <input type="hidden" class="last_post" id="last_post_id" value="{{ $last_post }}">
    @endif

@endif

