<dl class="dl-horizontal">
    <input type="hidden" class="reference_id" name="hidden_id" value="{{ $reference->id }}">
    <dt><strong><img src="{{asset('portals/icons/description.png')}}" alt=""> </strong></dt>
    <dd class="name">
        {{ $reference->name }}
        <input type="hidden" name="hidden_position" value="{{ $reference->name }}">
    </dd>
    <hr>
    <dt><strong><img src="{{asset('portals/icons/position.png')}}" alt=""> </strong></dt>
    <dd class="position">
        {{ $reference->position }}
        <input type="hidden" name="hidden_company" value="{{ $reference->position }}">

    </dd>
    <hr>
    <dt><strong><img src="{{asset('portals/icons/phone.png')}}" alt=""> </strong></dt>
    <dd class="phone">
        {{ $reference->phone }}
        <input type="hidden" name="hidden_address" value="{{ $reference->phone }}">
    </dd>

    <hr>
    <dt><strong><img src="{{asset('portals/icons/email.png')}}" alt=""> </strong></dt>
    <dd class="email">
        {{ $reference->email }}

        <input type="hidden" name="hidden_description" value="{{ $reference->email }}">
    </dd>

</dl>