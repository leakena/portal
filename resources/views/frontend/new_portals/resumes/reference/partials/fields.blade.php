<dl class="dl-horizontal">
    <input type="hidden" class="reference_id" name="hidden_id" value="{{ $reference->id }}">
    <dt><strong><i class="fa fa-user icon-color-dark-blue fa-lg" style="border: hidden"></i></strong></dt>
    <dd class="name">
        {{ $reference->name }}
        <input type="hidden" name="hidden_position" value="{{ $reference->name }}">
    </dd>
    <hr>
    <dt><strong><i class="fa fa-id-badge icon-color-dark-blue fa-lg" style="border: hidden"></i></strong></dt>
    <dd class="position">
        {{ $reference->position }}
        <input type="hidden" name="hidden_company" value="{{ $reference->position }}">

    </dd>
    <hr>
    <dt><strong><i class="fa fa-phone icon-color-dark-blue fa-lg" style="border: hidden"></i> </strong></dt>
    <dd class="phone">
        {{ $reference->phone }}
        <input type="hidden" name="hidden_address" value="{{ $reference->phone }}">
    </dd>

    <hr>
    <dt><strong><i class="fa fa-envelope icon-color-dark-blue fa-lg" style="border: hidden"></i> </strong></dt>
    <dd class="email">
        {{ $reference->email }}

        <input type="hidden" name="hidden_description" value="{{ $reference->email }}">
    </dd>

</dl>