<dl class="dl-horizontal">
    <input type="hidden" class="education_id" name="hidden_id" value="{{ $education->id }}">
    <dt><strong><img src="{{asset('portals/icons/position.png')}}" alt=""> </strong></dt>
    <dd class="school">
        {{ $education->school }}
        <input type="hidden" name="hidden_school" value="{{ $education->school }}">
    </dd>
    <hr>
    <dt><strong><img src="{{asset('portals/icons/company.png')}}" alt="">  </strong></dt>
    <dd class="major">
        {{ $education->major }}
        <input type="hidden" name="hidden_major" value="{{ $education->major }}">

    </dd>
    <hr>
    <dt><strong><img src="{{asset('portals/icons/description.png')}}" alt="">  </strong></dt>
    <dd class="degree">

        {{ $education->degree->name }}

        <input type="hidden" name="hidden_degree_id" value="{{ $education->degree->id }}">
    </dd>
    <hr>
    <dt><strong><img src="{{asset('portals/icons/home.png')}}" alt="">  </strong></dt>
    <dd class="address">
        {{ $education->address }}
        <input type="hidden" name="hidden_address" value="{{ $education->address }}">
    </dd>
    <hr>
    @if($education->is_present == true)
        <dt><strong><img src="{{asset('portals/icons/calendar.png')}}" alt="">  </strong></dt>
        <dd class="date">
            {{ $education->start_date }} <span class="glyphicon glyphicon-random" style="color: green;" ></span> Present

            <input type="hidden" name="hidden_start_date" class="start" value="{{ DateManager::viewDate($education->start_date) }}">
            <input type="hidden" name="hidden_end_date" class="end" value="{{ DateManager::viewDate($education->end_date) }}">
            <input type="hidden" name="hidden_is_present" class="is_present" value="{{ $education->is_present }}">
        </dd>
    @else
        <dt><strong><img src="{{asset('portals/icons/calendar.png')}}" alt="">  </strong></dt>
        <dd class="date">
            {{ DateManager::viewDate($education->start_date) }} <span class="glyphicon glyphicon-random" style="color: green;" ></span> {{ DateManager::viewDate($education->end_date) }}

            <input type="hidden" name="hidden_start_date" class="start" value="{{ DateManager::viewDate($education->start_date) }}">
            <input type="hidden" name="hidden_end_date" class="end" value="{{ DateManager::viewDate($education->end_date) }}">
        </dd>
    @endif


</dl>