@extends('frontend.layouts.master_portal')


@section('after-style-end')

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css"/>
    <style>

        .dl-horizontal dt {
            width: 30px;
        }

        .dl-horizontal dd {
            margin-left: 80px;
        }

        .profile .profile-edit hr {
            margin: 12px 0 8px;
            margin-top: 12px;
            margin-right: 0px;
            margin-bottom: 8px;
            margin-left: 0px;
        }

        .profile .profile-edit {
            padding-bottom: 0px;
        }

        .green {
            color: #00A000 !important;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 55px;
            height: 28px;
        }

        .switch input {
            display: none;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@endsection
@section('content')

    <div class="profile-bio margin-bottom-30">
        <form action="{{ route('frontend.resume.store_reference') }}" method="post"
              enctype="multipart/form-data" class="sky-form form-horizontal form_create_experience"
              novalidate="novalidate">
            <header><a style="position: sticky;" class="accordion-toggle collapsed pull-right" id="icon_toggle"
                       href="#id_form" data-toggle="collapse" aria-expanded="false"> <i class="fa fa-plus-square"
                                                                                        id="add"> </i> </a> Create Your
                Reference
            </header>
            <div id="id_form" class="collapse " aria-expanded="false">
                <fieldset>
                    @include('frontend.new_portals.resumes.reference.partials.create_edit_fields')
                </fieldset>
            </div>
        </form>
    </div>

    <div class="row">
        @if(count($references)>0)
            @foreach($references as $reference)
                <div class="col-md-6">
                    <div class="tag-box tag-box-v3 margin-bottom-40 no-padding">
                        @include('frontend.new_portals.resumes.reference.partials.action')
                        <div id="" class="profile-edit blog_experience tab-pane fade in active">
                            @include('frontend.new_portals.resumes.reference.partials.fields')
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            There is no experience please click on button add to add experience
        @endif
    </div>


    @include('frontend.new_portals.resumes.reference.partials.modal')

@endsection


@section('after-script-end')


    <script type="text/javascript">
        //        $(function() {
        //            $('input[name="daterange"]').daterangepicker({
        //
        //                beforeShow: function( input ) {
        //                    setTimeout(function() {
        //                        var headerPane = $( input )
        //                                .datepicker( "widget" )
        //                                .find( ".ui-datepicker-header" );
        //
        //                        $( "<button>", {
        //                            text: "Close",
        //                            click: function() {
        //                                $.datepicker.hide();
        //                            }
        //                        }).appendTo( headerPane );
        //                    }, 1 );
        //                },
        //                timePicker: true,
        //                timePickerIncrement: 30,
        //                locale: {
        //                    format: 'MM/DD/YYYY h:mm A'
        //                }
        //            });
        //
        //        });
        $('a#icon_toggle').on('click', function (e) {

            if ($(this).attr('aria-expanded') == 'false') {
                $(this).children('i').prop('class', 'fa  fa-minus-square')
            } else {
                $(this).children('i').prop('class', 'fa  fa-plus-square')
            }
        });

        $('input[name="start_date"]').datepicker({
            format: 'yyyy-mm-d'
        });

        $('input[name="end_date"]').datepicker({
            format: 'yyyy-mm-d'
        });


        $(this);

        $(document).on('click', '.btn_edit_reference', function (e) {
            e.preventDefault();

            var dom = $(this).parent().parent().parent().parent().children().eq(1);

            $('form#form_edit_experience input[name=reference_id]').val(dom.find('.reference_id').val());
            $('form#form_edit_experience input[name=name]').val((dom.find('.name').text()).trim());
            $('form#form_edit_experience input[name=position]').val((dom.find('.position').text()).trim());
            $('form#form_edit_experience input[name=phone]').val((dom.find('.phone').text()).trim());
            $('form#form_edit_experience input[name=email]').val((dom.find('.email').text()).trim());

        })



        $(document).on('click', '.btn_delete_reference', function (event) {
            event.preventDefault();
            var var_url = $(this).attr('href');
            var dom = $(this);
            swal({
                    title: "Are you sure?",
                    text: "Do you want to delete this reference?",
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
                                    swal("Deleted!", "Your reference has been deleted.", "success");
                                    dom.parent().parent().parent().parent().parent().remove();
                                }
                            },
                            error: function () {

                            },
                            complete: function () {

                            }
                        })

                    } else {
                        swal("Cancelled", "Your reference is safe :)", "error");
                    }
                });
        });

    </script>
@endsection