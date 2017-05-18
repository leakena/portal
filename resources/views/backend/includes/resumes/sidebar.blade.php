<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li {!! Request::is('resume/user-info/*') ? 'class=current-page' : '' !!}>
                <a href="{{ route('frontend.resume.user_info') }}"><i class="fa fa-user-circle-o"></i> Personal Information </a>
            </li>
            <li>
                <a href="{{ route('frontend.resume.career_profile') }}"><i class="fa fa-address-card"></i> Career Profile </a>
            </li>
            <li {!! Request::is('resume/experiences/*') ? 'class=current-page' : '' !!}>
                <a href="{{ route('frontend.resume.get_experience') }}"><i class="fa fa-briefcase"></i> Experiences </a>
            </li>
            <li {!! Request::is('resume/educations/*') ? 'class=current-page' : '' !!}>
                <a href="{{ route('frontend.resume.get_education') }}"><i class="fa fa-graduation-cap"></i> Education </a>
            </li>
            <li {!! Request::is('resume/skills/*') ? 'class=current-page' : '' !!}>
                 <a href="{{ route('frontend.resume.get_skill') }}"><i class="fa fa-snowflake-o"></i> Skill </a>
            </li>
            <li {!! Request::is('resume/languages/*') ? 'class=current-page' : '' !!}>
                <a href="{{ route('frontend.resume.get_language') }}"><i class="fa fa-flag"></i> Languages </a>
            </li>
            <li {!! Request::is('resume/interests/*') ? 'class=current-page' : '' !!}>
                <a href="{{ route('frontend.resume.get_interest') }}"><i class="fa fa-gratipay"></i> Interest </a>
            </li>
            <li {!! Request::is('resume/references/*') ? 'class=current-page' : '' !!}>
                <a href="{{ route('frontend.resume.get_reference') }}"><i class="fa fa-external-link-square"></i> Reference </a>
            </li>
        </ul>
    </div>
</div>
