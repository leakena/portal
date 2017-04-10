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
                        <h4 class="modal-title" id="myModalLabel">{{ trans('modals.add.add_contact') }}</h4>
                    </div>
                    <form method="POST" action="/resume/contacts/save-contact" id="form-save-contact">
                        {{ csrf_field() }}
                        <input type="hidden" id="resume_uid" name="resume_uid" value="{{ $resume->id }}">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="save-contact-icon">{{ trans('resume.add.icon') }}</label>
                                <input type="text" id="save-contact-icon" name="save-contact-icon" class="form-control"
                                       placeholder="{{ trans('modals.add.icon_name') }}">
                            </div>
                            <div class="form-group">
                                <label for="save-contact-name">{{ trans('resume.resume.description') }}</label>
                                <input type="text" id="save-contact-name" name="save-contact-name" class="form-control"
                                       placeholder="Skill Name">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('buttons.general.close') }}</button>
                            <input type="submit" class="btn btn-primary" value="{{ trans('buttons.general.save') }}">
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
                        <h4 class="modal-title" id="myModalLabel">{{ trans('modals.update.update_contact') }}</h4>
                    </div>
                    <form method="POST" action="/resume/contacts/update-contact" id="form-update-contact">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <input type="hidden" id="resume_uid" name="resume_uid" value="{{ $resume->id }}">
                            <div class="form-group">
                                <label for="update-contact-icon">{{ trans('resume.add.icon') }}</label>
                                <input type="text" id="update-contact-icon" name="update-contact-icon" class="form-control"
                                       placeholder="{{ trans('modals.add.icon_name') }}">
                            </div>
                            <div class="form-group">
                                <label for="update-contact-name">{{ trans('resume.resume.description') }}</label>
                                <input type="text" id="update-contact-name" name="update-contact-name" class="form-control"
                                       placeholder="{{ trans('resume.resume.name') }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('buttons.general.close') }}</button>
                            <input type="submit" class="btn btn-info" value="{{ trans('buttons.general.update') }}">
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
                        <h4 class="modal-title" id="myModalLabel">{{ trans('modals.delete.delete_contact') }}</h4>
                    </div>
                    <form method="POST" action="/resume/contacts/delete-contact" id="form-delete-contact">
                        {{ csrf_field() }}
                        <input type="hidden" id="resume_uid" name="resume_uid" value="{{ $resume->id }}">
                        <div class="modal-body">
                            <h5>{{ trans('modals.delete.confirm_de_contact') }}</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('buttons.general.close') }}</button>
                            <input type="submit" class="btn btn-danger" value="{{ trans('buttons.general.delete') }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>