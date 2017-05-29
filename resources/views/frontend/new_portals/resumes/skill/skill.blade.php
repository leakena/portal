@extends('frontend.layouts.master_portal')


@section('content')


    <div class="profile-bio margin-bottom-30">
        <form action="{{ route('frontend.resume.store_skill') }}" method="post" enctype="multipart/form-data"
              id="sky-form1" class="sky-form" novalidate="novalidate">
            <header><a style="position: sticky;" class="accordion-toggle collapsed pull-right" id="icon_toggle"
                       href="#id_form" data-toggle="collapse" aria-expanded="false"> <i class="fa fa-plus-square"
                                                                                        id="add"> </i> </a> Create Your
                Skills
            </header>
            <div id="id_form" class="collapse " aria-expanded="false">
                <fieldset>
                    @include('frontend.new_portals.resumes.skill.partials.create_edit_fields')
                </fieldset>
            </div>
        </form>
    </div>

    <div class="tab-pane fade active in profile-edit blog_experience" id="tab-1" >
            <div class="row skill">
                @if(count($skills)>0)
                    @foreach($skills as $skill)
                        <div class="col-md-12">
                            @include('frontend.new_portals.resumes.skill.partials.action')

                            @include('frontend.new_portals.resumes.skill.partials.fields')

                        </div>

                    @endforeach
                @else
                    There is no skill please click on button add to add skill
                @endif
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

            obj.each(function(){
                if ($(this).val() == dom.find('.description').text()){
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

                                if(result.rest_skill<=0){
                                    var no_skill = '<span class="no_skill"> There is no education please click on button add to add education </span>'
                                    $('div.skill').append(no_skill);

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
    </script>
@endsection