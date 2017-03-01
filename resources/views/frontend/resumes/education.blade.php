<div role="tabpanel" id="education" class="tab-pane mt-30">

    @if(isset($resume))
        <form method="POST" action="/resume/education" class="form-horizontal">
            {{ csrf_field() }}
            <input type="hidden" name="resume_uid" value="{{ $resume->id }}"/>
            <div class="form-group">
                <label for="major" class="col-md-4 control-label">Major</label>
                <div class="col-md-6">
                    <input type="text" name="major" id="major" class="form-control"
                           placeholder="Major">
                </div>
            </div>
            <div class="form-group">
                <label for="school" class="col-md-4 control-label">School</label>
                <div class="col-md-6">
                    <input type="text" name="school" id="school" class="form-control"
                           placeholder="School">
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-md-4 control-label">Description</label>
                <div class="col-md-6">
												<textarea class="form-control" name="description" id="description"
                                                          rows="6" placeholder="Type description here..."></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-md-4 control-label">Start Date</label>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" data-date-format="yyyy-mm-dd" id="start_date"
                               name="start_date" class="form-control"
                               placeholder="Start Date">
													<span class="input-group-addon" id="basic-addon1"><i
                                                                class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-md-4 control-label">End Date</label>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" id="end_date" data-date-format="yyyy-mm-dd"
                               name="end_date" class="form-control" placeholder="End Date">
													<span class="input-group-addon" id="end_date"><i
                                                                class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <input id="update-profile" type="submit" value="Save"
                           class="btn btn-primary">
                </div>
            </div>
        </form>
    @endif
</div>