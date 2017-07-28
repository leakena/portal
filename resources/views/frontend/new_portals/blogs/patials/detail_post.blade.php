<div class="col-md-1 pull-right no-padding">
    @if($post->create_uid == auth()->id())
        @include('frontend.new_portals.blogs.patials.dropdown_action')
    @endif
</div>

<div class="row blog blog-medium tag-box tag-box-v3 " style="margin-top: 5%">

    @if($post->file)
        <div class="col-md-12 sm-margin-bottom-20 profile">
            @include('frontend.new_portals.blogs.includes.post_contend')
        </div>


        <div class="col-md-12 margin-left-10">
            @php
                $split_strs = explode('.', $post->file);
                if (isset($split_strs)){
                    foreach ($split_strs as $split_str){
                        if($split_str == end($split_strs)){
                            $extention = $split_str;
                        }
                    }
                }else{
                    $extention = '';
                }
            @endphp

            <div class="col-md-2">
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
                            {{--<img class="img-responsive" src="{{asset('portals/icons/docx.png')}}" alt="">--}}
                            <img class="img-responsive" src="{{asset('portals/icons/word.png')}}" alt="">
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
            </div>
            <div class="col-md-10">

                @if($extention == 'png' || $extention == 'jpg' || $extention == 'jpeg')

                    {{--<a href="{{route('frontend.portal.view_pdf', $post->file)}}" target="_blank"--}}
                    {{--data-event-key="attachment:click" data-event-resource-type="file"--}}
                    {{--data-event-action="open" data-bypass="true">--}}
                    <a href="#" target="_blank" data-event-key="attachment:click"
                       data-event-resource-type="file" data-event-action="open" data-bypass="true">
                        @php
                            $split_strs = explode('_', $post->file);
                                if (count($split_strs) == 1){
                                    $file = $split_strs[0];
                                }elseif(count($split_strs) > 1){
                                    $file = $split_strs[1];
                                }
                        @endphp

                        <p>{{ $file }}</p>
                        <div class="btn-group">
                            <a href="{{ asset('img/frontend/uploads/images') }}/{{ $post->file }}"
                               download="{{ $post->file }}">
                                <button class="btn btn-default btn-xs">
                                    Download
                                </button>
                            </a>
                            <a href="{{ asset('img/frontend/uploads/images') }}/{{ $post->file }}"
                               target="_blank">
                                <button class="btn btn-default btn-xs">Preview</button>
                            </a>
                        </div>
                    </a>
                @elseif($extention == 'pdf')
                    <a href="#" target="_blank" data-event-key="attachment:click"
                       data-event-resource-type="file" data-event-action="open" data-bypass="true">
                        @php
                            $split_strs = explode('_', $post->file, 2);
                                if (count($split_strs) == 1){
                                    $file = $split_strs[0];
                                }elseif(count($split_strs) > 1){
                                    $file = $split_strs[1];
                                }
                        @endphp

                        <p>{{ $file }}</p>
                    </a>
                    <div class="btn-group">
                        <a href="{{ asset('docs') }}/{{ $post->file }}" download="{{ $post->file }}">
                            <button class="btn btn-default btn-xs">
                                Download
                            </button>
                        </a>
                        <a href="{{ asset('docs') }}/{{ $post->file }}" target="_blank">
                            <button class="btn btn-default btn-xs">Preview</button>
                        </a>
                    </div>
                @else
                    <a href="#" target="_blank" data-event-key="attachment:click"
                       data-event-resource-type="file" data-event-action="open" data-bypass="true">
                        @php
                            $split_strs = explode('_', $post->file, 2);
                                if (count($split_strs) == 1){
                                    $file = $split_strs[0];
                                }elseif(count($split_strs) > 1){
                                    $file = $split_strs[1];
                                }
                        @endphp

                        <p>{{ $file }}</p>
                    </a>
                    <div class="btn-group">
                        <a href="{{ asset('docs') }}/{{ $post->file }}" download="{{ $post->file }}">
                            <button class="btn btn-default btn-xs">
                                Download
                            </button>
                        </a>
                    </div>
                @endif
            </div>

            {{--<img class="img-responsive" src="{{ asset('img/frontend/uploads/images').'/'.$post->file }}" alt="">--}}

        </div>

    @else

        <div class="col-md-12 sm-margin-bottom-20 profile">
            @include('frontend.new_portals.blogs.includes.post_contend')
        </div>


    @endif


</div>