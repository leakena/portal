<div role="tabpanel" id="languages" class="tab-pane mt-30">
	@if(isset($resume))
		<div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary btn-sm" style="margin-bottom: 10px;" data-toggle="modal" data-target="#addExperiences"><i class="fa fa-plus-circle"></i> Add</button>
                <div class="table-responsive">
                    <table class="table table-bordered" id="experiences">
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
</div>