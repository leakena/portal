<div class="row">
    <div class="col-md-12">
        <div class="wrapper sub-wrapper">
            <div class="main-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="contact-container container-block">
                            <h2 class="container-block-title section-title"><i class="fa fa-calendar"></i> SCORE </h2>
                            <div class="table-responsive">
                                <table class="table table-bordered table-condensed">
                                    <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Abs</th>
                                        <th>Credit</th>
                                        <th>Score</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($studentData as $student)
                                            @if(is_array($student))
                                                <tr>
                                                    <td>{{ $student['name_en'] }}</td>
                                                    <td>{{ $student['absence'] }}</td>
                                                    <td>{{ $student['credit']  }}</td>
                                                    <td>{{ $student['score'] }}</td>
                                                </tr>
                                            @endif

                                        @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td rowspan="2">
                                            Average <br>
                                            GPA
                                        </td>
                                        <td>
                                            {{ $studentData['final_score'] }}
                                            @if( $studentData['final_score'] < 50 )
                                                <p>1.5</p>
                                            @elseif( $studentData['final_score'] < 65 )
                                                <p>2.0</p>
                                            @elseif( $studentData['final_score'] < 70 )
                                                <p>2.5</p>
                                            @elseif( $studentData['final_score'] < 80 )
                                                <p>3.0</p>
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>



                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>