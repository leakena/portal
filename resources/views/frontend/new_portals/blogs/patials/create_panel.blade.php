
<div class="row">
    <div class="form-group">

        <div class="col-md-12">
            {{--<i class="icon-append fa fa-comment green"></i>--}}
            <input type="text" class="form-control" name="title" placeholder="Title of your post">
        </div>
    </div>

</div>

<div class="row" style="margin-top: 0px">

    <section class=" col-md-6 " style="padding-left: 0px">

        <select class="form-control input-sm category" multiple id="select2_category" name="category[]" data-placeholder=" Select Category" style="width: 100%; ">

        </select>

    </section>


    <section class=" col-md-6" style="padding-right: 0px">

        <select class="form-control input-sm tag" multiple id="selecte2_tage" data-placeholder=" Select Category" name="tag[]" style="width: 100%">
        </select>

    </section>
</div>


<div class="row">
    <div class="form-group">

        <div class="col-md-12">
            {{--<i class="icon-append fa fa-comment green"></i>--}}
            <textarea rows="3" class="form-control" name="body" placeholder="Type Your Content Here..."></textarea>
        </div>
    </div>

</div>

<div class="row">
    <div class="form-group" style="margin-right: 0px">

        <div class="col-md-3 " style="padding-right: 0px">
            <input type="file" class="btn btn-u " style="display: none" id="choose_file_upload" name="file" accept="image/*, .doc, .docx,.ppt, .pptx,.txt,.pdf">
            <button class="btn-u btn-brd rounded btn-u-green btn-u-sm" id="choose_file">
                <i class="fa fa fa-unlink"></i>
                Attach File
            </button>

        </div>

        <div  class="col-md-6" id="selected_file" style="padding-left: 1px; padding-right: 0px"> </div>
        <button class="btn-u btn-brd rounded-4x col-md-2 pull-right" style="padding-right: 20px" type="submit" id="btn_submit_post"><i class="fa fa-bell-o"></i> Publish</button>

    </div>


</div>