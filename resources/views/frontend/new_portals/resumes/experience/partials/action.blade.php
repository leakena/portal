<div class="btn-group pull-right">
    {{--<button type="button" class="btn-u dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        Action
        <i class="fa fa-angle-down"></i>
    </button>--}}

    <span class="btn btn-box-tool dropdown-toggle" type="button"
          id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="true" data-toggle="tooltip" title=""
          data-widget="chat-pane-toggle" data-original-title="Setting">
                        {{--<i class="icon-custom rounded-x icon-sm icon-color-u fa fa-lightbulb-o"></i>--}}
        <i class="icon-color-dark-blue fa fa-cog" style="border: hidden"></i>
    </span>
    <ul class="dropdown-menu" role="menu">
        <li><a href="#" class="btn_edit_experience" data-toggle="modal" data-target="#edit_form"><i
                        class="fa fa-edit "></i> Edit Experience</a></li>
        <li><a class="btn_delete_experience" href="{{ route('frontend.resume.remove_experience',$experience->id) }}"><i
                        class="fa fa-trash-o"></i> Delete Experience</a></li>
    </ul>
</div>