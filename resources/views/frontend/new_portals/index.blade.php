@extends('frontend.layouts.master_portal')


@section('after-style-end')

    {{ Html::style('bower_components/fullcalendar/dist/fullcalendar.css') }}
    <style type="text/css">

        #box-timetable {
            width: 100%;
            overflow-x: auto;
            background-color: #fff;
            padding: 10px;
        }

        .side-course {
            float: left;
            background-color: #fff;
            width: 60%;
        }

        .side-room {
            float: right;
            width: 40%;
        }

        .side-room > p {
            color: #FFF !important;
        }

        .side-course, .side-room {
            padding: 10px;
            min-height: 560px;
            box-sizing: border-box;
        }

        .fc-time-grid .fc-slats td {
            height: 2.1em !important;
            border-bottom: 0;
        }

        .fc-ltr .fc-axis {
            text-align: center;
            font-size: 14px;
        }

        .fc-time-grid-event {
            margin-bottom: 2px !important;
        }

        .fc-title {
            color: #000000;
        }

        .select {
            background-color: #fff;
            padding: 10px;
            width: 100%;

        }

    </style>

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
    <div class="table-search-v1">
        @include('frontend.new_portals.includes.partials.table_score')
    </div>
    <!--End Table Search v1-->

    <!-- Full Callendar (TimeTable) -->
    <div class="table-search-v2 md-margin-bottom-20">
        <div class="panel panel-profile">
            <div class="panel-heading overflow-h">
                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-calendar"></i> Timetable</h2>
                <div class="pull-right form-inline" style="float: right">
                    <select id="year" class="form-control">
                        <option disabled>Academic Year</option>
                        <option>2014-2015</option>
                        <option>2015-2016</option>
                        <option>2016-2017</option>
                    </select>
                    <select id="semester" class="form-control">
                        <option disabled>Semester</option>
                        <option>Semester 1</option>
                        <option>Semester 2</option>
                    </select>

                    <select id="week" class="form-control">
                        <option disabled>Week</option>
                        <option>Week 1</option>
                        <option>Week 2</option>
                        <option>Week 3</option>
                        <option>Week 4</option>
                        <option>Week 5</option>
                        <option>Week 6</option>
                        <option>Week 7</option>
                        <option>Week 8</option>
                        <option>Week 9</option>
                        <option>Week 10</option>
                        <option>Week 11</option>
                        <option>Week 12</option>
                        <option>Week 13</option>
                        <option>Week 14</option>
                        <option>Week 15</option>
                        <option>Week 16</option>
                        <option>Week 17</option>
                        <option>Week 18</option>
                    </select>
                </div>
                {{--<a href="#"><i class="fa fa-calendar pull-right"></i></a>--}}
            </div>
            <div class="panel-body">


                <div class="clearfix"></div>
                <div id="box-timetable">
                    @include('frontend.new_portals.includes.partials.timetable')
                </div>
            </div>

        </div>
    </div>
    <div style="clear: both !important;"></div>


@endsection

@section('after-script-end')

    {!! Html::script('bower_components/moment/min/moment.min.js') !!}
    {!! Html::script('bower_components/fullcalendar/dist/fullcalendar.js') !!}

    <script type="text/javascript">

        var eventData = [
            {
                title: 'Hello',
                start: '2017-01-02 07:00:00',
                end: '2017-01-02 09:00:00',
                course_name: 'AI',
                teacher_name: 'CHUN Thavorac',
                type: 'Course',
                building: 'A',
                room: 404,
                groups: ['A', 'B', 'C']
            },
            {
                title: 'Hello',
                start: '2017-01-02 13:00:00',
                end: '2017-01-02 15:00:00',
                course_name: 'Project management',
                teacher_name: 'TAL Tongsreng',
                type: 'Course',
                building: 'A',
                room: 404,
                groups: ['A', 'B', 'C']
            },
            {
                title: 'Hello',
                start: '2017-01-03 09:00:00',
                end: '2017-01-03 11:00:00',
                course_name: 'AI',
                teacher_name: 'CHUN Thavorac',
                type: 'TD',
                building: 'A',
                room: 404,
                groups: ['A', 'B', 'C']
            },
            {
                title: 'Hello',
                start: '2017-01-03 07:00:00',
                end: '2017-01-03 09:00:00',
                course_name: 'Research Methodology',
                teacher_name: 'CHHUN Sophea',
                type: 'Course',
                building: 'A',
                room: 404,
                groups: ['A', 'B', 'C']
            },
            {
                title: 'Hello',
                start: '2017-01-03 13:00:00',
                end: '2017-01-03 15:00:00',
                course_name: 'Natural Language Processing',
                teacher_name: 'KHEANG Seng',
                type: 'Course',
                building: 'A',
                room: 404,
                groups: ['A', 'B', 'C']
            },
            {
                title: 'Hello',
                start: '2017-01-04 07:00:00',
                end: '2017-01-03 09:00:00',
                course_name: 'Project Management',
                teacher_name: 'TAL Tongsreng',
                type: 'TP',
                building: 'F',
                room: 306,
                groups: ['A']
            },
            {
                title: 'Hello',
                start: '2017-01-04 13:00:00',
                end: '2017-01-03 15:00:00',
                course_name: 'Project Management',
                teacher_name: 'TAL Tongsreng',
                type: 'TP',
                building: 'F',
                room: 306,
                groups: ['B']
            },
            {
                title: 'Hello',
                start: '2017-01-04 15:00:00',
                end: '2017-01-03 17:00:00',
                course_name: 'Cloud Computing',
                teacher_name: 'YOU Vanndy',
                type: 'TP',
                building: 'F',
                room: 306,
                groups: ['A', 'B']
            },
            {
                title: 'Hello',
                start: '2017-01-05 09:00:00',
                end: '2017-01-05 11:00:00',
                course_name: 'Cloud Computing',
                teacher_name: 'YOU Vanndy',
                type: 'Course',
                building: 'F',
                room: 306,
                groups: ['A', 'B']
            },
            {
                title: 'Hello',
                start: '2017-01-05 13:00:00',
                end: '2017-01-05 15:00:00',
                course_name: 'Cloud Computing',
                teacher_name: 'YOU Vanndy',
                type: 'Course',
                building: 'F',
                room: 306,
                groups: ['A', 'B']
            },
            {
                title: 'Hello',
                start: '2017-01-05 15:00:00',
                end: '2017-01-05 17:00:00',
                course_name: 'Cloud Computing',
                teacher_name: 'YOU Vanndy',
                type: 'Course',
                building: 'F',
                room: 306,
                groups: ['A', 'B']
            },
            {
                title: 'Hello',
                start: '2017-01-06 15:00:00',
                end: '2017-01-06 17:00:00',
                course_name: 'Cloud Computing',
                teacher_name: 'YOU Vanndy',
                type: 'Course',
                building: 'F',
                room: 306,
                groups: ['A', 'B']
            },
            {
                title: 'Hello',
                start: '2017-01-06 07:00:00',
                end: '2017-01-06 09:00:00',
                course_name: 'Cloud Computing',
                teacher_name: 'YOU Vanndy',
                type: 'Course',
                building: 'F',
                room: 306,
                groups: ['A', 'B']
            },
            {
                title: 'Hello',
                start: '2017-01-06 09:00:00',
                end: '2017-01-06 11:00:00',
                course_name: 'Cloud Computing',
                teacher_name: 'YOU Vanndy',
                type: 'Course',
                building: 'F',
                room: 306,
                groups: ['A', 'B']
            },
            {
                title: 'Hello',
                start: '2017-01-06 13:00:00',
                end: '2017-01-06 15:00:00',
                course_name: 'Cloud Computing',
                teacher_name: 'YOU Vanndy',
                type: 'Course',
                building: 'F',
                room: 306,
                groups: ['A', 'B']
            }
        ];

        $('#year , #semester, #week').on('change', function () {
            var dom = $(this).parent();
            var year = dom.find('#year').val();
            var semester = dom.find('#semester').val();
            var week = dom.find('#week').val();

            $.ajax({
                type: 'POST',
                url: '{{ route('frontend.portal.timetable') }}',
                dataType: 'JSON',
                data: {
                    _token: '{!! csrf_token() !!}',
                    'year': year,
                    'semester': semester,
                    'week': week
                },
                success: function (response) {
                    if (response.status == true) {
                        var all = '';
                        all += 'Year = ' + response.year + '<br>';
                        all += 'Semester = ' + response.semester + '<br>';
                        all += 'Week = ' + response.week;

                        var data = [
                            {
                                title: 'Hello',
                                start: '2017-01-02 07:00:00',
                                end: '2017-01-02 09:00:00',
                                course_name: 'AI',
                                teacher_name: 'CHUN Thavorac',
                                type: 'Course',
                                building: 'A',
                                room: 404,
                                groups: ['A', 'B', 'C']
                            }
                        ];

                        $('#timetable').fullCalendar('removeEvents');
                        $('#timetable').fullCalendar('renderEvents', data, true);
                        $('#timetable').fullCalendar('rerenderEvents');

                    }
                }
            });

        });


        function get_timetable(eventData) {

            var date = new Date();
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();

            $('#timetable').fullCalendar({

                defaultView: 'timetable',
                defaultDate: '2017-01-01',
                header: false,
                footer: false,
                views: {
                    timetable: {
                        type: 'agendaWeek',
                        setHeight: '100px'
                    }
                },
                allDaySlot: false,
                hiddenDays: [0],
                height: 650,
                fixedWeekCount: false,
                minTime: '07:00:00',
                maxTime: '20:00:00',
                slotLabelFormat: 'h:mm a',
                columnFormat: 'dddd',
                editable: false,
                events: eventData,
                droppable: true,
                dragRevertDuration: 0,
                eventRender: function (event, element, view) {
                    var object = '<a class="fc-time-grid-event fc-v-event fc-event fc-start fc-end course-item  fc-draggable fc-resizable" style="top: 65px; bottom: -153px; z-index: 1; left: 0%; right: 0%;">' +
                        '<div class="fc-content">' +
                        '<div class="container-room">' +
                        '<div class="side-course" id="' + event.id + '">';

                    // check conflict room and render
                    object += '<div class="fc-title">' + event.course_name + '</div>';

                    // check conflict lecturer and render
                    if (typeof event.conflict_lecturer !== 'undefined') {
                        if (event.conflict_lecturer.canMerge.length > 0 || event.conflict_lecturer.canNotMerge.length > 0) {
                            object += '<p class="text-primary conflict">' + event.teacher_name + '</p> ';
                        }
                        else {
                            object += '<p class="text-primary">' + event.teacher_name + '</p> ';
                        }
                    }
                    else {
                        object += '<p class="text-primary">' + event.teacher_name + '</p> ';
                    }


                    object += '<p class="text-primary">' + event.type + '</p> ' +
                        '</div>' +
                        '<div class="side-room">' +
                        '<div class="room-name">';

                    // check conflict and render room
                    if (event.room !== null) {
                        if (event.conflict_room === true) {
                            object += '<p class="fc-room bg-danger badge" style="color: #fff !important;"> ' + event.building + '-' + event.room + '</p>';
                        } else {
                            object += '<p class="fc-room" style="color: #fff !important;">' + event.building + '-' + event.room + '</p>';
                        }
                    }
                    object += '</div>';

                    // render groups
                    if (typeof event.groups !== 'undefined') {
                        if (event.groups.length > 0) {
                            var groups = '<p>Gr: ';
                            for (var i = 0; i < event.groups.length; i++) {
                                if (event.groups[i] !== null) {
                                    groups += event.groups[i] + ' ';
                                }
                                else {
                                    groups = '';
                                }
                            }
                            groups += '</p>';
                        }
                    }
                    object += groups;
                    object += '</div> ' +
                        '<div class="clearfix"></div> ' +
                        '</div>' +
                        '</div>' +
                        '<div class="fc-bgd"></div>' +
                        '<div class="fc-resizer fc-end-resizer"></div>' +
                        '</a>';
                    return $(object);
                },
                eventOverlap: function (stillEvent, movingEvent) {
                    return stillEvent.allDay && movingEvent.allDay;
                }
            });
        }
        $(function () {
            get_timetable(eventData);
        })
    </script>

@endsection