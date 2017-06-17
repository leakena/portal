
<html>
    <head>
        <title></title>
        {{ Html::style('portals/assets/plugins/bootstrap/css/bootstrap.css') }}

        <style type="text/css">
            body{
                background-color: #f1f1f1;
            }
            .borderless td, .borderless th {
                border: none !important;
            }
            .borderless .experience{
                border-bottom: 2px solid black;
            }
            .education{
                border-bottom: 2px solid black;
            }

            .language{
                border-bottom: 2px solid black;
            }
            .interest{
                border-bottom: 2px solid black;
            }
            .reference{
                border-bottom: 2px solid black;
            }
            .page{
                width: 980px;
                margin: 0 auto;
                border: 0;
                background-color: #FFFFFF;
                box-shadow: 0 1px 2px rgba(0,0,0,.1);
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                padding: 10px;
            }
        </style>
    </head>
    <body>
    <div class="page">
        <center><h2><strong>Curriculum Vitae</strong> </h2></center>

        <table class="table borderless">
            @if(isset($resume->personalInfo))
            <tr>
                <td rowspan="9">
                    <img src="{{ isset($resume->personalInfo->profile)?url('img/backend/profile/'.$resume->personalInfo->profile):'' }}" style="width: 150px">
                </td>
                <td>
                    <strong>Name</strong>
                </td>
                <td>
                    :{{ $student['name_latin'] }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Gender</strong>
                </td>
                <td>
                    :{{ $student['name_en'] }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Date of birth</strong>
                </td>
                <td>
                    :{{ (new \Carbon\Carbon($student['dob']))->toDateString() }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Place of birth</strong>
                </td>
                <td>
                    :{{ $resume->personalInfo->birth_place }}
                </td>
            </tr>
            <tr>

                <td>
                    <strong>Marital status</strong>
                </td>
                <td>
                    :{{ $resume->personalInfo->status->name }}
                </td>
            </tr>
            <tr>

                <td>
                    <strong>Quote</strong>
                </td>
                <td>
                    :{{ $resume->career_profile }}
                </td>
            </tr>
            <tr>

                <td>
                    <strong>Address</strong>
                </td>
                <td>
                    :{{ $resume->personalInfo->address }}
                </td>
            </tr>
            <tr>

                <td>
                    <strong>Phone</strong>
                </td>
                <td>
                    :{{ $resume->personalInfo->phone }}
                </td>
            </tr>
            <tr class="email">

                <td>
                    <strong>Email</strong>
                </td>
                <td>
                    :{{ $resume->personalInfo->email }}
                </td>
            </tr>
            @endif
            {{--Experience's part--}}

            <tr class="experience">
                <td style="border-bottom: 1px solid #000;">
                    <h3>Experience</h3>
                </td>
                <td colspan="2"></td>
            </tr>

            @if($experiences = $resume->experiences)
                @foreach($experiences as $experience)
                    <tr>
                        <td>
                            <strong>{{ $experience->position }}</strong> <br/>
                            {{ $experience->start_date }} -
                            @if($experience->is_present == true)
                                Present
                            @else
                                {{ $experience->end_date }}
                            @endif
                        </td>
                        <td colspan="2">
                            <strong>{{ $experience->company }}</strong><br/>
                            {{ $experience->address }}<br/>
                            {{ $experience->description }}
                        </td>
                    </tr>
                @endforeach
            @endif

            {{--Education's part--}}
            <tr class="education">
                <td>
                    <h3>Education</h3>
                </td>
                <td colspan="2"></td>
            </tr>
            @if($educations = $resume->educations)
                @foreach($educations as $education)
                    <tr class="education1">
                        <td>
                            <strong>{{ $education->degree->name }}</strong> <br/>
                            {{ $education->start_date }} -
                            @if($education->is_present == true)
                                Present
                            @else
                                {{ $education->end_date }}
                            @endif

                        </td>
                        <td colspan="2">
                            <strong>{{ $education->school }}</strong><br/>
                            {{ $education->address }}<br/>
                            {{ $education->major }}
                        </td>
                    </tr>

                @endforeach
            @endif


            {{--Skill's part--}}
            <tr class="skill">
                <td>
                    <h3>Skill</h3>
                </td>
                <td colspan="2">
                    <br/>
                    :
                    @if($skills = $resume->skills)
                        @foreach($skills as $key => $skill)
                            {{ $skill->name }}
                            @if($key != count($skills)-1)
                                ,
                            @endif
                        @endforeach
                    @endif
                </td>
            </tr>

            {{--language's part--}}

                <tr class="language">
                    <td colspan="3">
                        <h3>Language</h3>
                    </td>
                </tr>
            @if($languages = $resume->languages)

                @foreach($languages as $language)
                    <tr>
                        <td></td>
                        <td>
                            {{ $language->name }}
                        </td>
                        <td>
                            :{{ $language->pivot->proficiency }}
                        </td>
                    </tr>


                @endforeach
            @endif

            {{--Interest's part--}}

                <tr class="interest">
                    <td colspan="3">
                        <h3>Interest</h3>
                    </td>
                </tr>

            @if($interests = $resume->interests)

                @foreach($interests as $interest)
                    <tr>
                        <td></td>
                        <td>
                            {{ $interest->name }}
                        </td>
                        <td>
                            :{{ $interest->description }}
                        </td>
                    </tr>


                @endforeach
            @endif

            {{--Reference's part--}}
            <tr class="reference">
                <td>
                    <h3>Reference</h3>
                </td>
                <td colspan="2"></td>
            </tr>
            @if($references = $resume->references)
                @foreach($references as $reference)
                    <tr>
                        <td>
                            {{ $reference->name }} <br/>
                        </td>
                        <td colspan="2">
                            <strong>{{ $reference->position }}</strong><br/>
                            {{ $reference->phone }} <br/>
                            {{ $reference->email }}
                        </td>
                    </tr>

                @endforeach
            @endif

        </table>


    </div>
    </body>

</html>

