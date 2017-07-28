<div class="row profile-body tab-pane fade" id="id_card">
    <div class="col-md-6">
        <div class="page">
            <div class="background" style="width: 286px;height: 454px; position: relative;">
                <img width="286" height="454" src="https://192.168.51.82/img/id_card/front_id_card.png">
                <span class="department" id="id_student">
                    អត្តលេខនិស្សិត/ID :
                    <strong>{{ isset($student)?$student['id_card']:'' }}</strong>
                </span>

                <div class="avatar" id="avatar">
                    <div class="crop">
                        <figure>
                            @if(isset($resume->personalInfo->profile))
                                <img class="profile"
                                     src="{{ isset($profile->profile)?url('img/backend/profile/'.$profile->profile):url('portals/assets/img/team/img32-md.jpg') }}"
                                     alt="" style="width:124px;height:160px;"/>
                            @endif
                        </figure>
                        {{--<img src="http://192.168.51.88/img/profiles/e20120155.jpg">--}}
                    </div>
                </div>
                <span class="name_kh" id="name">{{ isset($studentData)?$studentData['name_kh']:'' }}</span> <span class="name_latin" id="name_latin">{{ isset($student)?$student['name_latin']:'' }}</span>

            </div>

        </div>
    </div>
    <div class="col-md-6">
        <div class="page">
            <div class="background" style="width: 286px;height: 454px; position: relative;">
                <img width="100%" src="https://192.168.51.82/img/id_card/back_id_card.png">
                <div class="detail" style="margin-left: -10px">
                <span class="address_title">
                    អាសយដ្ឋាន ៖
                </span>
                    <span class="address">
                    ប្រអប់សំបុត្រលេខ៨៦&#8203; មហាវិថីសហព័ន្ធរុស្សុី<br>
                    រាជធានីភ្នំពេញ ប្រទេសកម្ពុជា <br>
                    ទូរស័ព្ទ: (៨៥៥) ២៣ ៨៨០ ៣៧០/៨៨២ ៤០៤ <br>
                    ទូរសារ: (៨៥៥) ២៣ ៨៨០ ៣៦៩ <br>
                    សារអេឡិចត្រូនិច: info@itc.edu.kh <br>
                    គេហទំព័រ: www.itc.edu.kh

                </span>
                    <span class="expired_date">ថ្ងៃផុតកំណត់/Expiry date: 30 September
                        @if(isset($studentGrade))
                            @php
                                $num = $studentGrade['grade_id'] - 5;
                                $year = $studentGrade['academic_year_id'] - $num;
                            @endphp
                            {{ $year }}
                        @endif
                </span>
                    <div class="barcode">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAUAAAAAeAQMAAABnrVXaAAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAAC9JREFUOI1jOHD+/JnzB878OcN//swfII3M/nPgzxkQBqlhGFU4qnBU4ajCwawQAMaov/InMJxIAAAAAElFTkSuQmCC" alt="barcode">
                    </div>
                    <span class="barcode_value">{{ isset($student)?$student['id_card']:'' }}</span>
                    <span class="message">
                    ប្រសិនបើរើសបាន សូមជួយយកមកប្រគល់ឱ្យ <br>
                    ការិយាល័យសិក្សា នៃវិទ្យាស្ថានបច្ចេកវិទ្យាកម្ពុជា
                </span>
                </div>
            </div>

        </div>
    </div>
</div>
