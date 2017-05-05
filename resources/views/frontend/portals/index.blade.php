@extends('frontend.layouts.app')

@section('content')

    @include('frontend.partials.portals.score')

    @include('frontend.partials.portals.timeline')

    @include('frontend.partials.portals.calendar')

    @include('frontend.partials.portals.events')

    @include('frontend.partials.portals.sys-alerts')

    @include('frontend.partials.portals.e-learning-moodle')

@endsection

@section('after-scripts')
    <script>
        $(document).ready(function () {
            $(document).on('change', 'select[name="academic_year"]', function () {
                $.ajax({
                    type: 'GET',
                    url: '/score/' + $(this).val(),
                    success: function (response) {
                        if (response.status == true ){
                            var td = '';
                            var gpa = '';
                            var absence;

                            if(response.data.course_score.absence == null){
                                absence = 0;
                            }else{
                                absence = response.data.course_score.absence;
                            }

                            $.each(response.data.course_score, function (key, val) {

                                if (key > key - 3) {
                                    td += '<tr><td>' + val.name_en + '</td>';
                                    td += '<td>' + absence + '</td>';
                                    td += '<td>' + val.credit + '</td>';
                                    td += '<td>' + val.score + '</td></tr>';
                                }
                            });

                            if (response.data.course_score.final_score < 50) {
                                gpa = '1.5'
                            } else if (response.data.course_score.final_score < 65) {
                                gpa = '2.0'
                            } else if (response.data.course_score.final_score < 70) {
                                gpa = '2.5'
                            } else if (response.data.course_score.final_score < 70) {
                                gpa = '3.0'
                            } else if (response.data.course_score.final_score < 85) {
                                gpa = '3.5'
                            } else if (response.data.course_score.final_score >= 85) {
                                gpa = '4.0'
                            }
                            td += '<tr>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td rowspan="2">Average <br>GPA</td>' +
                                '<td>' + response.data.course_score.final_score + '<br>' + gpa + '</td>' +
                                '</tr>';

                            $('#head').show();
                            $('#score').html(td);
                        } else if(response.status == false) {
                            $('#head').hide();
                            $('#score').html("No score to view for this academic year");
                        }
                    },
                    error: function () {

                    }
                })
            });
        });
    </script>
@endsection