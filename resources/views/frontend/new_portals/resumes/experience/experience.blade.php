@extends('frontend.layouts.master_portal')


@section('after-style-end')

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
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
    </style>
@endsection
@section('content')

    <div class="profile-bio margin-bottom-30">
        <form action="assets/php/demo-order.php" method="post" enctype="multipart/form-data" id="sky-form1" class="sky-form" novalidate="novalidate">
            <header> <a  style="position: sticky;" class="accordion-toggle collapsed pull-right" id="icon_toggle" href="#id_form" data-toggle="collapse" aria-expanded="false"> <i class="fa fa-plus-square" id="add"> </i> </a> Create Your Experiences </header>
            <div id="id_form" class="collapse " aria-expanded="false">
                <fieldset>
                    @include('frontend.new_portals.resumes.experience.partials.create_edit_fields')
                </fieldset>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="tag-box tag-box-v3 margin-bottom-40 no-padding">
                @include('frontend.new_portals.resumes.experience.partials.action')
                <div id="" class="profile-edit blog_experience tab-pane fade in active">
                    @include('frontend.new_portals.resumes.experience.partials.fields')
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="tag-box tag-box-v2 margin-bottom-40 no-padding">
                @include('frontend.new_portals.resumes.experience.partials.action')
                <div id="" class="profile-edit blog_experience tab-pane fade in active">
                    @include('frontend.new_portals.resumes.experience.partials.fields')
                </div>
            </div>
        </div>
    </div>

    @include('frontend.new_portals.resumes.experience.partials.modal')

@endsection


@section('after-script-end')
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>


    <script type="text/javascript">
        $(function() {
            $('input[name="daterange"]').daterangepicker({

                beforeShow: function( input ) {
                    setTimeout(function() {
                        var headerPane = $( input )
                                .datepicker( "widget" )
                                .find( ".ui-datepicker-header" );

                        $( "<button>", {
                            text: "Close",
                            click: function() {
                                $.datepicker.hide();
                            }
                        }).appendTo( headerPane );
                    }, 1 );
                },
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY h:mm A'
                }
            });

        });
        $('a#icon_toggle').on('click', function (e) {

            if($(this).attr('aria-expanded') == 'false') {
               $(this).children('i').prop('class', 'fa  fa-minus-square')
            } else {
                $(this).children('i').prop('class', 'fa  fa-plus-square')
            }
        });





        $(this);
        
        $(document).on('click', '.btn_edit_experience', function (e) {
            e.preventDefault();
            var object = $(this).parent('li').parent('ul').parent('div').siblings('div');
            var position = object.find('input[name=hidden_position]').val();
            var company = object.find('input[name=hidden_company]').val();
            var address = object.find('input[name=hidden_address]').val();
            var date = object.find('input[name=hidden_date]').val();
            var phone = object.find('input[name=hidden_phone]').val();
            var description = object.find('input[name=hidden_description]').val();
            $('form#form_edit_experience input[name=position]').val(position);
            $('form#form_edit_experience input[name=company]').val(company);
            $('form#form_edit_experience input[name=address]').val(address);
            $('form#form_edit_experience input[name=date]').val(date);
            $('form#form_edit_experience input[name=phone]').val(phone);
            $('form#form_edit_experience textarea[name=description]').val(description);


        })


    </script>
@endsection