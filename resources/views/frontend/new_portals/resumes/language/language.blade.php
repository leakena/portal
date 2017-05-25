@extends('frontend.layouts.master_portal')


@section('content')


    <div class="profile-bio margin-bottom-30">
        <form action="{{ route('frontend.resume.store_language') }}" method="post" enctype="multipart/form-data"
              id="sky-form1" class="sky-form" novalidate="novalidate">
            <header><a style="position: sticky;" class="accordion-toggle collapsed pull-right" id="icon_toggle"
                       href="#id_form" data-toggle="collapse" aria-expanded="false"> <i class="fa fa-plus-square"
                                                                                        id="add"> </i> </a> Create Your
                Language
            </header>
            <div id="id_form" class="collapse " aria-expanded="false">
                <fieldset>
                    @include('frontend.new_portals.resumes.language.partials.create_edit_fields')
                </fieldset>
            </div>
        </form>
    </div>

    <div class="panel panel-profile">
        <div class="panel-body">
            <div class="row">
                @if(count($selectedLanguages)>0)
                    @foreach($selectedLanguages as $key => $selectedLanguage)

                        <div class="p-chart col-sm-4 col-xs-4 sm-margin-bottom-10">
                            @include('frontend.new_portals.resumes.language.partials.action')

                            @include('frontend.new_portals.resumes.language.partials.fields')

                        </div>

                    @endforeach
                @else
                    There is no experience please click on button add to add experience
                @endif
            </div>
        </div>
    </div>

    @include('frontend.new_portals.resumes.skill.partials.modal')

@endsection

@section('after-script-end')
    {{--<script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>--}}

    {{--{!! JsValidator::formRequest('App\Http\Requests\Backend\Resume\Skill\StoreSkill') !!}--}}
    <script>

        $('a#icon_toggle').on('click', function (e) {

            if ($(this).attr('aria-expanded') == 'false') {
                $(this).children('i').prop('class', 'fa  fa-minus-square')
            } else {
                $(this).children('i').prop('class', 'fa  fa-plus-square')
            }
        });

        $(document).on('click', '.btn_edit_skill', function (e) {
            e.preventDefault();

            var dom = $(this).parent().parent().parent().parent();
            var obj = $('form#form_edit_skill input[class=description]');


            $('form#form_edit_skill input[name=name]').val(dom.find('.name').val());
            $('form#form_edit_skill input[name=skill_id]').val(dom.find('.skill_id').val());

            obj.each(function () {
                if ($(this).val() == dom.find('.description').text()) {
                    $(this).prop('checked', true);
                }

            });

        })

        $(document).on('click', '.btn_delete_skill', function (event) {
            event.preventDefault();
            var var_url = $(this).attr('href');
            var dom = $(this);
            swal({
                    title: "Are you sure?",
                    text: "Do you want to delete this skill?",
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
                                    dom.parent().parent().parent().parent().remove();
                                }
                            },
                            error: function () {

                            },
                            complete: function () {

                            }
                        })

                    } else {
                        swal("Cancelled", "Your skill is safe :)", "error");
                    }
                });
        });

        $("#language1").select2({
            minimumInputLength: 2,
            ajax: {
                url: '{{ route('frontend.resume.remote_languages') }}',
                dataType: 'json',
                delay: 400,
                data: function(params) {
                    return {
                        query_search: params.term
                    }
                },
                processResults: function (data, page) {
                    return {
                        results: data
                    };
                }
            }

        });
        
        $(document).on('click', '.save', function (event) {
            event.preventDefault();
            var value = $(this).parent().siblings().find('#language1').val();
            var language_name = $(this).parent().siblings().find('#language1 option:selected').text();
            var proficiency = $(this).parent().siblings().find('input[name=proficiency]:checked').val();

            $.ajax({
                type: 'POST',
                url: '/resume/languages/compare_language',
                dataType: 'json',
                data: {
                    'language_id' : value,
                    'language_name': language_name,
                    'proficiency' : proficiency,
                    _token: '{!! csrf_token() !!}'
                },
                success: function (result) {
                    var newLanguage = '';

                    if(result.status == false){
                        swal({
                            title: "Please check your language or level!",
                            text: "You cannot choose language that already exist in your language list!" +
                                    " Or you cannot choose Mother Tongue for multiple language",
                            type: "warning"
                        });
                    }else{

                        newLanguage += '<input type="hidden" class="language_resume_id" name="language_resume_id" value="' + result.language_resume_id + '">'
                        newLanguage += '<div class="circle margin-bottom-20" id="' + result.language_id + '"></div>'
                        newLanguage += '<h3 class="heading-xs">' + language_name
                        newLanguage += '</h3>';

                        $('.lan').append(newLanguage);

                        console.log(newLanguage);


                    }
                }
            });
        });



        $(document).ready(function (e) {

            @foreach($selectedLanguages as $language)

                @if($language->proficiency == 'Mother Tongue')
                var languageCircle = function () {

                    return {
                        initCircles: function () {

                            //Circles 4
                            Circles.create({
                                id:         '{{$language->language_id}}',
                                percentage: 90,
                                radius:     50,
                                width:      4,
                                number:     90,
                                text:       '%',
                                colors:     ['#eee', '#72c02c'],
                                duration:   2000
                            })
                        }
                    }

                }();

                languageCircle.initCircles()
                @else
                var languageCircle = function () {

                    return {
                        initCircles: function () {

                            //Circles 4
                            Circles.create({
                                id:         '{{$language->language_id}}',
                                percentage: '{{str_replace('%', '', $language->proficiency)}}',
                                radius:     50,
                                width:      4,
                                number:     '{{str_replace('%', '', $language->proficiency)}}',
                                text:       '%',
                                colors:     ['#eee', '#72c02c'],
                                duration:   2000
                            })
                        }
                    }

                }();

                languageCircle.initCircles()
                @endif
            @endforeach


        })



    </script>
@endsection