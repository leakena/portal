<div class="panel-body">
    <ul class="timeline-v2 timeline-me" style="margin-left: 80px">
        @if(isset($resume))
            @if($references = $resume->references)
                @foreach($references as $reference)
                    {{--{{dd($education->degree)}}--}}
                    <li>
                        <time datetime="" class="cbp_tmtime" style="margin-left: -70px !important; "><span style="width: 180px">{{ $reference->name }}</span>
                            <span style="width: 160px">
                                {{ $reference->position }}
                            </span>
                        </time>
                        <i class="cbp_tmicon rounded-x hidden-xs"></i>
                        <div class="cbp_tmlabel">
                            <p>{{ $reference->phone }}</p>
                            <p>{{ $reference->email }}</p>
                        </div>
                    </li>
                @endforeach
            @endif
        @endif
    </ul>
</div>