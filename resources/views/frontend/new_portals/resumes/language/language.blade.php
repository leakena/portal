@extends('frontend.layouts.master_portal')

@section('after-style-end')

    <style type="text/css">

    </style>

@endsection

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
                    <footer>
                        <button type="submit" class="btn-u pull-left save">Save</button>
                        <div class="progress"></div>
                    </footer>
                </fieldset>
            </div>
        </form>
    </div>

    <div class="panel panel-profile">
        <div class="panel-body">
            <div class="row" id="mab">
                @if(count($selectedLanguages)>0)
                    @foreach($selectedLanguages as $key => $selectedLanguage)

                        <div class="p-chart col-sm-4 col-xs-4 sm-margin-bottom-10">
                            @include('frontend.new_portals.resumes.language.partials.action')

                            @include('frontend.new_portals.resumes.language.partials.fields')

                        </div>

                    @endforeach
                @else
                    <span class="no_have">There is no language please click on button add to add language</span>
                @endif
            </div>
        </div>
    </div>

    @include('frontend.new_portals.resumes.language.partials.modal')

@endsection

@section('after-script-end')

    <script>

        $(document).ready(function (e) {
            //show_language();
            getCircleLanguages();
            $('[data-toggle="tooltip"]').tooltip();
            reloadLanguage();
        });

        function reloadLanguage() {
            $.ajax({
                type: 'POST',
                url: '/language/find_mother_tongue',
                dataType: 'json',
                data: {_token: '{!! csrf_token() !!}'},
                success: function (result) {
                    if (result.status == true) {
                        $('input#is_mother_tongue').attr('disabled', true);
                        $('input#is_mother_tongue').parent().attr('data-toggle', 'tooltip').attr('data-placement', 'top').attr('title', 'already have');
                    } else {
                        $('input#is_mother_tongue').attr('disabled', false);
                    }

                }

            });
        }

        function addNewLanguage(id, name, resume_id, proficiency) {
            var newLanguage = '';
            newLanguage += '<div class="p-chart col-sm-4 col-xs-4 sm-margin-bottom-10">';
            newLanguage += '<div class="btn-group pull-right">';
            newLanguage += '<span class="btn btn-box-tool dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" title="" data-widget="chat-pane-toggle" data-original-title="Setting">'
            newLanguage += '<i class="icon-custom rounded-x icon-sm icon-color-u fa fa-lightbulb-o"></i>'
            newLanguage += '</span>'
            newLanguage += '<ul class="dropdown-menu" role="menu">'
            newLanguage += '<li><a href="#" class="btn_edit_language" data-toggle="modal" data-target="#edit_form"><i class="fa fa-edit "></i> Edit Language</a></li>'
            newLanguage += '<li><a class="btn_delete_language" href="/resume/languages/' + id + '/delete-language"><i class="fa fa-trash-o"></i> Delete Language</a></li>'
            newLanguage += '</ul>'
            newLanguage += '</div>'
            newLanguage += '<input type="hidden" class="language_resume_id" name="language_resume_id" value="' + resume_id + '">';
            newLanguage += '<input type="hidden" class="language_id" name="language_id" value="' + id + '">';
            newLanguage += '<input type="hidden" class="proficiency1" name="proficiency" value="' + proficiency + '">'
            newLanguage += '<div class="circle margin-bottom-20" id="' + id + '"></div>';
            newLanguage += '<h3 class="heading-xs name"><span class="language_name">' + name + '</span><span class="subfix_name"></span>';
            if (proficiency === 'Mother Tongue') {
                newLanguage += ' (Mother Tongue)';
            }
            newLanguage += '</h3></div>';
            $('#mab').append(newLanguage);
            $('span.no_have').hide();
            getCircleLanguages();
        }

        $('a#icon_toggle').on('click', function (e) {

            if ($(this).attr('aria-expanded') == 'false') {
                $(this).children('i').prop('class', 'fa  fa-minus-square')
            } else {
                $(this).children('i').prop('class', 'fa  fa-plus-square')
            }
        });

        $(document).on('click', '.btn_edit_language', function (e) {
            e.preventDefault();

            var dom = $(this).parent().parent().parent().parent();
            // console.log(dom.parent())
            var obj = $('form#form_edit_language input[class=proficiency]');
            var old_language_id = dom.find('.language_id').val();
            dom.parent().find('.editing').removeClass('editing');
            dom.addClass('editing');


            reloadLanguage();
            $("form#form_edit_language").find('.language').select2({
                minimumInputLength: 2,
                ajax: {
                    url: '{{ route('frontend.resume.edit_remote_languages') }}',
                    dataType: 'json',
                    delay: 400,
                    data: function (params) {
                        return {
                            query_search: params.term,
                            old_id: old_language_id
                        }
                    },
                    processResults: function (data, page) {
                        return {
                            results: data
                        };
                    }
                }

            });

            var language = '';
            language += '<option selected value="' + dom.find('.language_id').val() + '">' + dom.find('.name').text() + '</option>';
            $('form#form_edit_language select#language1').html(language);
            $('form#form_edit_language input[name=language_resume_id]').val(dom.find('.language_resume_id').val());


            obj.each(function () {

                if ($(this).val() == dom.find('.proficiency1').val()) {
                    $(this).prop('checked', true);
                }

            });


        });

        $(document).on('click', '.btn_delete_language', function (event) {
            event.preventDefault();
            var dom = $(this);

            swal({
                    title: "Are you sure?",
                    text: "Do you want to delete this language?",
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
                            url: '{!! route('frontend.resume.remove_language') !!}',
                            data: {
                                _token: '{{csrf_token()}}',
                                id: dom.parent().parent().parent().parent().find('input.language_resume_id').val()
                            },
                            dataType: 'JSON',
                            success: function (result) {

                                if (result.status == true) {
                                    swal("Deleted!", "Your language has been deleted.", "success");
                                    dom.parent().parent().parent().parent().remove();
                                }
                                if(result.rest_language<=0){
                                    var no_language = '';
                                    no_language += '<span class="no_have">There is no language please click on button add to add language</span>';
                                    $('#mab').append(no_language);


                                }
                            },
                            error: function () {

                            },
                            complete: function () {

                            }
                        })

                    } else {
                        swal("Cancelled", "Your language is safe :)", "error");
                    }
                });
        });

        $(document).on('click', '.update', function (event) {

            event.preventDefault();
            var value = $(this).parent().siblings().find('#language1').val();
            var language_name = $('.editing').find('.language_name').text();
            var proficiency = $(this).parent().siblings().find('input[name=proficiency]:checked').val();
            var language_resume_id = $(this).parent().siblings('input[name=language_resume_id]').val();


            $.ajax({
                type: 'POST',
                url: '/resume/languages/update_language',
                dataType: 'json',
                data: {
                    'language_id': value,
                    'language_name': language_name,
                    'proficiency': proficiency,
                    'language_resume_id': language_resume_id,
                    _token: '{!! csrf_token() !!}'
                },
                success: function (result) {
                    if (result.status === true) {
                        $('#edit_form').modal('toggle');

                        var updatedLanguage = '';
                        updatedLanguage += '<div class="btn-group pull-right">';
                        updatedLanguage += '<span class="btn btn-box-tool dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" title="" data-widget="chat-pane-toggle" data-original-title="Setting">'
                        updatedLanguage += '<i class="icon-custom rounded-x icon-sm icon-color-u fa fa-lightbulb-o"></i>'
                        updatedLanguage += '</span>'
                        updatedLanguage += '<ul class="dropdown-menu" role="menu">'
                        updatedLanguage += '<li><a href="#" class="btn_edit_language" data-toggle="modal" data-target="#edit_form"><i class="fa fa-edit "></i> Edit Language</a></li>'
                        updatedLanguage += '<li><a class="btn_delete_language" href="/resume/languages/' + value + '/delete-language"><i class="fa fa-trash-o"></i> Delete Language</a></li>'
                        updatedLanguage += '</ul>'
                        updatedLanguage += '</div>'
                        updatedLanguage += '<input type="hidden" class="language_resume_id" name="language_resume_id" value="' + language_resume_id + '">';
                        updatedLanguage += '<input type="hidden" class="language_id" name="language_id" value="' + value + '">';
                        updatedLanguage += '<input type="hidden" class="proficiency1" name="proficiency" value="' + proficiency + '">'
                        updatedLanguage += '<div class="circle margin-bottom-20" id="' + value + '"></div>';

                        var subfix = '';
                        if (result.is_mother_tongue === true) {
                            subfix = '(Mother Tongue)';
                        }
                        updatedLanguage += '<h3 class="heading-xs name"><span class="language_name">' + language_name + '</span><span class="subfix_name">' + subfix + '</span></h3>';


                        $('.editing').html(updatedLanguage);
                    }
                },
                complete: function () {
                    getCircleLanguages();
                }
            });
        });

        $("select.language").select2({
            minimumInputLength: 2,
            ajax: {
                url: '{{ route('frontend.resume.remote_languages') }}',
                dataType: 'json',
                delay: 400,
                data: function (params) {
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
                    'language_id': value,
                    'language_name': language_name,
                    'proficiency': proficiency,
                    _token: '{!! csrf_token() !!}'
                },
                success: function (result) {
                    var newLanguage = '';

                    if (result.status == false) {
                        swal({
                            title: "Please check your language or level!",
                            text: "You cannot choose language that already exist in your language list!" +
                            " Or you cannot choose Mother Tongue for multiple language",
                            type: "warning"
                        });
                    } else {
                        addNewLanguage(result.language_id, language_name, result.language_resume_id, proficiency);

                        //getCircleLanguages();
                    }
                },
                complete: function () {
                    getCircleLanguages();
                }
            });
        });


        function getCircleLanguages() {
            $.ajax({
                type: 'POST',
                url: '{!! route('frontend.resume.getCircleLanguages') !!}',
                data: {_token: '{!! csrf_token() !!}'},
                success: function (response) {
                    if (response.data.length > 0) {
                        $.each(response.data, function (key, val) {
                            if (val.proficiency == 'Mother Tongue') {
                                var languageCircle = function () {

                                    return {
                                        initCircles: function () {

                                            //Circles 4
                                            Circles.create({
                                                id: val.language_id,
                                                percentage: 90,
                                                radius: 50,
                                                width: 4,
                                                number: 90,
                                                text: '%',
                                                colors: ['#eee', '#72c02c'],
                                                duration: 2000
                                            })
                                        }
                                    }

                                }();

                                languageCircle.initCircles();
                            } else {
                                var languageCircle = function () {
                                    var value = '';
                                    value = val.proficiency;
                                    value.replace('%', '');
                                    return {
                                        initCircles: function () {

                                            //Circles 4
                                            Circles.create({
                                                id: val.language_id,
                                                percentage: parseInt(value),
                                                radius: 50,
                                                width: 4,
                                                number: parseInt(value),
                                                text: '%',
                                                colors: ['#eee', '#72c02c'],
                                                duration: 2000
                                            })
                                        }
                                    }

                                }();

                                languageCircle.initCircles();
                            }
                        })
                    }
                }
            })
        }
    </script>
@endsection