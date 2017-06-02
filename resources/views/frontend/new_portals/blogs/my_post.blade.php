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

        .tag-box {

            padding-right: 0px;
        }
    </style>
@endsection


@section('content')

    {{--block create post--}}

    <div class="row no-padding">
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

    <div class="row blog blog-medium collapse" id="id_form"  aria-expanded="false">
        <form action="{{route('frontend.portal.store_post')}}" method="post" enctype="multipart/form-data" class="sky-form form-horizontal form_create_post">
            {{--<header style="font-size: 10pt">   Post S.th... </header>--}}
            <fieldset>
                {{csrf_field()}}
                @include('frontend.new_portals.blogs.patials.create_panel')

            </fieldset>
        </form>
    </div>

    {{--end block create post --}}

    <!--Blog Post-->
    <div class="render_post ">

        @include('frontend.new_portals.blogs.patials.each_blog_post')
    </div>
    <!--End Blog Post-->

    <hr class="margin-bottom-40">



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

        /*---upload file---*/
        $('#choose_file').on('click', function (e) {
            e.preventDefault();
            $('input[name=file]').click();
        })

        $('input[type=file]').change(function (e) {
            $('#selected_file').html($(this).val());
        });

        /*---end upload file ----*/


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
                $.ajax({
                    method: 'GET',
                    url: '{{route('frontend.portal.get_my_post')}}',
                    data:{},
                    dataType: 'HTML',
                    success:function(result) {
                        $('.render_post ').html(result)
                    },

                })

            }
        })
        /*---end option select2----*/

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
    </script>

@endsection