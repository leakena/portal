{{--
<div class="col-md-3">
    <!-- Social Icons -->
    <div class="magazine-sb-social margin-bottom-30">
        <div class="headline headline-md"><h2>Social Icons</h2></div>
        <ul class="social-icons social-icons-color">
            <li><a class="social_rss" data-original-title="Feed" href="#"></a></li>
            <li><a class="social_facebook" data-original-title="Facebook" href="#"></a></li>
            <li><a class="social_twitter" data-original-title="Twitter" href="#"></a></li>
            <li><a class="social_vimeo" data-original-title="Vimeo" href="#"></a></li>
            <li><a class="social_googleplus" data-original-title="Goole Plus" href="#"></a></li>
            <li><a class="social_pintrest" data-original-title="Pinterest" href="#"></a></li>
            <li><a class="social_linkedin" data-original-title="Linkedin" href="#"></a></li>
            <li><a class="social_dropbox" data-original-title="Dropbox" href="#"></a></li>
            <li><a class="social_picasa" data-original-title="Picasa" href="#"></a></li>
            <li><a class="social_spotify" data-original-title="Spotify" href="#"></a></li>
            <li><a class="social_jolicloud" data-original-title="Jolicloud" href="#"></a></li>
            <li><a class="social_wordpress" data-original-title="Wordpress" href="#"></a></li>
            <li><a class="social_github" data-original-title="Github" href="#"></a></li>
            <li><a class="social_xing" data-original-title="Xing" href="#"></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <!-- End Social Icons -->

    <!-- Posts -->
    <div class="posts margin-bottom-40">
        <div class="headline headline-md"><h2>Recent Posts</h2></div>
        <dl class="dl-horizontal">
            <dt><a href="#"><img src="assets/img/sliders/elastislide/6.jpg" alt="" /></a></dt>
            <dd>
                <p><a href="#">Responsive Bootstrap 3 Template placerat idelo alac eratamet.</a></p>
            </dd>
        </dl>
        <dl class="dl-horizontal">
            <dt><a href="#"><img src="assets/img/sliders/elastislide/10.jpg" alt="" /></a></dt>
            <dd>
                <p><a href="#">100+ Amazing Features Layer Slider, Layer Slider, Icons, 60+ Pages etc.</a></p>
            </dd>
        </dl>
        <dl class="dl-horizontal">
            <dt><a href="#"><img src="assets/img/sliders/elastislide/11.jpg" alt="" /></a></dt>
            <dd>
                <p><a href="#">Developer Friendly Code imperdiet condime ntumi mperdiet condim.</a></p>
            </dd>
        </dl>
    </div><!--/posts-->
    <!-- End Posts -->

    <!-- Tabs Widget -->
    <div class="headline headline-md"><h2>Tabs Widget</h2></div>
    <div class="tab-v2 margin-bottom-40">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home-1">About Us</a></li>
            <li><a data-toggle="tab" href="#home-2">Quick Links</a></li>
        </ul>
        <div class="tab-content">
            <div id="home-1" class="tab-pane active">
                <p>Vivamus imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac ac adipiscing nunc.</p> <p>Pellentesque fermentum, ante ac felis consectetur id. Donec eget orci metusvivamus imperdiet.</p>
            </div>
            <div id="home-2" class="tab-pane magazine-sb-categories">
                <div class="row">
                    <ul class="list-unstyled col-xs-6">
                        <li><a href="#">Best Sliders</a></li>
                        <li><a href="#">Parralax Page</a></li>
                        <li><a href="#">Backgrounds</a></li>
                        <li><a href="#">Parralax Slider</a></li>
                        <li><a href="#">Responsive</a></li>
                        <li><a href="#">800+ Icons</a></li>
                    </ul>
                    <ul class="list-unstyled col-xs-6">
                        <li><a href="#">60+ Pages</a></li>
                        <li><a href="#">Layer Slider</a></li>
                        <li><a href="#">Bootstrap 3</a></li>
                        <li><a href="#">Fixed Header</a></li>
                        <li><a href="#">Best Template</a></li>
                        <li><a href="#">And Many More</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Tabs Widget -->

    <!-- Photo Stream -->
    <div class="headline headline-md"><h2>Photo Stream</h2></div>
    <ul class="list-unstyled blog-photos margin-bottom-30">
        <li><a href="#"><img class="hover-effect" alt="" src="assets/img/sliders/elastislide/5.jpg"></a></li>
        <li><a href="#"><img class="hover-effect" alt="" src="assets/img/sliders/elastislide/6.jpg"></a></li>
        <li><a href="#"><img class="hover-effect" alt="" src="assets/img/sliders/elastislide/8.jpg"></a></li>
        <li><a href="#"><img class="hover-effect" alt="" src="assets/img/sliders/elastislide/10.jpg"></a></li>
        <li><a href="#"><img class="hover-effect" alt="" src="assets/img/sliders/elastislide/11.jpg"></a></li>
        <li><a href="#"><img class="hover-effect" alt="" src="assets/img/sliders/elastislide/1.jpg"></a></li>
        <li><a href="#"><img class="hover-effect" alt="" src="assets/img/sliders/elastislide/2.jpg"></a></li>
        <li><a href="#"><img class="hover-effect" alt="" src="assets/img/sliders/elastislide/7.jpg"></a></li>
    </ul>
    <!-- End Photo Stream -->
</div>--}}


<div class="col-md-3 magazine-page" id="right_sidebar">


    <!-- Posts -->
    <div class="posts margin-bottom-40">
        <div class="headline headline-md"><h2>Recent Posts</h2></div>
        @if(isset($recent_posts))
            @foreach($recent_posts as $recent_post)
                <dl class="dl-horizontal">
                    <dt><a href="#"><img class="recent_post_profile" data-placement="right" data-toggle="tooltip"
                                         title="{{ strtoupper(User::iPosted($recent_post->create_uid)->name) }}"
                                         src="{{isset($recent_post->user->resume)?(isset($recent_post->user->resume->personalInfo)?(isset($recent_post->user->resume->personalInfo->profile)?url('img/backend/profile/'.$recent_post->user->resume->personalInfo->profile):url('portals/assets/img/team/img32-md.jpg')):url('portals/assets/img/team/img32-md.jpg')):url('portals/assets/img/team/img32-md.jpg')}}"
                                         alt=""/></a></dt>
                    <dd>
                        <p>
                            <a href="#"><strong>{{ isset($recent_post->body)?str_limit($recent_post->title, 20):'' }}</strong></a>
                        </p>
                        <p><a href="#">{{ isset($recent_post->body)?str_limit($recent_post->body, 30):'' }}</a></p>
                    </dd>
                </dl>
            @endforeach
        @endif
        {{--<dl class="dl-horizontal">--}}
        {{--<dt><a href="#"><img src="{{asset('portals/assets/img/sliders/elastislide/6.jpg')}}" alt="" /></a></dt>--}}
        {{--<dd>--}}
        {{--<p><a href="#">Responsive Bootstrap 3 Template placerat idelo alac eratamet.</a></p>--}}
        {{--</dd>--}}
        {{--</dl>--}}
        {{--<dl class="dl-horizontal">--}}
        {{--<dt><a href="#"><img src="{{asset('portals/assets/img/sliders/elastislide/10.jpg')}}" alt="" /></a></dt>--}}
        {{--<dd>--}}
        {{--<p><a href="#">100+ Amazing Features Layer Slider, Layer Slider, Icons, 60+ Pages etc.</a></p>--}}
        {{--</dd>--}}
        {{--</dl>--}}
        {{--<dl class="dl-horizontal">--}}
        {{--<dt><a href="#"><img src="{{asset('portals/assets/img/sliders/elastislide/10.jpg')}}" alt="" /></a></dt>--}}
        {{--<dd>--}}
        {{--<p><a href="#">Developer Friendly Code imperdiet condime ntumi mperdiet condim.</a></p>--}}
        {{--</dd>--}}
        {{--</dl>--}}
    </div><!--/posts-->
    <!-- End Posts -->

    <!-- Blog Category -->

    <div class="headline headline-md"><h2>Categories</h2></div>
    <div class="blog_category">
        @include('frontend.layouts.includes.blog.blog_category')
    </div>
    <!-- End Blog Category -->

    <!-- Photo Stream -->
{{--<div class="headline headline-md"><h2>Photo Stream</h2></div>
<ul class="list-unstyled blog-photos margin-bottom-30">
    <li><a href="#"><img class="hover-effect" alt="" src="assets/img/sliders/elastislide/5.jpg"></a></li>
    <li><a href="#"><img class="hover-effect" alt="" src="assets/img/sliders/elastislide/6.jpg"></a></li>
    <li><a href="#"><img class="hover-effect" alt="" src="assets/img/sliders/elastislide/8.jpg"></a></li>
    <li><a href="#"><img class="hover-effect" alt="" src="assets/img/sliders/elastislide/10.jpg"></a></li>
    <li><a href="#"><img class="hover-effect" alt="" src="assets/img/sliders/elastislide/11.jpg"></a></li>
    <li><a href="#"><img class="hover-effect" alt="" src="assets/img/sliders/elastislide/1.jpg"></a></li>
    <li><a href="#"><img class="hover-effect" alt="" src="assets/img/sliders/elastislide/2.jpg"></a></li>
    <li><a href="#"><img class="hover-effect" alt="" src="assets/img/sliders/elastislide/7.jpg"></a></li>
</ul>--}}
<!-- End Photo Stream -->

    <!-- Blog Tags -->
    <div class="headline headline-md"><h2>Blog Tags</h2></div>
    <div class="blog_tag">
        @include('frontend.layouts.includes.blog.blog_tag')
    </div>

    <!-- End Blog Tags -->

    <!-- Blog Latest Tweets -->
{{--<div class="blog-twitter margin-bottom-30">
    <div class="headline headline-md"><h2>Latest Tweets</h2></div>
    <div class="blog-twitter-inner">
        <i class="fa fa-twitter"></i>
        <a href="#">@htmlstream</a>
        At vero eos et accusamus et iusto odio dignissimos.
        <a href="#">http://t.co/sBav7dm</a>
        <span>5 hours ago</span>
    </div>
    <div class="blog-twitter-inner">
        <i class="fa fa-twitter"></i>
        <a href="#">@htmlstream</a>
        At vero eos et accusamus et iusto odio dignissimos.
        <a href="#">http://t.co/sBav7dm</a>
        <span>5 hours ago</span>
    </div>
    <div class="blog-twitter-inner">
        <i class="fa fa-twitter"></i>
        <a href="#">@htmlstream</a>
        At vero eos et accusamus et iusto odio dignissimos.
        <a href="#">http://t.co/sBav7dm</a>
        <span>5 hours ago</span>
    </div>
    <div class="blog-twitter-inner">
        <i class="fa fa-twitter"></i>
        <a href="#">@htmlstream</a>
        At vero eos et accusamus et iusto odio dignissimos.
        <a href="#">http://t.co/sBav7dm</a>
        <span>5 hours ago</span>
    </div>
</div>--}}
<!-- End Blog Latest Tweets -->
</div>
