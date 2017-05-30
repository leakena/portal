<div class="col-md-3 md-margin-bottom-40">

    <img class="img-responsive profile-img margin-bottom-20" style="width: 100% !important;"
         src="{{isset($personal_info)?url('img/backend/profile/'.$personal_info->profile):url('portals/assets/img/team/img32-md.jpg')}}"
         alt="">

    <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
        <li class="list-group-item {{ ActiveManager::isActiveRoute('frontend.portal.index') }}">
            <a href="{{route('frontend.portal.index')}}"><i
                        class="fa fa-bar-chart-o"></i> {{trans('portal.left_sidebar.menu.overal')}}</a>
        </li>
        <li class="list-group-item {{ ActiveManager::isActiveRoute('frontend.portal.profile') }}">
            <a href="{{route('frontend.portal.profile')}}"><i
                        class="fa fa-user"></i> {{trans('portal.left_sidebar.menu.profile')}}</a>
        </li>
        <li class="list-group-item {{ ActiveManager::isActiveRoute('frontend.portal.classmate') }} ">
            <a href="{{route('frontend.portal.classmate')}}"><i
                        class="fa fa-group"></i> {{trans('portal.left_sidebar.menu.class_mate')}}</a>
        </li>
        <li class="list-group-item {{ ActiveManager::isActiveRoute('frontend.portal.involve_project') }}">
            <a href="{{route('frontend.portal.involve_project')}}"><i
                        class="fa fa-cubes"></i> {{trans('portal.left_sidebar.menu.project')}}</a>
        </li>
        {{-- <li class="list-group-item">
             <a href="page_profile_comments.html"><i class="fa fa-comments"></i> Comments</a>
         </li>--}}
        <li class="list-group-item {{ ActiveManager::isActiveRoute('frontend.portal.history') }}">
            <a href="{{route('frontend.portal.history')}}"><i
                        class="fa fa-history"></i> {{trans('portal.left_sidebar.menu.history')}}</a>
        </li>
        <li class="list-group-item {{ ActiveManager::isActiveRoute('frontend.portal.setting') }}">
            <a href="{{route('frontend.portal.setting')}}"><i
                        class="fa fa-cog"></i> {{trans('portal.left_sidebar.menu.setting')}}</a>
        </li>
        <li class="list-group-item list-toggle {{ ActiveManager::areActiveRoutes($resumeActiveRoute) }}">
            <?php $check = ActiveManager::iscollapsed($resumeActiveRoute)?>
            <a class="{{$check['class']}}" href="#collapse-forms" data-toggle="collapse"
               aria-expanded="{{ $check['status'] }}"> <i class="icon-education-164" style="font-size: 12pt"></i> Resume
            </a>
            <ul id="collapse-forms" class="collapse {{ $check['in'] }}"
                aria-expanded="{{ $check['status'] }}" {{$check['style']}}>
                <li class="{{ ActiveManager::isActiveRoute('frontend.portal.resume.experience') }}">
                    <a href="{{route('frontend.portal.resume.experience')}}">
                        <i class="fa fa-briefcase"></i>
                        Experience
                    </a>
                </li>
                <li class="{{ ActiveManager::isActiveRoute('frontend.portal.resume.education') }}">
                    {{--<span class="badge badge-u">New</span>--}}
                    <a href="{{route('frontend.portal.resume.education')}}"><i class="fa fa-graduation-cap"></i>Education</a>
                </li>
                <li class="{{ ActiveManager::isActiveRoute('frontend.portal.resume.skill') }}">
                    {{--<span class="badge badge-u">New</span>--}}
                    <a href="{{route('frontend.portal.resume.skill')}}"><i class="fa fa-snowflake-o"></i> Skill and Language </a>
                </li>
                {{--<li class="{{ ActiveManager::isActiveRoute('frontend.portal.resume.language') }}">--}}
                    {{--<span class="badge badge-u">New</span>--}}
                    {{--<a href="{{ route('frontend.portal.resume.language') }}"><i class="fa fa-flag"></i> Language </a>--}}
                {{--</li>--}}
                <li>
                    {{--<span class="badge badge-u">New</span>--}}
                    <a href="shortcode_form_layouts_advanced.html"><i class="fa fa-gratipay"></i> Interest </a>
                </li>
                <li class="{{ ActiveManager::isActiveRoute('frontend.portal.resume.reference') }}">
                    {{--<span class="badge badge-u">New</span>--}}
                    <a href="{{ route('frontend.portal.resume.reference') }}"><i class="fa fa-external-link-square"></i>
                        Reference </a>
                </li>

            </ul>
        </li>
    </ul>

    <div class="panel-heading-v2 overflow-h">
        <h2 class="heading-xs pull-left"><i class="fa fa-bar-chart-o"></i> Task Progress</h2>
        <a href="#"><i class="fa fa-cog pull-right"></i></a>
    </div>
    <h3 class="heading-xs">Web Design <span class="pull-right">92%</span></h3>
    <div class="progress progress-u progress-xxs">
        <div style="width: 92%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="92" role="progressbar"
             class="progress-bar progress-bar-u">
        </div>
    </div>
    <h3 class="heading-xs">Unify Project <span class="pull-right">85%</span></h3>
    <div class="progress progress-u progress-xxs">
        <div style="width: 85%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="85" role="progressbar"
             class="progress-bar progress-bar-blue">
        </div>
    </div>
    <h3 class="heading-xs">Sony Corporation <span class="pull-right">64%</span></h3>
    <div class="progress progress-u progress-xxs margin-bottom-40">
        <div style="width: 64%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="64" role="progressbar"
             class="progress-bar progress-bar-dark">
        </div>
    </div>

    <hr>

    <!--Notification-->
{{--<div class="panel-heading-v2 overflow-h">
    <h2 class="heading-xs pull-left"><i class="fa fa-bell-o"></i> Notification</h2>
    <a href="#"><i class="fa fa-cog pull-right"></i></a>
</div>
<ul class="list-unstyled mCustomScrollbar margin-bottom-20" data-mcs-theme="minimal-dark">
    <li class="notification">
        <i class="icon-custom icon-sm rounded-x icon-bg-red icon-line icon-envelope"></i>
        <div class="overflow-h">
            <span><strong>Albert Heller</strong> has sent you email.</span>
            <small>Two minutes ago</small>
        </div>
    </li>
    <li class="notification">
        <img class="rounded-x" src="assets/img/testimonials/img6.jpg" alt="">
        <div class="overflow-h">
            <span><strong>Taylor Lee</strong> started following you.</span>
            <small>Today 18:25 pm</small>
        </div>
    </li>
    <li class="notification">
        <i class="icon-custom icon-sm rounded-x icon-bg-yellow icon-line fa fa-bolt"></i>
        <div class="overflow-h">
            <span><strong>Natasha Kolnikova</strong> accepted your invitation.</span>
            <small>Yesterday 1:07 pm</small>
        </div>
    </li>
    <li class="notification">
        <img class="rounded-x" src="assets/img/testimonials/img1.jpg" alt="">
        <div class="overflow-h">
            <span><strong>Mikel Andrews</strong> commented on your Timeline.</span>
            <small>23/12 11:01 am</small>
        </div>
    </li>
    <li class="notification">
        <i class="icon-custom icon-sm rounded-x icon-bg-blue icon-line fa fa-comments"></i>
        <div class="overflow-h">
            <span><strong>Bruno Js.</strong> added you to group chating.</span>
            <small>Yesterday 1:07 pm</small>
        </div>
    </li>
    <li class="notification">
        <img class="rounded-x" src="assets/img/testimonials/img6.jpg" alt="">
        <div class="overflow-h">
            <span><strong>Taylor Lee</strong> changed profile picture.</span>
            <small>23/12 15:15 pm</small>
        </div>
    </li>
</ul>
<button type="button" class="btn-u btn-u-default btn-u-sm btn-block">Load More</button>--}}
<!--End Notification-->

    <div class="margin-bottom-50"></div>

    <!--Datepicker-->
    <form action="#" id="sky-form2" class="sky-form">
        <div id="inline-start" style="margin-left: -10px">

        </div>
    </form>
    <!--End Datepicker-->
</div>