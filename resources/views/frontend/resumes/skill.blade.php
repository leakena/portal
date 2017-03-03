<div role="tabpanel" id="skill" class="tab-pane mt-30">

    @if(isset($resume))
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary btn-sm" style="margin-bottom: 10px;" data-toggle="modal" data-target="#modal-save-skill"><i class="fa fa-plus-circle"></i> {{ trans('labels.frontend.button.add') }}</button>
                <div class="table-responsive">
                    <table class="table table-bordered" id="table-skill">
                        <tr>
                            <th>{{ trans('resume.resume.name') }}</th>
                            <th>{{ trans('resume.resume.action') }}</th>
                        </tr>
                        <tbody id="listSkills"></tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    <div class="modal fade" id="modal-save-skill" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{ trans('modlas.add.add_skill') }}</h4>
                </div>
                <form method="POST" action="/resume/skills/save-skill" id="form-save-skill">
                    {{ csrf_field() }}
                    <input type="hidden" id="resume_uid" name="resume_uid" value="{{ $resume->id }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="save-skill-name">{{ trans('resume.resume.name') }}</label>
                            <input type="text" id="save-skill-name" name="save-skill-name" class="form-control"
                                   placeholder="S{{ trans('modals.add.skill_name') }}">
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

    <div class="modal fade" id="modal-edit-skill" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{ trans('modals.update.update_skill') }}</h4>
                </div>
                <form method="POST" action="/resume/skills/update-skill" id="form-update-skill">
                    {{ csrf_field() }}
                    <input type="hidden" id="resume_uid" name="resume_uid" value="{{ $resume->id }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit-skill-name">{{ trans('resume.resume.name') }}</label>
                            <input type="text" id="edit-skill-name" name="edit-skill-name" class="form-control"
                                   placeholder="{{ trans('modals.add.skill_name') }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('buttons.general.close') }}</button>
                        <input type="submit" class="btn btn-primary" value="{{ trans('buttons.general.update') }}">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-delete-skill" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{ trans('modals.delete.delete_skill') }}</h4>
                </div>
                <form method="POST" action="/resume/skills/delete-skill" id="form-delete-skill">
                    {{ csrf_field() }}
                    <input type="hidden" id="resume_uid" name="resume_uid" value="{{ $resume->id }}">
                    <div class="modal-body">
                        <h5>{{ trans('modals.delete.confirm_de_skill') }}</h5>
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