@section('after-style-end')
    {{--<link rel="stylesheet" href="{{url('css/normalize.css')}}">--}}

    {{--<link rel="stylesheet" href="{{url('css/phantomjs.css')}}">--}}
    <style type="text/css">
        /* #liveModal #liveModalIframe {
             width: 100%;
             border: none;
             margin-bottom: -5px;
         }*/

        #creatorContent {
            width: 100%;
            min-height: 100%;
            padding-left: 0px;
        }

        #creatorContent .page:first-of-type {
            margin-top: 10px;
        }

        #creatorContent .page {
            margin-top: 10px;
            background-color: transparent;
            box-shadow: none;
            width: 85rem;
        }

        #creatorContent .page:first-of-type {
            margin-top: 0px !important;
        }

    </style>
@endsection
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div id="creatorContent">
                @if(isset($resume))
                    <div class="page fFamilyTxtArimo pagePaddingTop30 pagePaddingRight30 pagePaddingBottom30 pagePaddingLeft30 secSpace20 colSpace20 dateLinesDouble dateSeparatorDash dateStickSeparatorFrom"
                         data-id="4532edc4-2904-4db2-a7f2-eb312e40e2f4" data-user-id="319124" data-template-id="575"
                         data-language="en_EN" data-type="cv" data-name="My resume 1" data-photo="322"
                         data-first-name="RIN"
                         data-last-name="Vannat">
                        <div class="row firstRow lastRow" style="height: 1400px;">
                            <div class="col secTitMarginBottom10 secAccIcoCircle colSpecialLineOn colSpecialBorderPrimoOn dateLayoutColAll dateLinesDouble dateSeparatorDash dateStickSeparatorFrom colorTxtMediumBlack3 colorNameMediumSilver2 colorLastNameMediumSilver2 colorPositionMediumSilver2 colorImgBrdMediumSilver2 colorImgBgMediumSilver2 colorSecTitMediumSilver2 colorSecTitBgLightGrey3 colorSecTitBrdLightSilver3 colorSecLineLightSilver3 colorSecPointMediumSilver2 colorSecPointShadowMediumSilver1 colorEntTitMediumBlack3 colorEntSubMediumBlack3 colorEntBoldMediumBlack3 colorEntIcoWhite3 colorEntIcoBgMediumSilver3 colorIcoWhite3 colorIcoBgMediumSilver3 colorRatOnMediumSilver3 colorRatOffLightSilver3 colorRatAddMediumSilver3 colorBgLightGrey3 colorBgHfLightGrey3 colorDateMediumBlack3 colorDateBgMediumSilver2 firstCol"
                                 style="width: 69%; height: 1400px; float: left">
                                <div class="section sectionType1 sectionBasic secType1AccCircle secSpecialLineOff fStyleH1Bold fStyleH1LastBold">
                                    <div class="entry">
                                        <div class="secType1Acc">
                                            <div class="secType1AccInitials">{{$abr_name}}</div>
                                        </div>
                                        <div class="secType1Container">
                                            <h1>
                                                <span class="firstname">{{ $resume->user->name }}</span>
                                            </h1>
                                        </div>
                                    </div>
                                </div>

                                @if($experiences = $resume->experiences)
                                    <div class="section sectionType6 sectionExperience secSpecialLineFirst">
                                        <h3 class="title"><span class="ico"></span><span class="txt">Experience</span>
                                        </h3>
                                        <div class="entryContainer">
                                            @foreach($experiences as $experience)
                                                <div class="entry" data-date-from-year="" data-date-from-month=""
                                                     data-date-to-year=""
                                                     data-date-to-month="" style="min-height: 50px;">
                                                    <div class="pointer" style="top: 1.1rem; left: -38px;"></div>
                                                    <div class="dates"><span
                                                                class="dateFrom">{{ $experience->start_date }}</span>
                                                        <span class="dateSeparator"></span>
                                                        <span class="dateTo">{{ $experience->end_date }}</span>
                                                    </div>
                                                    <div class="content">
                                                        <h5 class="title">{{ $experience->position }}</h5>
                                                        <h6 class="subtitle">{{ $experience->company }}</h6>
                                                        <h6 class="address">{{ $experience->address }}</h6>
                                                        <div class="text desc">{{ $experience->description }}</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                @endif

                                @if($educations = $resume->educations)
                                    <div class="section sectionType5 sectionEducation">
                                        <h3 class="title"><span class="ico"></span><span class="txt">Education</span>
                                        </h3>
                                        <div class="entryContainer">
                                            @foreach( $educations as $education )
                                                <div class="entry" data-date-from-year="" data-date-from-month=""
                                                     data-date-to-year=""
                                                     data-date-to-month="" style="min-height: 50px;">
                                                    <div class="pointer" style="top: 1.1rem; left: -38px;"></div>
                                                    <div class="dates"><span
                                                                class="dateFrom">{{ $education->start_date }}</span>
                                                        <span class="dateSeparator"></span>
                                                        <span class="dateTo">{{ $education->end_date }}</span>
                                                    </div>
                                                    <div class="content">
                                                        <h5 class="title">{{ $education->major }}</h5>
                                                        <h6 class="major">{{ $education->degree->name }}</h6>
                                                        <h6 class="school">{{ $education->school }}</h6>
                                                        <h6 class="address">{{ $education->address }}</h6>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if($references = $resume->references)
                                    <div class="section sectionType10 sectionReferences">
                                        <h3 class="title"><span class="ico"></span><span class="txt">References</span>
                                        </h3>
                                        @foreach($references as $reference)
                                            <div class="entryContainer content">
                                                <div class="entry">
                                                    <div class="pointer" style="top: 0.8rem; left: -38px;"></div>
                                                    <h5 class="title">{{ $reference->name }}</h5>
                                                    <h6 class="title">{{ $reference->position }}</h6>
                                                    <h6 class="major">{{ $reference->phone }}</h6>
                                                    <h6 class="major">{{ $reference->email }}</h6>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                @endif

                            </div>
                            <div class="col secTitMarginBottom10 secAccIcoCircle dateLayoutLine dateSeparatorDash dateStickSeparatorFrom colorTxtMediumBlack3 colorNameMediumSilver2 colorLastNameMediumSilver2 colorPositionMediumSilver2 colorImgBrdMediumSilver2 colorImgBgMediumSilver2 colorSecTitMediumSilver2 colorSecTitBgLightGrey3 colorSecTitBrdLightSilver3 colorSecLineLightSilver3 colorSecPointMediumSilver2 colorSecPointShadowMediumSilver1 colorEntTitMediumBlack3 colorEntSubMediumBlack3 colorEntBoldMediumBlack3 colorEntIcoWhite3 colorEntIcoBgMediumSilver3 colorIcoWhite3 colorIcoBgMediumSilver3 colorRatOnMediumSilver3 colorRatOffLightSilver3 colorRatAddMediumSilver3 colorBgLightGrey3 colorBgHfLightGrey3 colorDateMediumBlack3 colorDateBgMediumSilver2 lastCol"
                                 style="width: 31%; height: 1400px; float: right;">
                                <div class="section sectionType3 sectionPhoto">
                                    <div class="entry">
                                        <figure>
                                            @if(isset($resume->personalInfo->profile))
                                                <img class="profile"
                                                     src="{{ asset('img/backend/resume/profile') }}/{{ $resume->personalInfo->profile }}"
                                                     alt="" style="width:150px;height:200px;"/>
                                            @endif
                                        </figure>
                                    </div>
                                </div>

                                @if($resume->career_profile)
                                    <div class="section sectionType4 sectionSummary">
                                        <h3 class="title"><span class="ico"></span><span
                                                    class="txt">Career Profile</span></h3>
                                        <div class="entryContainer content">
                                            <div class="entry">
                                                <div class="pointer"></div>
                                                <div class="text desc">
                                                    <p>{{ $resume->career_profile }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($personal = $resume->personalInfo)
                                    <div class="section sectionType2 sectionPersonal">
                                        <h3 class="title"><span class="ico"></span><span
                                                    class="txt">Personal Info</span></h3>
                                        <div class="entryContainer content">
                                            <div class="entry personalAddress" data-order="1">
                                                <div class="pointer"></div>
                                                <div class="ico"></div>
                                                <h4>Address</h4>
                                                <div class="text">
                                                    <p>{{ $personal->address }}</p>
                                                </div>
                                            </div>
                                            <div class="entry personalPhone" data-order="2">
                                                <div class="pointer"></div>
                                                <div class="ico"></div>
                                                <h4>Phone</h4>
                                                <div class="text">{{ $personal->phone }}</div>
                                            </div>
                                            <div class="entry personalEmail" data-order="3">
                                                <div class="pointer"></div>
                                                <div class="ico"></div>
                                                <h4>E-mail</h4>
                                                <div class="text">
                                                    <a href="mailto:vannat.rin@gmail.com" rel="nofollow"
                                                       target="_blank">
                                                        {{ $personal->email }}
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="entry dateBirth personalBirthday" data-birth-day=""
                                                 data-birth-month=""
                                                 data-birth-year="" data-order="5">
                                                <div class="pointer"></div>
                                                <div class="ico"></div>
                                                <h4>Date of birth</h4>
                                                <div class="text">{{ $personal->dob }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                {{------inject language and skill ----}}

                                @if( $languages = $resume->languages)

                                    <div class="section sectionType7 sectionLanguages ratingCircle ratingTwoLines">
                                        <h3 class="title"><span class="ico"></span><span class="txt">Languages</span>
                                        </h3>
                                        @foreach($languages as $language)
                                            <div class="entryContainer content">
                                                <div class="entry existingEntry">
                                                    <h4 class="descShort">{{ $language->name }}</h4>
                                                    <div class="text descRating">{{ $language->pivot->proficiency }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                @if( $skills = $resume->skills)
                                    <div class="section sectionType7 sectionSkills ratingCircle ratingTwoLines">
                                        <h3 class="title"><span class="ico"></span><span class="txt">Skills</span></h3>
                                        @foreach($skills as $skill)
                                            <div class="entryContainer content">
                                                <div class="entry existingEntry">
                                                    <h4 class="name">{{ $skill->name }}</h4>
                                                    <div class="text descRating">{{ $skill->description }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                @if( $interests = $resume->interests)
                                    <div class="section sectionType7 sectionSkills ratingCircle ratingTwoLines">
                                        <h3 class="title"><span class="ico"></span><span class="txt">Interest</span>
                                        </h3>
                                        @foreach($interests as $interest)
                                            <div class="entryContainer content">
                                                <div class="entry existingEntry">
                                                    <h4 class="name">{{ $interest->name }}</h4>
                                                    <div class="text descRating">{{ $interest->description }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                {{----end of injection ----}}


                            </div>
                        </div>


                    </div>
                @endif

                {{--if data load too many we have to create new page--}}
                {{--<div class="page fFamilyTxtArimo pagePaddingTop30 pagePaddingRight30 pagePaddingBottom30 pagePaddingLeft30 secSpace20 colSpace20 dateLinesDouble dateSeparatorDash dateStickSeparatorFrom">

                        <div class="row firstRow lastRow" style="height: 1400px;">
                            <div class="col secTitMarginBottom10 secAccIcoCircle colSpecialLineOn colSpecialBorderPrimoOn dateLayoutColAll dateLinesDouble dateSeparatorDash dateStickSeparatorFrom colorTxtMediumBlack3 colorNameMediumSilver2 colorLastNameMediumSilver2 colorPositionMediumSilver2 colorImgBrdMediumSilver2 colorImgBgMediumSilver2 colorSecTitMediumSilver2 colorSecTitBgLightGrey3 colorSecTitBrdLightSilver3 colorSecLineLightSilver3 colorSecPointMediumSilver2 colorSecPointShadowMediumSilver1 colorEntTitMediumBlack3 colorEntSubMediumBlack3 colorEntBoldMediumBlack3 colorEntIcoWhite3 colorEntIcoBgMediumSilver3 colorIcoWhite3 colorIcoBgMediumSilver3 colorRatOnMediumSilver3 colorRatOffLightSilver3 colorRatAddMediumSilver3 colorBgLightGrey3 colorBgHfLightGrey3 colorDateMediumBlack3 colorDateBgMediumSilver2 firstCol"
                                 style="width: 69%; height: 1400px;"></div>
                            <div class="col secTitMarginBottom10 secAccIcoCircle dateLayoutLine dateSeparatorDash dateStickSeparatorFrom colorTxtMediumBlack3 colorNameMediumSilver2 colorLastNameMediumSilver2 colorPositionMediumSilver2 colorImgBrdMediumSilver2 colorImgBgMediumSilver2 colorSecTitMediumSilver2 colorSecTitBgLightGrey3 colorSecTitBrdLightSilver3 colorSecLineLightSilver3 colorSecPointMediumSilver2 colorSecPointShadowMediumSilver1 colorEntTitMediumBlack3 colorEntSubMediumBlack3 colorEntBoldMediumBlack3 colorEntIcoWhite3 colorEntIcoBgMediumSilver3 colorIcoWhite3 colorIcoBgMediumSilver3 colorRatOnMediumSilver3 colorRatOffLightSilver3 colorRatAddMediumSilver3 colorBgLightGrey3 colorBgHfLightGrey3 colorDateMediumBlack3 colorDateBgMediumSilver2 lastCol"
                                 style="width: 31%; height: 1400px; float: right;">



                            </div>
                        </div>
                </div>--}}

                {{--end new page --}}
            </div>
        </div>
    </div>
</div>