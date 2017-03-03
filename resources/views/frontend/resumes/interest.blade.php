<div role="tabpanel" id="interests" class="tab-pane mt-30">
    @if(isset($resume))
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary btn-sm" style="margin-bottom: 10px;" data-toggle="modal"
                        data-target="#modal-save-interest"><i class="fa fa-plus-circle"></i> {{ trans('labels.frontend.button.add') }}
                </button>
                <div class="table-responsive">
                    <table class="table table-bordered" id="table-interest">
                        <tr>
                            <th>{{ trans('resume.resume.name') }}</th>
                            <th>{{ trans('resume.resume.action') }}</th>
                        </tr>
                        <tbody id="listInterests"></tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    <div class="modal fade" id="modal-save-interest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{ trans('modals.add.add_interest') }}</h4>
                </div>
                <form method="POST" action="/resume/save-interest" id="form-save-interest">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <input type="hidden" name="resume_uid" value="{{ $resume->id }}" id="resume_uid"/>
                        <div class="form-group">
                            <label for="save-interest">{{ trans('resume.resume.name') }}</label>
                            <input type="text" name="save-interest" id="save-interest" class="form-control"
                                   placeholder="{{ trans('resume.resume.name') }}" value="{{ old('save-interest') }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('buttons.general.close') }}</button>
                        <input id="save" type="submit" value="{{ trans('buttons.general.save') }}" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-edit-interest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{ trans('modals.update.update_interest') }}</h4>
                </div>
                <form method="POST" action="/resume/edit-interest" id="form-update-interest">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <input type="hidden" name="resume_uid" value="{{ $resume->id }}" id="resume_uid"/>
                        <div class="form-group">
                            <label for="update-interest">{{ trans('resume.resume.name') }}</label>
                            <input type="text" name="update-interest" id="update-interest" class="form-control"
                                   placeholder="{{ trans('resume.resume.name') }}" value="{{ old('update-interest') }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('buttons.general.close') }}</button>
                        <input id="save" type="submit" value="{{ trans('buttons.general.update') }}" class="btn btn-info">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-delete-interest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{ trans('modals.delete.delete_interest') }}</h4>
                </div>
                <form method="POST" action="/resume/interests/delete-interest" id="form-delete-interest">
                    {{ csrf_field() }}
                    <input type="hidden" id="resume_uid" name="resume_uid" value="{{ $resume->id }}">
                    <div class="modal-body">
                        <h5>{{ trans('modals.delete.confirm_de_interest') }}</h5>
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