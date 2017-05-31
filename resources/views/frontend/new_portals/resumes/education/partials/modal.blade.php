{{--<div class="modal fade" id="edit_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel4">Edit Your Experience</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="{{ route('frontend.resume.store_education') }}" method="post" enctype="multipart/form-data" id="form_edit_education" class="sky-form" novalidate="novalidate">
                        <fieldset>
                            @include('frontend.new_portals.resumes.education.partials.create_edit_fields')
                        </fieldset>
                    </form>
                </div>

            </div>
            --}}{{--<div class="modal-footer">
                <button type="button" class="btn-u btn-u-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn-u btn-u-primary">Save changes</button>
            </div>--}}{{--
        </div>
    </div>
</div>--}}




<!-- Large modal -->

<div class="modal fade bs-example-modal-lg" id="edit_form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 id="myLargeModalLabel2" class="modal-title">Edit Your Education</h4>
            </div>
            <div class="modal-body">

                <form action="{{ route('frontend.resume.store_education') }}" method="post"
                      enctype="multipart/form-data" class="sky-form form-horizontal " id="form_edit_education"
                      novalidate="novalidate">
                    <fieldset>
                        @include('frontend.new_portals.resumes.education.partials.create_edit_fields')
                    </fieldset>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- Large modal -->