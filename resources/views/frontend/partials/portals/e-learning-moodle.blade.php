<div class="row">
    <div class="col-md-12">
        <div class="wrapper sub-wrapper">
            <div class="main-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="contact-container container-block">
                            <h2 class="container-block-title section-title"><i class="fa fa-calendar"></i> {{ trans('tmp.resume.e_learning') }} </h2>
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Start Date</th>
                                    <th>Due date</th>
                                    <th>Time remaining</th>
                                </tr>
                                </thead>
                                <tbody>
                                @for($i=0; $i<5; $i++)
                                    <tr>
                                        <td><a href="#">Image Processing</a></td>
                                        <td>01 Janury 2016</td>
                                        <td>Friday, 25 November 2016, 7:00 PM</td>
                                        <td>
                                            <span class="label label-success">Assignment was submitted 2 days 21 hours early</span>
                                        </td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                        </div><!--//contact-container-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>