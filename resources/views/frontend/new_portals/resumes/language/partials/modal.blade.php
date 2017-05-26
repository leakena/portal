<div class="modal fade" id="edit_form" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel4">Edit Your Language</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="{{ route('frontend.resume.update_language') }}" method="post"
                          enctype="multipart/form-data" id="form_edit_language" class="sky-form"
                          novalidate="novalidate">
                        <fieldset>
                            @include('frontend.new_portals.resumes.language.partials.create_edit_fields')
                            <footer>
                                <button type="submit" class="btn-u pull-left update">Update</button>
                                <div class="progress"></div>
                            </footer>
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