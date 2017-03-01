<div role="tabpanel" id="interests" class="tab-pane mt-30">
	@if(isset($resume))
		<div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary btn-sm" style="margin-bottom: 10px;" data-toggle="modal" data-target="#addExperiences"><i class="fa fa-plus-circle"></i> Add</button>
                <div class="table-responsive">
                    <table class="table table-bordered" id="experiences">
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        <tbody id="listInterests"></tbody>
                    </table>
                </div>
            </div>
        </div>
	@endif
</div>