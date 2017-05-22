@extends('frontend.layouts.blog_master')


@section('content')


    {{--block create post--}}

        <div class="row blog blog-medium margin-bottom-40">
            <div class="col-md-11">
                @include('frontend.new_portals.blogs.patials.create_panel')
            </div>

        </div>

    {{--end block create post --}}

    <!--Blog Post-->
    <div class="row blog blog-medium margin-bottom-40">

        <div class="col-md-5">
            <img class="img-responsive" src="{{asset('portals/assets/img/main/img22.jpg')}}" alt="">
        </div>
        <div class="col-md-7">
            @include('frontend.new_portals.blogs.patials.dropdown_action')
            <h2><a href="#">Pellentesque Habitant Morbi Tristique</a></h2>
            <ul class="list-unstyled list-inline blog-info">
                <li><i class="fa fa-calendar"></i> November 02, 2013</li>
                <li><i class="fa fa-comments"></i> <a href="#">24 Comments</a></li>
                <li><i class="fa fa-tags"></i> Technology, Internet</li>
            </ul>
            <p>At vero eos et accusamus et iusto odiomolestias dignis simos ducimus qui blandit occaeca bais
                praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint
                occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia
                animi, id est laborum et dolorum fuga.</p>
            <p><a class="btn-u btn-u-sm" href="blog_item.html">Read More <i
                            class="fa fa-angle-double-right margin-left-5"></i></a></p>
        </div>
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