<div class="btn-group pull-right">
    {{--<button type="button" class="btn-u dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        Action
        <i class="fa fa-angle-down"></i>
    </button>--}}

    <span class="btn btn-xs dropdown-toggle" type="button"
          id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="true" data-toggle="tooltip" title=""
          data-widget="chat-pane-toggle" data-original-title="Setting">
                        <i class="icon-custom rounded-x icon-sm icon-color-u fa fa-lightbulb-o" > </i>
    </span>
    <ul class="dropdown-menu" role="menu">
        <li><a href="#" class="btn_edit_interest" data-toggle="modal" data-target="#edit_form_interest"><i
                        class="fa fa-edit "></i> Edit Reference</a></li>
        <li><a class="btn_delete_interest" href="{{ route('frontend.resume.remove_interest',$interest->id) }}"><i
                        class="fa fa-trash-o"></i> Delete Reference</a></li>
    </ul>
</div>