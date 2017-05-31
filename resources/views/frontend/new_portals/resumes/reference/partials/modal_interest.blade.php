<div class="modal fade" id="edit_form_interest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel4">Edit Your Experience</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="{{ route('frontend.resume.save_interest') }}" method="post"
                          enctype="multipart/form-data" id="form_edit_interest" class="sky-form form-horizontal">
                        {{csrf_field()}}
                        <fieldset>
                            @include('frontend.new_portals.resumes.reference.partials.interest_field')
                        </fieldset>
                    </form>
                </div>

            </div>
            {{--<div class="modal-footer">
                <button type="button" class="btn-u btn-u-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn-u btn-u-primary">Save changes</button>
            </div>--}}
        </div>
    </div>
</div>