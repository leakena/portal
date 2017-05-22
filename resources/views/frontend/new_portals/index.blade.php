@extends('frontend.layouts.master_portal')


@section('after-style-end')

@endsection

@section('content')

    <div class="row margin-bottom-20">
        <!--Profile Library Book -->
        <div class="col-sm-6">
            @include('frontend.new_portals.includes.partials.list_books')
        </div>
        <!--End Profile Book-->
        <!--Profile Event-->
        <div class="col-sm-6 md-margin-bottom-20">
            @include('frontend.new_portals.includes.partials.list_events')
        </div>
        <!--End Profile Event-->
    </div><!--/end row-->
    <hr>
    <!--Table Score Annual -->
    <div class="table-search-v1 margin-bottom-20">
        @include('frontend.new_portals.includes.partials.table_score')
    </div>
    <!--End Table Search v1-->

    <!-- Full Callendar (TimeTable) -->
    <div class="table-search-v2">
        <h4>Timetable Here</h4>
        @include('frontend.new_portals.includes.partials.timetable')
    </div>

@endsection

@section('after-script-end')

@endsection