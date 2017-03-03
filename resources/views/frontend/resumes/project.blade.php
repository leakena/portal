<div role="tabpanel" id="project" class="tab-pane mt-30">
    @if(isset($resume))
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary btn-sm" style="margin-bottom: 10px;" data-toggle="modal"
                        data-target="#modal-save-project"><i class="fa fa-plus-circle"></i> {{ trans('labels.frontend.button.add') }}
                </button>
                <div class="table-responsive">
                    <table class="table table-bordered" id="projects">
                        <tr>
                            <th>{{ trans('resume.resume.name') }}</th>
                            <th>{{ trans('resume.resume.description') }}</th>
                            <th>{{ trans('resume.resume.action') }}</th>
                        </tr>
                        <tbody id="listProjects"></tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
                <!-- Modal -->
        <div class="modal fade" id="modal-save-project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{ trans('modals.add.add_project') }}</h4>
                    </div>
                    <form method="POST" action="/resume/projects/save-project" id="form-save-project">
                        {{ csrf_field() }}
                        <input type="hidden" id="resume_uid" name="resume_uid" value="{{ $resume->id }}">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="project-name">{{ trans('resume.resume.name') }}</label>
                                <input type="text" id="project-name" name="name" class="form-control"
                                       placeholder="{{ trans('modals.add.project_name') }}">
                            </div>
                            <div class="form-group">
                                <label for="project-desc">{{ trans('resume.resume.description') }}</label>
                            <textarea name="description" id="projet-desc" class="form-control"
                                      placeholder="{{ trans('resume.resume.description') }}"></textarea>
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

        <div class="modal fade" id="modal-edit-project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{ trans('modals.update.update_project') }}</h4>
                    </div>
                    <form method="POST" action="/resume/projects/edit-project" id="form-edit-project">
                        {{ csrf_field() }}
                        <input type="hidden" id="resume_uid" name="resume_uid" value="{{ $resume->id }}">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="project-name">{{ trans('resume.resume.name') }}</label>
                                <input type="text" id="edit-project-name" name="name" class="form-control"
                                       placeholder="{{ trans('modals.add.project_name') }}">
                            </div>
                            <div class="form-group">
                                <label for="project-desc">{{ trans('resume.resume.description') }}</label>
                        <textarea name="description" id="edit-project-desc" class="form-control"
                                  placeholder="{{ trans('resume.resume.description') }}"></textarea>
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

        <div class="modal fade" id="modal-delete-project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{ trans('modals.delete.delete_project') }}</h4>
                    </div>
                    <form method="POST" action="/resume/projects/delete-project" id="form-delete-project">
                        {{ csrf_field() }}
                        <input type="hidden" id="resume_uid" name="resume_uid" value="{{ $resume->id }}">
                        <div class="modal-body">
                            <h5>{{ trans('modals.delete.confirm_de_project') }}</h5>
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