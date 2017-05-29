<div class="panel-body">
    <ul class="timeline-v2 timeline-me" style="margin-left: 80px">
        @if(isset($resume))
            @if($educations = $resume->educations)
                @foreach($educations as $education)
                    {{--{{dd($education->degree)}}--}}
                    <li>
                        <time datetime="" class="cbp_tmtime" style="margin-left: -70px !important; "><span style="width: 180px">{{ $education->degree->name }}</span>
                            <span style="width: 160px">
                                {{ $education->start_date }} -
                                @if($education->is_present == true)
                                    Present
                                @else
                                    {{ $education->end_date }}
                                @endif
                            </span>
                        </time>
                        <i class="cbp_tmicon rounded-x hidden-xs"></i>
                        <div class="cbp_tmlabel">
                            <h2>{{ $education->school }}</h2>
                            <p>{{ $education->major }}</p>
                            <p>{{ $education->address }}</p>
                        </div>
                    </li>
                @endforeach
            @endif
        @endif
    </ul>
</div>