<div role="tabpanel" id="education" class="tab-pane mt-30">

    @if(isset($resume))
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary btn-sm" style="margin-bottom: 10px;" data-toggle="modal" data-target="#modal-save-education"><i class="fa fa-plus-circle"></i> {{ trans('labels.frontend.button.add') }}</button>
                <div class="table-responsive">
                    <table class="table table-bordered" id="table-education">
                        <tr>
                            <th>{{ trans('resume.resume.major') }}</th>
                            <th>{{ trans('resume.resume.school') }}</th>
                            <th>{{ trans('resume.resume.start_date') }}</th>
                            <th>{{ trans('resume.resume.end_date') }}</th>
                            <th>{{ trans('resume.resume.action') }}</th>
                        </tr>
                        <tbody id="listEducations"></tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

        <div class="modal fade" id="modal-save-education" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{ trans('modals.add.add_education') }}</h4>
                    </div>
                    <form method="POST" action="/resume/save-education" id="form-save-education">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <input type="hidden" name="resume_uid" value="{{ $resume->id }}" id="resume_uid"/>
                            <div class="form-group">
                                <label for="save-major">{{ trans('resume.resume.major') }}</label>
                                <input type="text" name="save-major" id="save-major" class="form-control"
                                       placeholder="Major" value="{{ old('save-major') }}">
                            </div>

                            <div class="form-group">
                                <label for="save-school">{{ trans('resume.resume.school') }}</label>
                                <input type="text" name="save-school" id="save-school" class="form-control"
                                       placeholder="{{ trans('resume.resume.school') }}" value="{{ old('save-school') }}">
                            </div>

                            <div class="form-group">
                                <label for="description">{{ trans('resume.resume.start_date') }}</label>
                                <div class="input-group">
                                    <input type="text" data-date-format="yyyy-mm-dd" id="save-start-date-education"
                                           name="save-start-date-education" class="form-control"
                                           placeholder="{{ trans('resume.resume.start_date') }}" value="{{ old('save-start-date-education') }}">
                                                    <span class="input-group-addon"><i
                                                                class="fa fa-calendar"></i></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description">{{ trans('resume.resume.end_date') }}</label>
                                <div class="input-group">
                                    <input type="text" id="save-end-date-education" data-date-format="yyyy-mm-dd"
                                           name="save-end-date-education" class="form-control" placeholder="{{ trans('resume.resume.end_date') }}"
                                           value="{{ old('save-end-date-education') }}">
                                                    <span class="input-group-addon"><i
                                                                class="fa fa-calendar"></i></span>
                                </div>
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

        <div class="modal fade" id="modal-edit-education" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{ trans('modals.update.update_education') }}</h4>
                    </div>
                    <form method="POST" action="/resume/update-education" id="form-update-education">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <input type="hidden" name="resume_uid" value="{{ $resume->id }}" id="resume_uid"/>
                            <div class="form-group">
                                <label for="update-major">{{ trans('resume.resume.major') }}</label>
                                <input type="text" name="update-major" id="update-major" class="form-control"
                                       placeholder="{{ trans('resume.resume.major') }}" value="{{ old('update-major') }}">
                            </div>

                            <div class="form-group">
                                <label for="update-school">{{ trans('resume.resume.school') }}</label>
                                <input type="text" name="update-school" id="update-school" class="form-control"
                                       placeholder="{{ trans('resume.resume.school') }}" value="{{ old('update-school') }}">
                            </div>

                            <div class="form-group">
                                <label for="description">{{ trans('resume.resume.start_date') }}</label>
                                <div class="input-group">
                                    <input type="text" data-date-format="yyyy-mm-dd" id="update-start-date-education"
                                           name="update-start-date-education" class="form-control"
                                           placeholder="{{ trans('resume.resume.start_date') }}" value="{{ old('update-start-date-education') }}">
                                                    <span class="input-group-addon"><i
                                                                class="fa fa-calendar"></i></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description">{{ trans('resume.resume.end_date') }}</label>
                                <div class="input-group">
                                    <input type="text" id="update-end-date-education" data-date-format="yyyy-mm-dd"
                                           name="update-end-date-education" class="form-control" placeholder="{{ trans('resume.resume.end_date') }}"
                                           value="{{ old('update-end-date-education') }}">
                                                    <span class="input-group-addon"><i
                                                                class="fa fa-calendar"></i></span>
                                </div>
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

        <div class="modal fade" id="modal-delete-education" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{ trans('modals.delete.delete_education') }}</h4>
                    </div>
                    <form method="POST" action="/resume/educations/delete-education" id="form-delete-education">
                        {{ csrf_field() }}
                        <input type="hidden" id="resume_uid" name="resume_uid" value="{{ $resume->id }}">
                        <div class="modal-body">
                            <h5>{{ trans('modals.delete.confirm_de_education') }}</h5>
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