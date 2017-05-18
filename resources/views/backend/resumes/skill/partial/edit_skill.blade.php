@extends('backend.layouts.resume')

@section('content')
    <div role="main">
        <div class="clearfix"></div>
        <div class="row">
            @if (count($errors) > 0)
                <div class="alert alert-danger error_message_alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        @if(isset($userResume))
                            <button type="button" class="btn btn-warning preview" data-toggle="modal"
                                    data-target=".bs-example-modal-lg">
                                <i class="fa fa-eye" aria-hidden="true"></i> Preview
                            </button>
                        @endif

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>
                        <form action="/resume/skills/save-skill" method="POST" id="demo-form2" data-parsley-validate
                              class="form-horizontal form-label-left">
                            {{ csrf_field() }}
                            <input type="hidden" name="resume_uid" value="{{$userResume->id}}">
                            <input name="skill_id" type="hidden" value="{{ $skill->id }}">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="name" value="{{ $skill->name }}" type="text" id="name"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Description <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea type="text" id="description" name="description"
                                              class="form-control col-md-7 col-xs-12">{!! $skill->description !!}

                                    </textarea>

                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-8">
                                    <button type="submit" class="btn btn-info">Update</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('backend.resumes.includes.modal.preview')

@endsection

@section('js')
    <script>
        $('.add_skill').hide();
        $(document).on('click', '#add', function () {
            $('.add_skill').toggle();
        })
        $('.add_new').hide();
        $('.add_new').first().show();

        $('.preview').hide();
        $('.preview').first().show();

        $(document).on('click', '.btn_delete_skill', function (event) {
            event.preventDefault();
            var var_url = $(this).attr('href');

            swal({
                    title: "Are you sure?",
                    text: "Do you want to delete this experience?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {

                        $.ajax({
                            method: 'POST',
                            url: var_url,
                            data: {_token: '{{csrf_token()}}'},
                            dataType: 'JSON',
                            success: function (result) {

                                if (result.status == true) {
                                    swal("Deleted!", "Your skill has been deleted.", "success");
                                    setTimeout(function () {// wait for 3 secs(2)
                                        location.reload(); // then reload the page.(3)
                                    }, 2000);
                                }
                            }
                        })

                    } else {
                        swal("Cancelled", "Your skill is safe :)", "error");
                    }
                });

        });

        setTimeout(function () {
            if ($('.error_message_alert').is(':visible')) {
                $('.error_message_alert').fadeOut();
            }

        }, 3000);
    </script>
@endsection