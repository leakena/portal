<div role="tabpanel" id="contact" class="tab-pane mt-30">

    @if(isset($resume))
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary btn-sm" style="margin-bottom: 10px;" data-toggle="modal" data-target="#modal-save-contact"><i class="fa fa-plus-circle"></i> {{ trans('labels.frontend.button.add') }}</button>
                <div class="table-responsive">
                    <table class="table table-bordered" id="table-contact">
                        <tr>
                            <th>{{ trans('resume.resume.description') }}</th>
                            <th>{{ trans('resume.resume.action') }}</th>
                        </tr>
                        <tbody id="listContact"></tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

        <div class="modal fade" id="modal-save-contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add a new contact</h4>
                    </div>
                    <form method="POST" action="/resume/contacts/save-contact" id="form-save-contact">
                        {{ csrf_field() }}
                        <input type="hidden" id="resume_uid" name="resume_uid" value="{{ $resume->id }}">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="save-contact-icon">ICON</label>
                                <input type="text" id="save-contact-icon" name="save-contact-icon" class="form-control"
                                       placeholder="Icon Name">
                            </div>
                            <div class="form-group">
                                <label for="save-contact-name">Description</label>
                                <input type="text" id="save-contact-name" name="save-contact-name" class="form-control"
                                       placeholder="Skill Name">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-edit-contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Update the contact</h4>
                    </div>
                    <form method="POST" action="/resume/contacts/update-contact" id="form-update-contact">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <input type="hidden" id="resume_uid" name="resume_uid" value="{{ $resume->id }}">
                            <div class="form-group">
                                <label for="update-contact-icon">ICON</label>
                                <input type="text" id="update-contact-icon" name="update-contact-icon" class="form-control"
                                       placeholder="Icon Name">
                            </div>
                            <div class="form-group">
                                <label for="update-contact-name">Description</label>
                                <input type="text" id="update-contact-name" name="update-contact-name" class="form-control"
                                       placeholder="Skill Name">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-delete-contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Delete the skill</h4>
                    </div>
                    <form method="POST" action="/resume/contacts/delete-contact" id="form-delete-contact">
                        {{ csrf_field() }}
                        <input type="hidden" id="resume_uid" name="resume_uid" value="{{ $resume->id }}">
                        <div class="modal-body">
                            <h5>Do you want to delete the skill?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>