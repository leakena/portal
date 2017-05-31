<div class="modal fade" id="edit_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel4">Edit Your Experience</h4>
            </div>
            <div class="panel-body">
                <form action="{{ route('frontend.resume.store_reference') }}" method="post"
                      enctype="multipart/form-data" id="form_edit_reference" class="sky-form form-horizontal"
                      novalidate="novalidate">
                    <fieldset>
                        @include('frontend.new_portals.resumes.reference.partials.create_edit_fields')
                    </fieldset>
                </form>
            </div>

        </div>
    </div>
</div>