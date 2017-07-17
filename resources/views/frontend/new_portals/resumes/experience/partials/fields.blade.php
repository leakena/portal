<dl class="dl-horizontal">
    <input type="hidden" class="experience_id" name="hidden_id" value="{{ $experience->id }}">
    <dt><strong><i class="fa fa-id-badge fa-lg icon-color-dark-blue" style="border: hidden"></i> </strong></dt>
    <dd class="position">
        {{ $experience->position }}
        <input type="hidden" name="hidden_position" value="{{ $experience->position }}">
    </dd>
    <hr>
    <dt><strong><i class="fa fa-university fa-lg icon-color-dark-blue" style="border: hidden"></i> </strong></dt>
    <dd class="company">
        {{ $experience->company }}
        <input type="hidden" name="hidden_company" value="{{ $experience->company }}">

    </dd>
    <hr>
    <dt><strong><i class="fa fa-home fa-lg icon-color-dark-blue" style="border: hidden"></i> </strong></dt>
    <dd class="address">
        {{ $experience->address }}
        <input type="hidden" name="hidden_address" value="{{ $experience->address }}">
    </dd>
    <hr>
    @if($experience->is_present == true)
        <dt><strong><i class="fa fa-calendar fa-lg icon-color-dark-blue" style="border: hidden"></i> </strong></dt>
        <dd class="date">
            {{ DateManager::viewDate($experience->start_date) }} <span class="glyphicon glyphicon-random" style="color: green;"></span> Present

            <input type="hidden" name="hidden_start_date" class="start" value="{{ DateManager::viewDate($experience->start_date) }}">
            <input type="hidden" name="hidden_end_date" class="end" value="{{ DateManager::viewDate($experience->end_date) }}">
            <input type="hidden" name="hidden_is_present" class="is_present" value="{{ $experience->is_present }}">
        </dd>
    @else
        <dt><strong><i class="fa fa-calendar fa-lg icon-color-dark-blue" style="border: hidden"></i></strong></dt>
        <dd class="date">
            {{ DateManager::viewDate($experience->start_date) }} <span class="glyphicon glyphicon-random"
                                                style="color: green;"> </span> {{ DateManager::viewDate($experience->end_date) }}

            <input type="hidden" name="hidden_start_date" class="start" value="{{ DateManager::viewDate($experience->start_date) }}">
            <input type="hidden" name="hidden_end_date" class="end" value="{{ DateManager::viewDate($experience->end_date) }}">
        </dd>
    @endif
    <hr>
    <dt><strong><i class="fa fa-newspaper-o fa-lg icon-color-dark-blue" style="border: hidden"></i> </strong></dt>
    <dd class="description">
        {{ $experience->description }}

        <input type="hidden" name="hidden_description" value="{{ $experience->description }}">
    </dd>

</dl>