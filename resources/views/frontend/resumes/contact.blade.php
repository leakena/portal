<div role="tabpanel" id="contact" class="tab-pane mt-30">

    @if(isset($resume))
        <form method="POST" action="/resume/contact" class="form-horizontal">
            {{ csrf_field() }}

            <input type="hidden" name="resume_uid" value="{{ $resume->id }}"/>

            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Icon</label>
                <div class="col-md-6">
                    <input type="text" name="icon" class="form-control"/>
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Description</label>
                <div class="col-md-6">
                    <input type="text" name="description" id="description"
                           class="form-control" placeholder="Description">
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