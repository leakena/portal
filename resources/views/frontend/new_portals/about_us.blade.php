@extends('frontend.layouts.about-us_master')


@section('after-style-end')
@endsection

@section('content')
    <div class="container content">
        <div class="row margin-bottom-40">
            <div class="col-md-6 md-margin-bottom-40">
                <p>ITC-Web-Portal is a web application to facilitate all students of Institute of Technology of Cambodia (ITC) to get information quickly via internet such as:
                </p>
                <ul class="list-unstyled">
                    <li><i class="fa fa-check color-dark-blue"></i> Viewing student’s weekly attendance</li>
                    <li><i class="fa fa-check color-dark-blue"></i> Viewing student’s score by their academic year</li>
                    <li><i class="fa fa-check color-dark-blue"></i> Viewing weekly timetable</li>
                    <li><i class="fa fa-check color-dark-blue"></i> Viewing school event (seminar, company’s presentation, conference …)</li>
                    <li><i class="fa fa-check color-dark-blue"></i> Managing student’s resume for applying jobs or internship</li>
                    <li><i class="fa fa-check color-dark-blue"></i> Sharing documents</li>
                </ul>
                <br>

                <!-- Blockquotes -->
                {{--<blockquote class="hero-unify">--}}
                    {{--<p>Award winning digital agency. We bring a personal and effective approach to every project we work--}}
                        {{--on, which is why.</p>--}}
                    {{--<small>CEO Jack Bour</small>--}}
                {{--</blockquote>--}}
            </div>

            {{--<div class="col-md-6 md-margin-bottom-40">--}}
            {{--<div class="responsive-video">--}}
            {{--<iframe src="http://player.vimeo.com/video/9679622" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>--}}
            {{--</div>--}}
            {{--</div>--}}
        </div><!--/row-->

        <div class="headline"><h2>Contact</h2></div>

            <ul class="list-unstyled margin-bottom-40">
                <li><i class="fa fa-phone color-dark-blue"></i>
                    +855 10 855 199
                </li>
                <li><i class="fa fa-envelope color-dark-blue"></i>
                    eutchanleakena@gmail.com
                </li>
            </ul>
        <br/>



        <!-- Meer Our Team -->
        <div class="headline"><h2>Meet Our Team</h2></div>
        <div class="row team">
            <div class="col-sm-3">
                <div class="thumbnail-style">
                    <img class="img-responsive" src="{{ url('portals/assets/img/team/img32-md.jpg') }}" alt="">
                    <h3><a>CHUN Thavorac</a>
                        <small>Project Manager</small>
                    </h3>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta
                        sem...</p>
                    <ul class="list-unstyled list-inline team-socail">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="thumbnail-style">
                    <img class="img-responsive" src="{{ url('portals/assets/img/team/img32-md.jpg') }}" alt="">
                    <h3><a>RIN Vannat</a>
                        <small>Senior Developer</small>
                    </h3>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta
                        sem...</p>
                    <ul class="list-unstyled list-inline team-socail">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="thumbnail-style">
                    <img class="img-responsive" src="{{ url('portals/assets/img/team/img32-md.jpg') }}" alt="">
                    <h3><a>EUT Chanleakena</a>
                        <small>Developer</small>
                    </h3>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta
                        sem...</p>
                    <ul class="list-unstyled list-inline team-socail">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="thumbnail-style">
                    <img class="img-responsive" src="{{ url('portals/assets/img/team/img32-md.jpg') }}" alt="">
                    <h3><a>HEL Mab</a>
                        <small>Developer</small>
                    </h3>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta
                        sem...</p>
                    <ul class="list-unstyled list-inline team-socail">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div><!--/team-->
        <!-- End Meer Our Team -->

        <!-- Owl Clients v1 -->
    {{--<div class="headline"><h2>Our Clients</h2></div>--}}
    {{--<div class="owl-clients-v1 owl-carousel owl-theme" style="opacity: 1; display: block;">--}}
    {{--<div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 2934px; left: 0px; display: block; transform: translate3d(-326px, 0px, 0px); transition: all 200ms ease;"><div class="owl-item" style="width: 163px;"><div class="item">--}}
    {{--<img src="assets/img/clients4/1.png" alt="">--}}
    {{--</div></div><div class="owl-item" style="width: 163px;"><div class="item">--}}
    {{--<img src="assets/img/clients4/2.png" alt="">--}}
    {{--</div></div><div class="owl-item" style="width: 163px;"><div class="item">--}}
    {{--<img src="assets/img/clients4/3.png" alt="">--}}
    {{--</div></div><div class="owl-item" style="width: 163px;"><div class="item">--}}
    {{--<img src="assets/img/clients4/4.png" alt="">--}}
    {{--</div></div><div class="owl-item" style="width: 163px;"><div class="item">--}}
    {{--<img src="assets/img/clients4/5.png" alt="">--}}
    {{--</div></div><div class="owl-item" style="width: 163px;"><div class="item">--}}
    {{--<img src="assets/img/clients4/6.png" alt="">--}}
    {{--</div></div><div class="owl-item" style="width: 163px;"><div class="item">--}}
    {{--<img src="assets/img/clients4/7.png" alt="">--}}
    {{--</div></div><div class="owl-item" style="width: 163px;"><div class="item">--}}
    {{--<img src="assets/img/clients4/8.png" alt="">--}}
    {{--</div></div><div class="owl-item" style="width: 163px;"><div class="item">--}}
    {{--<img src="assets/img/clients4/9.png" alt="">--}}
    {{--</div></div></div></div>--}}
    {{--<div class="owl-controls clickable"><div class="owl-pagination"><div class="owl-page"><span class=""></span></div><div class="owl-page active"><span class=""></span></div></div></div></div>--}}
    {{--<!-- End Owl Clients v1 -->--}}
    {{--</div>--}}
@endsection