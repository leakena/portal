<div class="modal fade" id="edit_form_post" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel4">Edit Post</h4>
            </div>
            <div class="modal-body">
                <div class="edit_post_panel">
                    @include('frontend.new_portals.blogs.patials.field_edit')
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn-u btn-u-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn-u btn-u-primary" id="btn_save_edit_post">Save changes</button>
            </div>
        </div>
    </div>
</div>