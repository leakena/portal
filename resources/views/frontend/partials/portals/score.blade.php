<div class="row">
    <div class="col-md-12">
        <div class="wrapper sub-wrapper">
            <div class="main-wrapper">
                <div class="row">
                    <div class="col-md-9">
                        <h2 class="container-block-title section-title"><i class="fa fa-calendar"></i> SCORE </h2>
                    </div>
                    <div class="col-md-3">
                        <select name="academic_year" class="form-control select">

                            @foreach($years as $year)
                                @if($academic_year['id'] == $year['id'])
                                    <option selected value="{{ $year['id'] }}">{{ $year['id'] }}</option>
                                @else
                                    <option value="{{ $year['id'] }}">{{ $year['id'] }}</option>
                                @endif

                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-12">
                        <div class="contact-container container-block">

                            <div class="table-responsive">
                                @if(isset($scores))
                                    <table class="table table-bordered table-condensed">
                                        <thead>
                                        <tr id="head">
                                            <th>Subject</th>
                                            <th>Abs</th>
                                            <th>Credit</th>
                                            <th>Score</th>
                                        </tr>
                                        </thead>
                                        <tbody id="score">
                                        @foreach($scores as $student)
                                            @if(is_array($student))
                                                <tr>
                                                    <td>{{ $student['name_en'] }}</td>
                                                    <td>
                                                        @if($student['absence'] == null)
                                                            0
                                                        @else
                                                            {{ $student['absence'] }}
                                                        @endif
                                                    </td>
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
                                                @if(isset($scores['final_score']))
                                                    {{ isset($scores['final_score'])?$scores['final_score']: 0 }}
                                                    @if( $scores['final_score'] < 50 )
                                                        <p>1.5</p>
                                                    @elseif( $scores['final_score'] < 65 )
                                                        <p>2.0</p>
                                                    @elseif( $scores['final_score'] < 70 )
                                                        <p>2.5</p>
                                                    @elseif( $scores['final_score'] < 80 )
                                                        <p>3.0</p>
                                                    @endif
                                                @else
                                                    0
                                                @endif

                                            </td>
                                        </tr>
                                        </tbody>


                                    </table>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
