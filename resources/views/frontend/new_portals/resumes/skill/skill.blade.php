@extends('frontend.layouts.master_portal')


@section('content')


    <div class="profile-bio margin-bottom-30">
        <form action="assets/php/demo-order.php" method="post" enctype="multipart/form-data" id="sky-form1" class="sky-form" novalidate="novalidate">
            <header> <a  style="position: sticky;" class="accordion-toggle collapsed pull-right" id="icon_toggle" href="#id_form" data-toggle="collapse" aria-expanded="false"> <i class="fa fa-plus-square" id="add"> </i> </a> Create Your Skills </header>
            <div id="id_form" class="collapse " aria-expanded="false">
                <fieldset>
                    @include('frontend.new_portals.resumes.skill.includes.field')
                </fieldset>
            </div>
        </form>
    </div>

@endsection