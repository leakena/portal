<div role="tabpanel" id="languages" class="tab-pane mt-30">
	@if(isset($resume))
		<div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary btn-sm" style="margin-bottom: 10px;" data-toggle="modal" data-target="#modal-save-language"><i class="fa fa-plus-circle"></i> Add</button>
                <div class="table-responsive">
                    <table class="table table-bordered" id="table-language">
                        <tr>
                            <th>Name</th>
                            <th>Degree</th>
                            <th>Action</th>
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
                    <h4 class="modal-title" id="myModalLabel">Add more language</h4>
                </div>
                <form method="POST" action="/resume/save-language" id="form-save-language">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <input type="hidden" name="resume_uid" value="{{ $resume->id }}" id="resume_uid"/>
                        <div class="form-group">
                            <label for="save-language">Major</label>
                            <input type="text" name="save-language" id="save-language" class="form-control"
                                   placeholder="Major" value="{{ old('save-language') }}">
                        </div>

                        <div class="form-group">
                            <label for="save-degree">Degree</label>
                            <select name="save-degree" class="form-control" id="save-degree">
                                <option name="Medium">Medium</option>
                                <option name="Good">Good</option>
                                <option name="Excellent">Excellent</option>
                            </select>
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

    <div class="modal fade" id="modal-edit-language" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Update the language</h4>
                </div>
                <form method="POST" action="/resume/edit-language" id="form-update-language">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <input type="hidden" name="resume_uid" value="{{ $resume->id }}" id="resume_uid"/>
                        <div class="form-group">
                            <label for="update-language">Major</label>
                            <input type="text" name="update-language" id="update-language" class="form-control"
                                   placeholder="Major" value="{{ old('save-language') }}">
                        </div>

                        <div class="form-group">
                            <label for="update-degree">Degree</label>
                            <select name="update-degree" class="form-control" id="update-degree">
                                <option name="Medium">Medium</option>
                                <option name="Good">Good</option>
                                <option name="Excellent">Excellent</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input id="save" type="submit" value="Update" class="btn btn-info">
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
                    <h4 class="modal-title" id="myModalLabel">Delete the language</h4>
                </div>
                <form method="POST" action="/resume/languages/delete-language" id="form-delete-language">
                    {{ csrf_field() }}
                    <input type="hidden" id="resume_uid" name="resume_uid" value="{{ $resume->id }}">
                    <div class="modal-body">
                        <h5>Do you want to delete the language?</h5>
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