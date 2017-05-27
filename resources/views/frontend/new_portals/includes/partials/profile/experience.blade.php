
<div class="panel-body margin-bottom-40">
    <ul class="timeline-v2 timeline-me" style="margin-left: 80px">
        @if(isset($resume))
            @if($experiences = $resume->experiences)
                @foreach($experiences as $experience)
                    <li>
                        <time datetime="" class="cbp_tmtime" style="margin-left: -70px !important; "><span style="width: 180px">{{ $experience->position }}</span>
                            <span style="width: 180px">
                                {{ $experience->start_date }} -
                                @if($experience->is_present == true)
                                    Present
                                @else
                                    {{ $experience->end_date }}
                                @endif
                            </span></time>
                        <i class="cbp_tmicon rounded-x hidden-xs"></i>
                        <div class="cbp_tmlabel">
                            <h2>{{ $experience->company }}</h2>
                            <p>{{ $experience->address }}</p>
                            <p>{{ $experience->description }}</p>
                        </div>
                    </li>

                    @endforeach
                @endif
        @endif
    </ul>
</div>