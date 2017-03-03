<div class="row">
    <div class="col-md-12">
        <div class="wrapper sub-wrapper">
            <div class="main-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="contact-container container-block">
                            <h2 class="container-block-title section-title"><i class="fa fa-newspaper-o"></i> {{ trans('tmp.resume.events') }} </h2>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Event title</th>
                                        <th>Start Date</th>
                                        <th>Duration</th>
                                        <th>Place</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @for($i=0; $i<5; $i++)
                                        <tr>
                                            <td><a href="#">Laracast</a></td>
                                            <td>01-03-2017</td>
                                            <td><span class="label label-info">3 Days</span></td>
                                            <td>
                                                <i class="fa fa-map-marker"></i>
                                                ITC, F-309
                                            </td>
                                        </tr>
                                    @endfor
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