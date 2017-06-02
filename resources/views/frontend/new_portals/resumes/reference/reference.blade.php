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

        .panel-yellow {
            border-color: #56e71b;
        }

        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 14px;
            line-height: 1.42857143;
            color: #333;
            background-color: #fff;
        }

        .panel-yellow > .panel-heading {
            background: #72c02c;
            color: white;
        }

        .panel-u > .panel-heading {
            background: #72c02c;
        }

        .each_top_row {
            margin-top: 2px;
        }


        .input-group {
            position: relative;
            display: table;
            border-collapse: separate;
        }

        .form-control {
            display: block;
            width: 100%;
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .input-group-addon, .input-group-btn {
            width: 1%;
            white-space: nowrap;
            vertical-align: middle;
        }

        .sky-form .icon-append {
            right: 17px;
            padding: 1px 3px;
            min-width: 34px;
        }

        .panel-body{
            padding: 15px !important;
            padding-top: 15px !important;
            padding-right: 15px !important;
            padding-bottom: 15px !important;
            padding-left: 15px !important;
        }

        #form_edit_interest .col-md-offest2 {
            margin-left: 50px;
        }
    </style>
@endsection
@section('content')

    <div class="row margin-bottom-20">
        <div class="col-md-6">
            <!-- Yellow Panel -->
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-tasks"></i> References
                        <a style="position: sticky;" class="accordion-toggle collapsed pull-right" id="icon_toggle"
                           href="#id_form" data-toggle="collapse" aria-expanded="false">
                            <i class="fa fa-plus-square" id="add"></i>
                        </a>
                    </h3>

                </div>
                <div class="panel-body">

                    <div id="id_form" class="collapse " aria-expanded="false">
                        <form action="{{ route('frontend.resume.store_reference') }}" method="post" enctype="multipart/form-data" class="sky-form form-horizontal form_create_reference">
                            <header style="font-size: 8pt">   Create Your Reference </header>

                            <fieldset>
                                @include('frontend.new_portals.resumes.reference.partials.create_edit_fields')
                            </fieldset>
                        </form>
                    </div>

                    @if(count($references)>0)
                        @foreach($references as $reference)
                            <div class="col-md-12" style="border-color: #27d7e7 !important;">
                                <div class="tag-box tag-box-v3 margin-bottom-10 no-padding">
                                    @include('frontend.new_portals.resumes.reference.partials.action')
                                    <div id="" class="profile-edit blog_reference tab-pane fade in active">
                                        @include('frontend.new_portals.resumes.reference.partials.fields')
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

            </div>
            <!-- End Yellow Panel -->
        </div>

        <div class="col-md-6">
            <!-- Yellow Panel -->
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-tasks"></i> Interest
                        <a style="position: sticky;" class="accordion-toggle collapsed pull-right"
                           id="icon_toggle_interest" href="#id_form_interest" data-toggle="collapse"
                           aria-expanded="false">
                            <i class="fa fa-plus-square" id="add_interest"></i>
                        </a>
                    </h3>

                </div>
                <div class="panel-body no-padding">

                    <div id="id_form_interest" class="collapse no-padding " aria-expanded="false">
                        <form action="{{ route('frontend.resume.save_interest') }}" method="post" enctype="multipart/form-data" class="sky-form form-horizontal form_create_interest">
                            @if(isset($userResume))
                                <input type="hidden" name="resume_uid" value="{{$userResume->id}}">
                            @endif

                            {{csrf_field()}}

                            <header style="font-size: 8pt"> Create Your Interest</header>
                            <fieldset>
                                @include('frontend.new_portals.resumes.reference.partials.interest_field')
                            </fieldset>
                        </form>
                    </div>

                    @if($interests != null)
                        @foreach($interests as $interest)
                            <div class="col-md-12" style="border-color: #27d7e7 !important;">

                                <input type="hidden" name="hidden_interest_resume_uid"
                                       value="{{$interest->resume_uid}}">
                                <input type="hidden" name="hidden_interest_id" value="{{$interest->id}}">
                                <input type="hidden" name="hidden_interest_name" value="{{$interest->name}}">
                                <input type="hidden" name="hidden_interest_description"
                                       value="{{$interest->description}}">

                                @include('frontend.new_portals.resumes.reference.partials.action_interest')

                                <div class="faq-add">
                                    <div class="top-part">
                                        <h3 class="new-title">
                                            <i class="icon-support"></i>
                                            <a href="#">{{$interest->name}}</a>

                                        </h3>
                                    </div>
                                    <p>{{$interest->description}}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>


            </div>
            <!-- End Yellow Panel -->
        </div>
    </div>

    @include('frontend.new_portals.resumes.reference.partials.modal')

    @include('frontend.new_portals.resumes.reference.partials.modal_interest')

@endsection


@section('after-script-end')

    {!! Html::script('portals/assets/jstree/jstree.min.js') !!}
    <script type="text/javascript">


        validate_reference($('.form_create_reference'));
        validate_reference($('#form_edit_reference'));


        validate_interest($('.form_create_interest'));
        validate_interest($('#form_edit_interest'));


        $('a#icon_toggle').on('click', function (e) {

            if ($(this).attr('aria-expanded') == 'false') {
                $(this).children('i').prop('class', 'fa  fa-minus-square')
            } else {
                $(this).children('i').prop('class', 'fa  fa-plus-square')
            }
        });


        $('a#icon_toggle_interest').on('click', function (e) {

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

        $(document).on('click', '.btn_edit_reference', function (e) {
            e.preventDefault();
            var dom = $(this).parent().parent().parent().parent().children().eq(1);

            $('form#form_edit_reference input[name=reference_id]').val(dom.find('input[name=hidden_reference_id]').val());
            $('form#form_edit_reference input[name=name]').val((dom.find('.name').text()).trim());
            $('form#form_edit_reference input[name=position]').val((dom.find('.position').text()).trim());
            $('form#form_edit_reference input[name=phone]').val((dom.find('.phone').text()).trim());
            $('form#form_edit_reference input[name=email]').val((dom.find('.email').text()).trim());

        })


        $(document).on('click', '.btn_edit_interest', function (e) {
            e.preventDefault();

            var dom = $(this).parent().parent().parent();
            $('form#form_edit_interest input[name=interest_id]').val(dom.siblings('input[name=hidden_interest_id]').val());
            $('form#form_edit_interest input[name=name]').val(dom.siblings('input[name=hidden_interest_name]').val());
            $('form#form_edit_interest input[name=description]').val(dom.siblings('input[name=hidden_interest_description]').val());
            $('form#form_edit_interest input[name=resume_uid]').val(dom.siblings('input[name=hidden_interest_resume_uid]').val());

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


        $(document).on('click', '.btn_delete_interest', function (event) {
            event.preventDefault();
            var var_url = $(this).attr('href');
            var dom = $(this);
            swal({
                    title: "Are you sure?",
                    text: "Do you want to delete this Interest?",
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
                                    dom.parent().parent().parent().parent().remove();
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