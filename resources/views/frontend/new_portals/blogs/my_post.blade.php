@extends('frontend.layouts.blog_master')


@section('after-style-end')
    <style>
        .panel-green {
            border-color: rgba(217, 214, 214, 0.09) !important;
        }

        .panel-green > .panel-heading {
            background: rgba(217, 214, 214, 0.09) !important;
        }

        .panel-title {
            color: #0a2b1d;
        }

        .headline-md {
            margin-top: -5px !important;
        }

        a {
            color: whitesmoke;
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

        .input-group .form-control, .input-group-addon, .input-group-btn {
            display: table-cell;
        }


        textarea {
            display: inline-block;
            min-width: 100%;
            margin-bottom: 5px;
            font-weight: 700;
        }
        .edit_textarea {
            min-width: 80% !important;
        }

        .tag-box {

            padding-right: 0px;
        }

        .render_post > .row {
            margin-right: 0px;
            margin-left:0px;
        }
        .new_row {
            margin-right: 0px !important;
            margin-left:0px !important;
        }
    </style>
@endsection


@section('content')

    <a href="#" class="clone_btn_modal" style="display: none" data-toggle="modal" data-target="#edit_form_post" ></a>

    {{--block create post--}}

    <div class="row new_row no-padding">
        <div class="col-md-7 " style="padding-left: 0px; padding-right: 1px">
            <div class="input-group">
                <input type="text" class="form-control" name="search_post" placeholder="Search">
                <span class="input-group-btn">

							<button class="btn-u" type="button">Go</button>
                </span>
            </div>
            <!-- End Search Bar -->
        </div>
        <div class="col-md-3 no-padding" >
            <label for="my_post" class="btn btn-u pull-right" style="font-size: 12pt; width: 100%;">
                <input type="checkbox" name="my_post" id="my_post" value="my_post">
                My Posts
            </label>
        </div>

        <div class="col-md-2" style="padding-left: 1px; padding-right: 0px">
            <a style="font-size: 12pt; width: 100%;" class="btn btn-u btn-u-aqua pull-right accordion-toggle collapsed" id="icon_toggle" href="#id_form" data-toggle="collapse" aria-expanded="false">
                <i class="fa fa-plus-square" id="add"></i>
                Posts
            </a>
        </div>
    </div>

    <div class="row new_row blog blog-medium collapse" id="id_form"  aria-expanded="false">
        {{--<form action="{{route('')}}" method="post" enctype="multipart/form-data" class="sky-form form-horizontal form_create_post" files>--}}
            {!! Form::open(['route' => 'frontend.portal.store_post','class' => 'form-horizontal sky-form','role' => 'form','method' => 'post', 'files'=>true, 'enctype'=>'multipart/form-data']) !!}
            <fieldset>
                {{csrf_field()}}
                @include('frontend.new_portals.blogs.patials.create_panel')

            </fieldset>
            {!! Form::close() !!}
        {{--</form>--}}
    </div>

    {{--end block create post --}}

    <!--Blog Post-->
    <div class="render_post ">

        @include('frontend.new_portals.blogs.patials.each_blog_post')
    </div>

    <button type="button" class="btn-u btn-u-default btn-block text-center" id="btn_load_more_post">Load More</button>
    {{--<input type="hidden" name="last_post" value="{{isset($last_post)?$last_post:''}}">--}}
    <!--End Blog Post-->


    @include('frontend.new_portals.blogs.patials.modal_edit')





    <!--Pagination-->
    {{--<div class="text-center">
        <ul class="pagination">
            <li><a href="#">«</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li class="active"><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">6</a></li>
            <li><a href="#">7</a></li>
            <li><a href="#">8</a></li>
            <li><a href="#">»</a></li>
        </ul>
    </div>--}}
    <!--End Pagination-->
@endsection

@section('after-script-end')

    {!! Html::script('portals/js/blog_post.js') !!}

    <script>
        $(document).ready(function () {

            if($('input#last_post_id').val() == 0 ){
                $('#btn_load_more_post').remove();
            }
        });

        var btn = '<i class="fa fa fa-unlink btn btn-xs pull-right btn-u btn-brd rounded btn-u-green btn-u-sm" id="change_file">'+ ' Choose File'+ '</i>';
        var inputFile = '<input type="file" class="btn btn-u " style="display: none" id="post_change_file" name="file" accept="image/*, .doc, .docx,.ppt, .pptx,.txt,.pdf">';

        var blog_file_edit = '<div class="col-md-12 each_blog_file_edit" style=" padding-left: 0px; padding-right: 0px; border: solid 2px #eee; ">'+
                '<i class="fa fa-times btn btn-xs pull-right" id="cros_out" style="padding-right: 0px !important;"></i>'+
                '<a href="#" {{--target="_blank"--}} data-event-key="attachment:click" data-event-resource-type="file" data-event-action="open" data-bypass="true">'+
                '<img class="img-responsive" src="{{asset('portals/icons/new_pdf.png')}}" id="edit_post_icon" alt="">'+ '</a>'+
                '<div  class="col-md-6" id="change_uploaded_file" style="padding-left: 8px; padding-right: 0px"> </div>'+
                '<i class="fa fa fa-unlink btn btn-xs pull-right btn-u btn-brd rounded btn-u-green btn-u-sm" id="change_file"> change File</i>'+
                /*'<input type="file" class="btn btn-u " style="display: none" id="post_change_file" name="file" accept="image/!*, .doc, .docx,.ppt, .pptx,.txt,.pdf">'+*/
                '</div>';

        /*---option select2 ----*/
        $("select.category").select2({
            minimumInputLength: 2,
            ajax: {
                url: '{{ route('frontend.portal.select_category') }}',
                dataType: 'json',
                delay: 300,
                data: function (params) {
                    return {
                        category_name: params.term,
                        tag_id: $('select.tag').val()
                    }
                },
                processResults: function (data, page) {
                    return {
                        results: data
                    };
                }
            }

        });


        $("select.tag").select2({
            minimumInputLength: 2,
            ajax: {
                url: '{{ route('frontend.portal.select_tag') }}',
                dataType: 'json',
                delay: 300,
                data: function (params) {
                    return {
                        tag_name: params.term,
                        category_id: $('select.category').val()
                    }
                },
                processResults: function (data, page) {
                    return {
                        results: data
                    };
                }
            }

        });

        /*----select 2 form edit-----*/


        $("select.category_edit").select2({
            minimumInputLength: 2,
            ajax: {
                url: '{{ route('frontend.portal.select_category') }}',
                dataType: 'json',
                delay: 300,
                data: function (params) {
                    return {
                        category_name: params.term,
                        tag_id: $('select.tag').val()
                    }
                },
                processResults: function (data, page) {
                    return {
                        results: data
                    };
                }
            }

        });

        $('select.tag_edit').select2({
            minimumInputLength: 2,
            ajax: {
                url: '{{ route('frontend.portal.select_tag') }}',
                dataType: 'json',
                delay: 300,
                data: function (params) {
                    return {
                        tag_name: params.term,
                        category_id: $('select.category_edit').val()
                    }
                },
                processResults: function (data, page) {
                    return {
                        results: data
                    };
                }
            }

        });

        /*---end option select2----*/


        $('input[name=my_post]').on('change', function() {
            if($(this).is(':checked')) {
                $.ajax({
                    method: 'GET',
                    url: '{{route('frontend.portal.get_my_post')}}',
                    data:{type:'filter_my_post'},
                    dataType: 'HTML',
                    success:function(result) {
                       $('.render_post ').html(result)
                    },

                })
            } else {
                ajaxRefreshPost()

            }
        });




        $('input[name=search_post]').on('keyup', function (e) {

           if($(this).val() != '') {
               $.ajax({
                   method: 'GET',
                   url: '{{route('frontend.portal.search_post')}}',
                   data:{text: $(this).val()},
                   dataType: 'HTML',
                   success:function(result) {
                       $('.render_post ').html(result)
                   },

               })
           }
        })


        $(document).on('click', '.btn_delete_post', function(e) {
            e.preventDefault();

            var url_delete = $(this).attr('href');

            swal({
                title: "Are you sure?",
                text: "Do you want to delete this Post?",
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
                        type: 'POST',
                        url: url_delete,
                        data: {_token:'{{csrf_token()}}'},
                        dataType: "json",
                        success: function(resultData) {
                            if(resultData.status == true) {
                                swal("Deleted", "Your post is deleted :)", "success");
                                ajaxRefreshPost();
                            }
                        }
                    });

                } else {
                    swal("Cancelled", "Your post is safe :)", "error");
                }
            });
        });


        function ajaxRefreshPost()
        {
            $.ajax({
                method: 'GET',
                url: '{{route('frontend.portal.get_my_post')}}',
                data:{},
                dataType: 'HTML',
                success:function(result) {
                    $('.render_post ').html(result)
                }
            })
        }

        $(document).on('click','.btn_edit_post', function(e) {
            e.preventDefault();
            var url_edit = $(this).attr('href');
            $.ajax({
                method: 'GET',
                url: url_edit,
                data:{},
                dataType: 'Json',
                success:function(result) {

                    $('form#form_edit_post').find('input[name=is_crosed]').val(0);
                    $('textarea.edit_textarea').val(result.post.body);
                    if(!$('form#form_edit_post').find('input[name=post_id]')[0]) {
                        $('form#form_edit_post').append('<input type="hidden", name="post_id" value="'+ result.post.id +'">')
                    } else {
                        $('form#form_edit_post').find('input[name=post_id]').val(result.post.id)
                    }
                    $('form#form_edit_post').find('input#post_change_file').val('');

                    if(result.post.file) {

                        var extension = result.post.file.split('.');
                        extension = extension[1];

                        if( extension == 'png' || extension == 'jpg') {

                            if(!$('form#form_edit_post').find('div.each_blog_file_edit')[0]) {

                                $('#blog_file').html(blog_file_edit)
                            }
                            $('#edit_post_icon').prop('src', '{{asset('img/frontend/uploads/images')}}'+ '/' + result.post.file)
                            $('#edit_post_icon').css('max-width', '50%')
                            $('#change_file').text(' Change Image')

                        }
                        if(extension == 'pdf') {

                            if(!$('form#form_edit_post').find('div.each_blog_file_edit')[0]) {

                                $('#blog_file').html(blog_file_edit)
                            }
                            $('#edit_post_icon').prop('src', '{{asset('portals/icons/new_pdf.png')}}')

                        }
                        if(extension == 'doc' || extension == 'docx') {

                            if(!$('form#form_edit_post').find('div.each_blog_file_edit')[0]) {
                                $('#blog_file').html(blog_file_edit)
                            }

                            $('#edit_post_icon').prop('src', '{{asset('portals/icons/new_docx.png')}}')

                        }

                        if(extension == 'ppt' || extension == 'pptx') {

                            if(!$('form#form_edit_post').find('div.each_blog_file_edit')[0]) {
                                $('#blog_file').html(blog_file_edit)
                            }
                            $('#edit_post_icon').prop('src', '{{asset('portals/icons/new_pptx.png')}}')

                        }
                        if(extension == 'xls' || extension == 'xlsx') {

                            if(!$('form#form_edit_post').find('div.each_blog_file_edit')[0]) {
                                $('#blog_file').html(blog_file_edit)
                            }
                            $('#edit_post_icon').prop('src', '{{asset('portals/icons/new_xlsx.png')}}')
                        }

                        var split  = result.post.file.split('_');
                        var filename = split[split.length - 1];

                        $('#change_uploaded_file').replaceWith('<div  class="col-md-6" id="change_uploaded_file" style="padding-left: 8px; padding-right: 0px">'+ filename + '</div>')

                    } else {
                        $('#blog_file').html(btn)
                    }

                    var option_categories = '';
                    var option_tags = '';
                    $.each(result.category, function(key, value){
                        option_categories += '<option selected value="'+ key +'">'+value+ '</option>';
                    });
                    $.each(result.tag, function(key, value){
                        option_tags +='<option selected value="'+ key +'">'+value+ '</option>';
                    });
                    $("select.category_edit").html((option_categories));

                    $("select.tag_edit").html(option_tags);
                    $('a.clone_btn_modal').click();


                }
            })

        });

        $(document).on('click','#btn_save_edit_post',  function (e) {

            if($('form#form_edit_post').find('input#post_change_file')[0]) {
                $('form#form_edit_post').submit();
            }
        });


        $('a#icon_toggle').on('click', function (e) {

            if ($(this).attr('aria-expanded') == 'false') {
                $(this).children('i').prop('class', 'fa  fa-minus-square')
            } else {
                $(this).children('i').prop('class', 'fa  fa-plus-square')
            }
        });
    </script>

@endsection