@extends('backend.layouts.resume')

@section('content')
    <div role="main">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                @if(count($selectedLanguages)>0)
                    @foreach($selectedLanguages as $selectedLanguage)
                        <div class="x_panel">
                            <div class="x_title">
                                <button id="add" type="button" class="btn btn-primary btn-sm pull-left add_new"
                                        data-toggle="modal"
                                        data-target="#add-career-profile"><i class="fa fa-plus"
                                                                             style="font-size: 14pt; color: #00a7d0"> </i>
                                </button>
                                @if(isset($userResume))
                                    <button type="button" class="btn btn-warning preview" data-toggle="modal" data-target=".bs-example-modal-lg">
                                        <i class="fa fa-eye" aria-hidden="true"></i> Preview
                                    </button>
                                @endif
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    @if($selectedLanguage->proficiency != 'Mother Tongue')
                                        <li>
                                            <a class="btn_delete_language" href="{{ route('frontend.resume.remove_language', $selectedLanguage->language_resume_id) }}">
                                                <i class="fa fa-trash" aria-hidden="true" style="color: red" ></i>
                                            </a>
                                        </li>
                                    @endif

                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br/>
                                <form action="/resume/languages/save-language" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="resume_uid" value="{{$userResume->id}}">
                                    <input class="hidden" name="language_resume_id" value="{{ $selectedLanguage->language_resume_id }}">


                                    @if( $selectedLanguage->proficiency == 'Mother Tongue')
                                        <input name="id" class="hidden" value="{{ $selectedLanguage->language_resume_id }}">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span
                                                        class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="language_id" class="form-control">

                                                    @foreach( $languages as $language)

                                                        @if( $language->id == $selectedLanguage->language_id)
                                                            <option selected value="{{ $language->id }}" class="old_value">{{ $language->name }}</option>
                                                        @else
                                                            <option value="{{ $language->id }}">{{ $language->name }}</option>
                                                        @endif

                                                    @endforeach

                                                </select>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                   for="name">Proficiency</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="hidden" name="proficiency" value="Mother Tongue">
                                                    <input disabled type="text" id="name" required="required"
                                                           class="form-control col-md-7 col-xs-12"
                                                           value="{{ $selectedLanguage->proficiency }}">

                                            </div>
                                        </div>

                                    @else
                                        <input name="id" class="hidden" value="{{ $selectedLanguage->language_resume_id }}">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span
                                                        class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="language_id" class="form-control">

                                                    @foreach( $languages as $language)

                                                        @if( $language->id == $selectedLanguage->language_id)
                                                            <option selected value="{{ $language->id }}" class="old_value">{{ $language->name }}</option>
                                                        @else
                                                            <option value="{{ $language->id }}">{{ $language->name }}</option>
                                                        @endif

                                                    @endforeach

                                                </select>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                   for="name">Proficiency</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input name="proficiency" type="text" id="name" required="required"
                                                       class="form-control col-md-7 col-xs-12"
                                                       value="{{ $selectedLanguage->proficiency }}">

                                            </div>
                                        </div>

                                    @endif


                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-8">
                                            <button type="submit" class="btn btn-info">Update</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    @endforeach

                @else
                    <div role="main">
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        @if(isset($userResume))
                                            <button type="button" class="btn btn-warning preview" data-toggle="modal" data-target=".bs-example-modal-lg">
                                                <i class="fa fa-eye" aria-hidden="true"></i> Preview
                                            </button>
                                        @endif
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <br/>
                                        <form action="/resume/languages/save-language" method="POST" id="demo-form2"
                                              data-parsley-validate class="form-horizontal form-label-left">
                                            {{ csrf_field() }}
                                            @if(isset($userResume))
                                                <input type="hidden" name="resume_uid" value="{{$userResume->id}}">
                                            @endif

                                            <div class="form-group">
                                                <div class="col-md-6 col-sm-6 col-xs-12" style="color: orange">
                                                    <h4>Please create mother tongue first!</h4>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="language_id" class="form-control single">
                                                        @foreach( $languages as $language)
                                                            <option value="{{ $language->id }}">{{$language->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                       for="name">Proficiency</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="hidden" name="proficiency" value="Mother Tongue">
                                                    <input type="text" id="name" required="required"
                                                           class="form-control col-md-7 col-xs-12"
                                                           disabled
                                                           value="Mother tongue">
                                                </div>
                                            </div>


                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                    <button class="btn btn-primary" type="button">Cancel</button>
                                                    <button class="btn btn-primary" type="reset">Reset</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif

            </div>
        </div>
    </div>

    <div role="main" class="add_language" style="display: none">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Languages </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>
                        <form action="/resume/languages/save-language" method="POST" id="demo-form2"
                              data-parsley-validate class="form-horizontal form-label-left">
                            {{ csrf_field() }}

                            @if(isset($userResume))
                                <input type="hidden" name="resume_uid" value="{{$userResume->id}}">
                            @endif

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="language_id" class="form-control">
                                        @if(isset($userResume))
                                            @foreach($languages as $language)

                                                @if(!in_array($language->id, $selectedLanguages->pluck('language_id')->toArray()))
                                                    <option value="{{$language->id}}">{{$language->name}}</option>
                                                @endif

                                            @endforeach
                                        @endif

                                    </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="proficiency">Proficiency
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="proficiency" type="text" id="proficiency" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>

                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-primary" type="button">Cancel</button>
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--modal--}}
    @include('backend.resumes.includes.modal.preview')

@endsection

@section('js')
    <script>
        $('.add_language').hide();
        $(document).on('click', "#add", function () {
            $('.add_language').toggle();
        })

        $('.add_new').hide();
        $('.add_new').first().show();

        $('.preview').hide();
        $('.preview').first().show();

        $(document).on('click', '.btn_delete_language', function(event)  {
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
                function(isConfirm) {
                    if (isConfirm) {

                        $.ajax({
                            method: 'POST',
                            url: var_url,
                            data: {_token: '{{csrf_token()}}' },
                            dataType: 'JSON',
                            success: function(result) {

                                if(result.status == true) {
                                    swal("Deleted!", "Your experience has been deleted.", "success");
                                    setTimeout(function(){// wait for 3 secs(2)
                                        location.reload(); // then reload the page.(3)
                                    }, 3000);
                                }
                            }
                        })

                    } else {
                        swal("Cancelled", "Your experience is safe :)", "error");
                    }
                });
        });
//        $(document).on('change', 'select[name="language_id"]', function () {
//            event.preventDefault();
//            var dom = $(this);
//            dom.find('.old_value').removeAttr('selected');
//            dom.find('.test').removeClass('test');
//            $('select[name="language_id"] option:selected').addClass('test');
//            var selectLanguage = dom.find('.test').val();
//            var old_selectLanguage = $(this).find('.old_value').val();
//
//            console.log(old_selectLanguage+''+selectLanguage);
//
//            if(selectLanguage != old_selectLanguage)
//            {
//                $.ajax({
//                    url: '/resume/languages',
//                    data: {
//                        'selectLanguage' : selectLanguage
//                    },
//                    dataType: 'JSON',
//                    success: function (result) {
//                        if(result.status == true ){
//                            swal({
//                                title: "Please choose another language!",
//                                text: "Your choosen languge already have in your language list!",
//                                type: "warning"
//                            });
//                            dom.find('.test').removeClass('test');
//                            dom.find('.old_value').attr('selected', 'selected').addClass('test');
//                        }
//                    }
//
//                });
//            }
//        })
    </script>

@endsection