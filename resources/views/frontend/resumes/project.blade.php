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
                        <h4 class="modal-title" id="myModalLabel">Add a new project</h4>
                    </div>
                    <form method="POST" action="/resume/projects/save-project" id="form-save-project">
                        {{ csrf_field() }}
                        <input type="hidden" id="resume_uid" name="resume_uid" value="{{ $resume->id }}">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="project-name">Name</label>
                                <input type="text" id="project-name" name="name" class="form-control"
                                       placeholder="Project Name">
                            </div>
                            <div class="form-group">
                                <label for="project-desc">Description</label>
                            <textarea name="description" id="projet-desc" class="form-control"
                                      placeholder="Description"></textarea>
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

        <div class="modal fade" id="modal-edit-project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Update the project</h4>
                    </div>
                    <form method="POST" action="/resume/projects/edit-project" id="form-edit-project">
                        {{ csrf_field() }}
                        <input type="hidden" id="resume_uid" name="resume_uid" value="{{ $resume->id }}">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="project-name">Name</label>
                                <input type="text" id="edit-project-name" name="name" class="form-control"
                                       placeholder="Project Name">
                            </div>
                            <div class="form-group">
                                <label for="project-desc">Description</label>
                        <textarea name="description" id="edit-project-desc" class="form-control"
                                  placeholder="Description"></textarea>
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

        <div class="modal fade" id="modal-delete-project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Delete the project</h4>
                    </div>
                    <form method="POST" action="/resume/projects/delete-project" id="form-delete-project">
                        {{ csrf_field() }}
                        <input type="hidden" id="resume_uid" name="resume_uid" value="{{ $resume->id }}">
                        <div class="modal-body">
                            <h5>Do you want to delete the project?</h5>
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