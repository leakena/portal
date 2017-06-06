<form action="{{ route('frontend.portal.update_blog_post') }}" method="post" enctype="multipart/form-data" id="form_edit_post" class="form-horizontal">

    {{csrf_field()}}

    {{--<a href="{{route('frontend.portal.view_pdf', $post->id)}}" target="_blank" data-event-key="attachment:click" data-event-resource-type="file" data-event-action="open" data-bypass="true">
        <img class="img-responsive" src="{{asset('portals/icons').'/'.$post->file}}" alt="">
    </a>--}}

    <section class=" col-md-6 " style="padding-left: 0px">
        <select class="form-control input-sm category_edit" multiple  id="edit_select2_category" name="category[]" data-placeholder=" Select Category" style="width: 100%; ">
            <option value="hello">Hello</option>
        </select>
    </section>

    <section class=" col-md-6" style="padding-right: 0px; padding-bottom: 10px">
        <select class="form-control input-sm tag_edit" multiple  id="edit_selecte2_tage" data-placeholder=" Select Tag" name="tag[]" style="width: 100%">
        </select>

    </section>
    <textarea rows="3" class="form-control edit_textarea" name="body" placeholder="Type Your Content Here..."></textarea>

    <input type="hidden" name="is_crosed" value="0">
    <input type="file" class="btn btn-u " style="display: none" id="post_change_file" name="file" accept="image/*, .doc, .docx,.ppt, .pptx,.txt,.pdf">

    <div class="form-group" id="blog_file" style="margin-left: 0px; margin-right: 0px">

       <div class="col-md-12 each_blog_file_edit" style=" padding-left: 0px; padding-right: 0px; border: solid 2px #eee; ">

           <i class="fa fa-times btn btn-xs pull-right" id="cros_out" style="padding-right: 0px !important;"></i>
           <a href="#" {{--target="_blank"--}} data-event-key="attachment:click" data-event-resource-type="file" data-event-action="open" data-bypass="true">
               <img class="img-responsive" src="{{asset('portals/icons/new_pdf.png')}}" id="edit_post_icon" alt="">
           </a>
           <div  class="col-md-6" id="change_uploaded_file" style="padding-left: 8px; padding-right: 0px"> </div>

           <i class="fa fa fa-unlink btn btn-xs pull-right btn-u btn-brd rounded btn-u-green btn-u-sm" id="change_file"> change File</i>
           {{--<input type="file" class="btn btn-u " style="display: none" id="post_change_file" name="file" accept="image/*, .doc, .docx,.ppt, .pptx,.txt,.pdf">--}}
       </div>
    </div>

</form>