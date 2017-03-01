<div role="tabpanel" id="career_profile" class="tab-pane mt-30 active">
    <div class="row">
        <div class="col-md-12">
            @if(!isset($resume  ))
                <button class="btn btn-primary btn-sm" style="margin-bottom: 10px;" data-toggle="modal" data-target="#addCareerProfile"><i class="fa fa-plus-circle"></i> Add</button>
            @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="career-profile">
                        <tr>
                            <th>Summary Resume</th>
                            <th>Action</th>
                        </tr>
                        <tbody id="listCareerProfile"></tbody>
                    </table>
                </div>
        </div>
    </div>

    {{--modal--}}
    <div class="modal fade" id="modal-edit-career-profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Summary Resume</h4>
                </div>
                <form method="POST" action="/resume/update-career-profile" id="update-career-profile">
                    {{ csrf_field() }}
                    <input type="hidden" id="resume_uid" name="resume_uid" value="{{ $resume->id }}"/>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="career-profile">Career Profile</label>
                            <textarea id="content-resume-profile" name="content-resume-profile" class="form-control" rows="4"></textarea>
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

</div>