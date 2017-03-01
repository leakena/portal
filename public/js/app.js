jQuery(document).ready(function () {

    /**
     * Resume - CRUD Experiences
     */
    jQuery(document).on('submit', '#save-experience', function (event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/resume/save-experience',
            data: jQuery('#save-experience').serialize(),
            success: function (experience) {

                jQuery('#addExperiences').modal('toggle');
                renderExperiences(jQuery('#resume_uid').val());
                jQuery('#save-experience')[0].reset();

            }
        });
    });

    jQuery(document).on('click', '#edit', function () {

        jQuery('#experiences').find('.success').removeClass();
        jQuery('#experiences').find('.danger').removeClass();
        jQuery(this).parent().parent().addClass('success');
        var experience_uid = $(this).parent().parent().children().eq(0).text();
        var resume_uid = $(this).parent().parent().children().eq(1).text();

        $.ajax({
            type: 'GET',
            url: '/resume/edit-experience',
            data: {
                experience_uid: experience_uid,
                resume_uid: resume_uid
            },
            success: function (experience) {
                $('#editExperiences').modal('toggle');
                $('#edit_position').val(experience.data[0].position);
                $('#edit_company').val(experience.data[0].company);
                $('#edit_description').val(experience.data[0].description);
                $('#edit_start_date').val(experience.data[0].start_date);
                $('#edit_end_date').val(experience.data[0].end_date);
            }
        });

    });


    jQuery(document).on('submit', '#update-experience', function (e) {
        e.preventDefault();
        var experience_uid = $('#experiences').find('.success').children().eq(0).text();
        var resume_uid = $('#experiences').find('.success').children().eq(1).text();
        $.ajax({
            type: 'POST',
            url: 'resume/update-experience',
            data: {
                experience_uid: experience_uid,
                resume_uid: resume_uid,
                edit_position: jQuery('#edit_position').val(),
                edit_position: jQuery('#edit_position').val(),
                edit_company: jQuery('#edit_company').val(),
                edit_description: jQuery('#edit_description').val(),
                edit_start_date: jQuery('#edit_start_date').val(),
                edit_end_date: jQuery('#edit_end_date').val()
            },
            success: function (experience) {
                $('#editExperiences').modal('toggle');
                renderExperiences(resume_uid);
            }
        });
    });

    // Delete Experience

    jQuery(document).on('click', '#delete', function () {

        jQuery('#experiences').find('.success').removeClass();
        jQuery('#experiences').find('.danger').removeClass();
        jQuery(this).parent().parent().addClass('danger');
        $('#remove_resume_uid').val(jQuery(this).parent().parent().children().eq(1).text());
        $('#remove_experience_id').val(jQuery(this).parent().parent().children().eq(0).text());
        $('#deleteExperiences').modal();

    });

    $(document).on('submit', '#remove-experience', function (event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/resume/remove-experience',
            data: $('#remove-experience').serialize(),
            success: function () {
                $('#deleteExperiences').modal('toggle');
                renderExperiences($('#remove_resume_uid').val());
            }
        });
    });

    $(document).on('click', '#edit-career-profile', function(){
        $.ajax({
            type: 'GET',
            url: '/reusme/edit-career-profile',
            data: {resume_uid: $(this).parent().parent().children().eq(0).text()},
            success:function(resume){
                $('#content-resume-profile').val(resume.data[0].career_profile);
                console.log(resume.data[0].career_profile);
            }
        });
        $('#modal-edit-career-profile').modal('toggle');
    });

    $(document).on('submit', '#update-career-profile', function(){


    });
    
    $('#experience').on('click', function (event) {
        event.preventDefault();
        var resume_id = $(this).attr('resume_id');
        renderExperiences(resume_id);
    });

    renderCareerProfile();

});

function renderExperiences(resume_id) {
    $.ajax({
        type: 'GET',
        url: '/get-experience-content',
        data: {resume_id: resume_id},
        dataType: 'json',
        success: function (experience) {
            var html = '';
            $.each(experience.data, function (key, val) {
                html += '<tr>'
                html += '<td class="hidden">' + val.id + '</td>'
                html += '<td class="hidden">' + val.resume_uid + '</td>'
                html += '<td>' + val.position + '</td>'
                html += '<td>' + val.company + '</td>'
                html += '<td>' + val.description.substring(0, 45) + '...</td>'
                html += '<td>' + val.start_date + '</td>'
                html += '<td>' + val.end_date + '</td>'
                html += '<td>'
                html += '<button class="btn btn-info btn-xs" id="edit"><i class="fa fa-edit"></i></button>'
                html += ' <button class="btn btn-danger btn-xs" id="delete"><i class="fa fa-trash"></i></button>'
                html += '</td>'
                html += '</tr>';
            });
            $('#listExperiences').html(html);
        }
    })
}

function renderCareerProfile(){
    $.ajax({
        type: 'GET',
        url: '/resume/career-profile',
        data: {
            resume_uid: $('#resume_uid').val()
        },
        success:function(resume){
            var html = '';
            html += '<tr>'
            html += '<td class="hidden">'+resume.data[0].id+'</td>'
            html += '<td>'+resume.data[0].career_profile.substring(0, 120)+'</td>'
            html += '<td><button class="btn btn-info btn-xs" id="edit-career-profile"><i class="fa fa-edit"></i></button>'
            html += '</tr>';
            $('#listCareerProfile').html(html);
        }
    });

}