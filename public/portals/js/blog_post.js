/*---upload file---*/
$('#choose_file').on('click', function (e) {
    e.preventDefault();
    $('#choose_file_upload').click();//init input type file to click
})

/*---end upload file ----*/

$('#choose_file_upload').change(function () {

    var fileName = $(this).val();
    fileName = fileName.split('\\');
    $('#selected_file').html(fileName[fileName.length - 1]);
    if (this.files[0].size > 5000000) {
        swal({
            title: "You cannot upload file bigger than 5M",
            type: "warning"
        });
        $(this).val('');
        $('#selected_file').html('');
    }

});

$(document).on('click', '#cros_out', function (e) {

    $('form#form_edit_post').find('input[name=is_crosed]').val(1);
    $('#blog_file').html(btn)
});


$(document).on('click', '#change_file', function (e) {
    $('input#post_change_file').click();
});

$(document).on('change', '#post_change_file', function () {

    var fileName = $(this).val();
    fileName = fileName.split('\\');
    var extention = fileName[fileName.length - 1].split('.');
    $('form#form_edit_post').find('input[name=is_crosed]').val(0);

    if (this.files[0].size > 5000000) {
        swal({
            title: "You cannot upload file bigger than 5M",
            type: "warning"
        });
        $(this).val('');
        $('div#change_uploaded_file').text('');
    } else {
        onChangeSelectedFile(
            '/portals/icons/new_pdf.png',
            '/portals/icons/new_pdf.png',
            '/portals/icons/new_docx.png',
            '/portals/icons/new_pptx.png',
            '/portals/icons/new_xlsx.png',
            extention[1], $(this), fileName
        );
    }


});


function onChangeSelectedFile(asset_img_file,
                              asset_pdf_file,
                              asset_doc_file,
                              asset_ppt_file,
                              asset_xls_file,
                              extension, object,
                              fileName) {

    if (extension == 'png' || extension == 'jpg') {

        if (!$('form#form_edit_post').find('div.each_blog_file_edit')[0]) {
            $('#blog_file').html(blog_file_edit)
        }
        $('#edit_post_icon').prop('src', asset_img_file)
        $('#edit_post_icon').css('max-width', '50%');
        $('div#change_uploaded_file').text(fileName[fileName.length - 1]);
        $('#change_file').text(' Change Image')

    }
    if (extension == 'pdf') {

        if (!$('form#form_edit_post').find('div.each_blog_file_edit')[0]) {

            //console.log($('form#form_edit_post').find('input#post_change_file').val());
            //$('#blog_file').html(blog_file_edit)
        }

        $('div#change_uploaded_file').text(fileName[fileName.length - 1]);
        $('#edit_post_icon').prop('src', asset_pdf_file)
        $('#change_file').text(' Change File')

    }
    if (extension == 'doc' || extension == 'docx') {

        if (!$('form#form_edit_post').find('div.each_blog_file_edit')[0]) {
            $('#blog_file').html(blog_file_edit)
        }
        $('div#change_uploaded_file').text(fileName[fileName.length - 1]);
        $('#edit_post_icon').prop('src', asset_doc_file);
        $('#change_file').text(' Change File')

    }

    if (extension == 'ppt' || extension == 'pptx') {

        if (!$('form#form_edit_post').find('div.each_blog_file_edit')[0]) {
            $('#blog_file').html(blog_file_edit)
        }
        $('div#change_uploaded_file').text(fileName[fileName.length - 1]);
        $('#edit_post_icon').prop('src', asset_ppt_file);
        $('#change_file').text(' Change File')

    }
    if (extension == 'xls' || extension == 'xlsx') {

        if (!$('form#form_edit_post').find('div.each_blog_file_edit')[0]) {
            $('#blog_file').html(blog_file_edit)
        }
        $('div#change_uploaded_file').text(fileName[fileName.length - 1]);
        $('#edit_post_icon').prop('src', asset_xls_file);
        $('#change_file').text(' Change File')

    }

}

/*---post by category---*/
$(document).on('click', '.btn_category_list', function (e) {
    e.preventDefault();
    var category_url = $(this).attr('href');
    $.ajax({
        method: 'GET',
        url: category_url,
        data: {},
        dataType: 'HTML',
        success: function (result) {
            $('.render_post ').html(result)
        }
    })
})


$(document).on('click', '.btn_tag_list', function (e) {
    e.preventDefault();
    var tag_url = $(this).attr('href');
    $.ajax({
        method: 'GET',
        url: tag_url,
        data: {},
        dataType: 'HTML',
        success: function (result) {
            $('.render_post ').html(result)
        }
    });
});


$(document).on('click', '#btn_load_more_post', function (e) {
    var dom = $(this);

    if ($('input[name=my_post]').is(':checked')) {
        //alert(100023434);
        $.ajax({
            method: 'GET',
            url: '/blog-post/my-post',
            data: {
                type: 'filter_my_post',
                'last_post': $('input#last_post_id').val()
            },
            dataType: 'HTML',
            success: function (result) {

                $('input#last_post_id').remove();
                $('.render_post ').append(result);
                $('.user_post_profile').tooltip();
                if ($('input#last_post_id').val() == 0) {
                    dom.remove();
                }
            }

        });
    } else {
        $.ajax({
            method: 'GET',
            url: '/blog-post/load-more-post',
            data: {'last_post': $('input#last_post_id').val()},
            dataType: 'HTML',
            success: function (result) {

                $('input#last_post_id').remove();

                $('.render_post ').append(result);
                $('.user_post_profile').tooltip();

                if ($('input#last_post_id').val() == 0) {
                    dom.remove();
                }


            }
        });

    }

});

$(document).on('click', '.see_more', function (e) {
    e.preventDefault();
    var dom = $(this);

   $.ajax({
       type: 'GET',
       url: '/blog-post/show_post',
       data: {
           post_id: dom.siblings('input').val()
       },
       success: function (response) {
           $('.render_post').html(response);
           $('.load_more_post').remove();
       }
   });
});

