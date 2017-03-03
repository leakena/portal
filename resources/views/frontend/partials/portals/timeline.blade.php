<div class="row">
    <div class="col-md-12">
        <div class="wrapper sub-wrapper">
            <div class="main-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="contact-container container-block">
                            <h2 class="container-block-title section-title"><i class="fa fa-calendar"></i> {{ trans('tmp.resume.timeline') }} </h2>
                            @foreach($posts as $post)

                                @include('frontend.portals.post')

                            @endforeach
                            <div class="side-footer">
                                <a href="/posts">See all posts</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>