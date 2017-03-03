<div role="tabpanel" id="languages" class="tab-pane mt-30">
	@if(isset($resume))
		<div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary btn-sm" style="margin-bottom: 10px;" data-toggle="modal" data-target="#modal-save-language"><i class="fa fa-plus-circle"></i> {{ trans('labels.frontend.button.add') }}</button>
                <div class="table-responsive">
                    <table class="table table-bordered" id="table-language">
                        <tr>
                            <th>{{ trans('resume.resume.name') }}</th>
                            <th>{{ trans('resume.resume.degree') }}</th>
                            <th>{{ trans('resume.resume.action') }}</th>
                        </tr>
                        <tbody id="listLanguages"></tbody>
                    </table>
                </div>
            </div>
        </div>
	@endif
    <div class="modal fade" id="modal-save-language" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{ trans('modals.add.add_language') }}</h4>
                </div>
                <form method="POST" action="/resume/save-language" id="form-save-language">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <input type="hidden" name="resume_uid" value="{{ $resume->id }}" id="resume_uid"/>
                        <div class="form-group">
                            <label for="save-language">{{ trans('modals.add.language_name') }}</label>
                            <input type="text" name="save-language" id="save-language" class="form-control"
                                   placeholder="Language name" value="{{ old('save-language') }}">
                        </div>

                        <div class="form-group">
                            <label for="save-degree">{{ trans('resume.resume.degree') }}</label>
                            <select name="save-degree" class="form-control" id="save-degree">
                                <option name="Medium">{{ trans('modals.option.degree_me') }}</option>
                                <option name="Good">{{ trans('modals.option.degree_good') }}</option>
                                <option name="Excellent">{{ trans('modals.option.degree_excellent') }}</option>
                            </select>
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

    <div class="modal fade" id="modal-edit-language" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{ trans('modals.update.update_language') }}</h4>
                </div>
                <form method="POST" action="/resume/edit-language" id="form-update-language">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <input type="hidden" name="resume_uid" value="{{ $resume->id }}" id="resume_uid"/>
                        <div class="form-group">
                            <label for="update-language">{{ trans('resume.resume.major') }}</label>
                            <input type="text" name="update-language" id="update-language" class="form-control"
                                   placeholder="{{ trans('resume.resume.major') }}" value="{{ old('save-language') }}">
                        </div>

                        <div class="form-group">
                            <label for="update-degree">{{ trans('resume.resume.degree') }}</label>
                            <select name="update-degree" class="form-control" id="update-degree">
                                <option name="Medium">{{ trans('modals.option.degree_me') }}</option>
                                <option name="Good">{{ trans('modals.option.degree_good') }}</option>
                                <option name="Excellent">{{ trans('modals.option.degree_excellent') }}</option>
                            </select>
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

    <div class="modal fade" id="modal-delete-language" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{ trans('modals.delete.delete_language') }}</h4>
                </div>
                <form method="POST" action="/resume/languages/delete-language" id="form-delete-language">
                    {{ csrf_field() }}
                    <input type="hidden" id="resume_uid" name="resume_uid" value="{{ $resume->id }}">
                    <div class="modal-body">
                        <h5>{{ trans('modals.delete.confirm_de_language') }}</h5>
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