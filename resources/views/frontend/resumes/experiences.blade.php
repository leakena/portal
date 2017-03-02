<div role="tabpanel" id="experiences" class="tab-pane mt-30">
    @if(isset($resume))
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary btn-sm" style="margin-bottom: 10px;" data-toggle="modal"
                        data-target="#addExperiences"><i class="fa fa-plus-circle"></i> Add
                </button>
                <div class="table-responsive">
                    <table class="table table-bordered" id="experiences">
                        <tr>
                            <th>Position</th>
                            <th>Company</th>
                            <th>Description</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Action</th>
                        </tr>
                        <tbody id="listExperiences"></tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    <div class="modal fade" id="addExperiences" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add more experiences</h4>
                </div>
                <form method="POST" action="/resume/save-experience" id="save-experience">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <input type="hidden" name="resume_uid" value="{{ $resume->id }}" id="resume_uid"/>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" name="position" id="position" class="form-control"
                                   placeholder="Position" value="{{ old('position') }}">
                        </div>
                        <div class="form-group">
                            <label for="company">Company Name</label>
                            <input type="text" name="company" id="company" class="form-control"
                                   placeholder="Company" value="{{ old('company') }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description"
                                          rows="6" placeholder="Type description here..."
                                          value="{{ old('description') }}"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="description">Start Date</label>
                            <div class="input-group">
                                <input type="text" data-date-format="yyyy-mm-dd" id="start_date"
                                       name="start_date" class="form-control"
                                       placeholder="Start Date" value="{{ old('start_date') }}">
                                                    <span class="input-group-addon" id="basic-addon1"><i
                                                                class="fa fa-calendar"></i></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">End Date</label>
                            <div class="input-group">
                                <input type="text" id="end_date" data-date-format="yyyy-mm-dd"
                                       name="end_date" class="form-control" placeholder="End Date"
                                       value="{{ old('end_date') }}">
                                                    <span class="input-group-addon" id="end_date"><i
                                                                class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input id="save" type="submit" value="Save" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editExperiences" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit experience</h4>
                </div>
                <form method="POST" action="/resume/update-experience" id="update-experience">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <input type="hidden" name="resume_uid" value="{{ $resume->id }}"/>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" name="position" id="edit_position" class="form-control"
                                   placeholder="Position" value="{{ old('position') }}">
                        </div>
                        <div class="form-group">
                            <label for="company">Company Name</label>
                            <input type="text" name="company" id="edit_company" class="form-control"
                                   placeholder="Company" value="{{ old('company') }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="edit_description"
                                          rows="6" placeholder="Type description here..."
                                          value="{{ old('description') }}"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="description">Start Date</label>
                            <div class="input-group">
                                <input type="text" data-date-format="yyyy-mm-dd" id="edit_start_date"
                                       name="start_date" class="form-control"
                                       placeholder="Start Date" value="{{ old('start_date') }}">
                                                    <span class="input-group-addon" id="basic-addon1"><i
                                                                class="fa fa-calendar"></i></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">End Date</label>
                            <div class="input-group">
                                <input type="text" id="edit_end_date" data-date-format="yyyy-mm-dd"
                                       name="end_date" class="form-control" placeholder="End Date"
                                       value="{{ old('end_date') }}">
                                                    <span class="input-group-addon" id="end_date"><i
                                                                class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" value="Update"
                               class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteExperiences" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Delete experience</h4>
                </div>
                <form method="POST" action="/resume/remove-experience" id="remove-experience">
                    <div class="modal-body">
                        <input type="hidden" name="remove_resume_uid" id="remove_resume_uid">
                        <input type="hidden" name="remove_experience_id" id="remove_experience_id"/>
                        <h5>Do you want to delete the experience?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>