@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        {{-- main content --}}
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Update Resume</div>
                <div class="panel-body">
                    <div role="tabpanel">
                        <ul role="tablist" class="nav nav-tabs">
                            <li role="presentation" class="active"><a href="#profile" aria-controls="profile"
                                                                      role="tab" data-toggle="tab"
                                                                      aria-expanded="true">Career Profile</a></li>
                            <li role="presentation" class=""><a href="#edit" aria-controls="edit" role="tab"
                                                                data-toggle="tab" aria-expanded="false">Experiences</a>
                            </li>
                            <li role="presentation" class=""><a href="#password" aria-controls="password" role="tab"
                                                                data-toggle="tab" aria-expanded="false">Projects</a>
                            </li>
                            <li role="presentation" class=""><a href="#skill" aria-controls="skill" role="tab"
                                                                data-toggle="tab" aria-expanded="false">Skills</a>
                            </li>
                            <li role="presentation" class=""><a href="#contact" aria-controls="contact" role="tab"
                                                                data-toggle="tab" aria-expanded="false">Contact</a>
                            </li>
                            <li role="presentation" class=""><a href="#education" aria-controls="education" role="tab"
                                                                data-toggle="tab" aria-expanded="false">Education</a>
                            </li>
                            <li role="presentation" class=""><a href="#languages" aria-controls="languages" role="tab"
                                                                data-toggle="tab" aria-expanded="false">Languages</a>
                            </li>
                            <li role="presentation" class=""><a href="#interests" aria-controls="interests" role="tab"
                                                                data-toggle="tab" aria-expanded="false">Interests</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" id="profile" class="tab-pane mt-30 active">
                                <form class="form form-horizontal" method="POST" action="{{ url('/resume/career_profile') }}/{{ $resume->id }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="old_password" class="col-md-4 control-label">Career Profile</label>
                                        <div class="col-md-6">
                                            <textarea id="body_post" class="form-control" name="career_profile" rows="6">{{ $resume->career_profile }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <input id="change-password" type="submit" value="Update" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div role="tabpanel" id="edit" class="tab-pane mt-30">
                                <form method="POST" action="/resume/experiences" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="resume_uid" value="{{ $resume->id }}"/>
                                    <div class="form-group">
                                        <label for="position" class="col-md-4 control-label">Position</label>
                                        <div class="col-md-6">
                                            <input type="text" name="position" id="position" class="form-control" placeholder="Position">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="company" class="col-md-4 control-label">Company Name</label>
                                        <div class="col-md-6">
                                            <input type="text" name="company" id="company" class="form-control" placeholder="Company">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="col-md-4 control-label">Description</label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="description" id="description" rows="6" placeholder="Type description here..."></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description" class="col-md-4 control-label">Start Date</label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input type="text" data-date-format="yyyy-mm-dd" id="start_date" name="start_date" class="form-control" placeholder="Start Date" >
                                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description" class="col-md-4 control-label">End Date</label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input type="text" id="end_date" data-date-format="yyyy-mm-dd" name="end_date" class="form-control" placeholder="End Date" >
                                                <span class="input-group-addon" id="end_date"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <input id="update-profile" type="submit" value="Save" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div role="tabpanel" id="password" class="tab-pane mt-30">
                                <form method="POST" action="/resume/project" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="resume_uid" value="{{ $resume->id }}"/>
                                    <div class="form-group">
                                        <label for="name" class="col-md-4 control-label">Name</label>
                                        <div class="col-md-6">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Project Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="col-md-4 control-label">Description</label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="description" id="description" rows="6" placeholder="Type description here..."></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <input id="update-profile" type="submit" value="Save" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div role="tabpanel" id="skill" class="tab-pane mt-30">

                                <form method="POST" action="/resume/skill" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="resume_uid" value="{{ $resume->id }}"/>
                                    <div class="form-group">
                                        <label for="name" class="col-md-4 control-label">Name</label>
                                        <div class="col-md-6">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Project Name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <input id="update-profile" type="submit" value="Save" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div role="tabpanel" id="contact" class="tab-pane mt-30">

                                <form method="POST" action="/resume/contact" class="form-horizontal">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="resume_uid" value="{{ $resume->id }}"/>

                                    <div class="form-group">
                                        <label for="name" class="col-md-4 control-label">Icon</label>
                                        <div class="col-md-6">
                                            <input type="text" name="icon" id="icon" class  ="form-control" placeholder="Icon">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="col-md-4 control-label">Description</label>
                                        <div class="col-md-6">
                                            <input type="text" name="description" id="description" class  ="form-control" placeholder="Description">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <input id="update-profile" type="submit" value="Save" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div role="tabpanel" id="education" class="tab-pane mt-30">

                                <form method="POST" action="/resume/education" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="resume_uid" value="{{ $resume->id }}"/>
                                    <div class="form-group">
                                        <label for="major" class="col-md-4 control-label">Major</label>
                                        <div class="col-md-6">
                                            <input type="text" name="major" id="major" class="form-control" placeholder="Major">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="school" class="col-md-4 control-label">School</label>
                                        <div class="col-md-6">
                                            <input type="text" name="school" id="school" class="form-control" placeholder="School">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="col-md-4 control-label">Description</label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="description" id="description" rows="6" placeholder="Type description here..."></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description" class="col-md-4 control-label">Start Date</label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input type="text" data-date-format="yyyy-mm-dd" id="start_date" name="start_date" class="form-control" placeholder="Start Date" >
                                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description" class="col-md-4 control-label">End Date</label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input type="text" id="end_date" data-date-format="yyyy-mm-dd" name="end_date" class="form-control" placeholder="End Date" >
                                                <span class="input-group-addon" id="end_date"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <input id="update-profile" type="submit" value="Save" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div role="tabpanel" id="languages" class="tab-pane mt-30">Languages</div>
                            <div role="tabpanel" id="interests" class="tab-pane mt-30">Interests</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection