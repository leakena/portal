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

    $(document).on('click', '#edit-career-profile', function () {
        $.ajax({
            type: 'GET',
            url: '/reusme/edit-career-profile',
            data: {resume_uid: $(this).parent().parent().children().eq(0).text()},
            success: function (resume) {
                $('#content-resume-profile').val(resume.data[0].career_profile);
            }
        });
        $('#modal-edit-career-profile').modal('toggle');
    });

    $(document).on('submit', '#update-career-profile', function (event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/resume/update-career-profile',
            data: {
                resume_uid: $('#resume_uid').val(),
                career_profile: $('#content-resume-profile').val()
            },
            success: function (careerprofile) {
                $('#modal-edit-career-profile').modal('toggle');
                renderCareerProfile();
            }
        });
    });

    // End experience

    // Start Project

    $(document).on('submit', '#form-save-project', function (event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/resume/projects/save-project',
            data: $('#form-save-project').serialize(),
            success: function (project) {
                $('#modal-save-project').modal('toggle');
                renderProject();
            }
        });
    });

    // Edit project

    $(document).on('click', '#btn-edit-project', function (event) {
        event.preventDefault();
        $('#projects').find('.success').removeClass();
        $('#projects').find('.danger').removeClass();
        $(this).parent().parent().addClass('success');

        $.ajax({
            type: 'GET',
            url: '/resume/projects/edit-project',
            data: {
                project_uid: $(this).parent().parent().children().eq(0).text(),
                resume_uid: $(this).parent().parent().children().eq(1).text()
            },
            success: function (project) {
                $('#modal-edit-project').modal('toggle');
                $('#edit-project-name').val(project.data[0].name);
                $('#edit-project-desc').val(project.data[0].description);
            }
        })
    });

    // Update project

    $(document).on('submit', '#modal-edit-project', function (event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/resume/projects/update-project',
            data: {
                project_uid: $('#projects').find('.success').children().eq(0).text(),
                resume_uid: $('#projects').find('.success').children().eq(1).text(),
                project_name: $('#edit-project-name').val(),
                project_desc: $('#edit-project-desc').val()
            },
            success: function () {
                $('#modal-edit-project').modal('toggle');
                renderProject();
            }
        });
    });

    //Delete project

    $(document).on('click', '#btn-delete-project', function (event) {
        event.preventDefault();

        $('#projects').find('.success').removeClass();
        $('#projects').find('.danger').removeClass();
        $(this).parent().parent().addClass('danger');

        $('#modal-delete-project').modal('toggle');

    });

    // Confirmation delete project
    $(document).on('submit', '#form-delete-project', function (event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/resume/projects/delete-project',
            data: {
                project_uid: $('#projects').find('.danger').children().eq(0).text(),
                resume_uid: $('#projects').find('.danger').children().eq(1).text(),
            },
            success: function () {
                $('#modal-delete-project').modal('toggle');
                renderProject();
            }
        });

    });

    //Start skill
    //Save Skill

    $(document).on('submit', '#form-save-skill', function (event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/resume/skills/save-skill',
            data: $('#form-save-skill').serialize(),
            success: function () {
                $('#modal-save-skill').modal('toggle');
                renderSkill();
            }
        });
    });


    // Edit skill
    $(document).on('click', '#btn-edit-skill', function (event) {
        event.preventDefault();

        $('#table-skill').find('.success').removeClass();
        $('#table-skill').find('.danger').removeClass();
        $(this).parent().parent().addClass('success');

        $.ajax({
            type: 'GET',
            url: '/resume/skills/edit-skill',
            data: {
                project_uid: $(this).parent().parent().children().eq(0).text(),
                resume_uid: $(this).parent().parent().children().eq(1).text()
            },
            success: function (skill) {
                $('#modal-edit-skill').modal('toggle');
                $('#edit-skill-name').val(skill.data[0].name);
            }
        })
    });

    // Update skill
    $(document).on('submit', '#form-update-skill', function(event){
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/resume/skills/update-skill',
            data: {
                skill_uid: $('#table-skill').find('.success').children().eq(0).text(),
                resume_uid: $('#table-skill').find('.success').children().eq(1).text(),
                name_skill: $('#edit-skill-name').val()
            },
            success:function(){
                $('#modal-edit-skill').modal('toggle');
                renderSkill();
            }
        });
    });

    // Click delete skill
    $(document).on('click', '#btn-delete-skill', function (event) {
        event.preventDefault();

        $('#table-skill').find('.success').removeClass();
        $('#table-skill').find('.danger').removeClass();
        $(this).parent().parent().addClass('danger');

        $('#modal-delete-skill').modal('toggle');

    });


    // Confirmation delete skill
    $(document).on('submit', '#form-delete-skill', function (event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/resume/skills/delete-skill',
            data: {
                skill_uid: $('#table-skill').find('.danger').children().eq(0).text(),
                resume_uid: $('#table-skill').find('.danger').children().eq(1).text(),
            },
            success: function () {
                $('#modal-delete-skill').modal('toggle');
                renderSkill();
            }
        });

    });

    //Start Contact

    //Save a new contact

    $(document).on('submit', '#form-save-contact', function (event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/resume/contacts/save-contact',
            data: {
                resume_uid: $('#resume_uid').val(),
                name: $('#save-contact-icon').val(),
                desc: $('#save-contact-name').val()
            },
            success: function () {
                $('#modal-save-contact').modal('toggle');
                renderContact();
            }
        });
    });

    //Edit contact
    $(document).on('click', '#btn-edit-contact', function (event) {
        event.preventDefault();

        $('#table-contact').find('.success').removeClass();
        $('#table-contact').find('.danger').removeClass();
        $(this).parent().parent().addClass('success');

        $.ajax({
            type: 'GET',
            url: '/resume/contacts/edit-contact',
            data: {
                project_uid: $(this).parent().parent().children().eq(0).text(),
                resume_uid: $(this).parent().parent().children().eq(1).text()
            },
            success: function (contact) {
                $('#modal-edit-contact').modal('toggle');
                $('#update-contact-icon').val(contact.data[0].icon);
                $('#update-contact-name').val(contact.data[0].description);
            }
        })
    });

    //Update contact

    $(document).on('submit', '#form-update-contact', function(event){
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/resume/contacts/update-contact',
            data: {
                skill_uid: $('#table-contact').find('.success').children().eq(0).text(),
                resume_uid: $('#table-contact').find('.success').children().eq(1).text(),
                icon: $('#update-contact-icon').val(),
                desc: $('#update-contact-name').val(),
            },
            success:function(){
                $('#modal-edit-contact').modal('toggle');
                renderContact();
            }
        });
    });

    // Click delete contact
    $(document).on('click', '#btn-delete-contact', function (event) {
        event.preventDefault();

        $('#table-contact').find('.success').removeClass();
        $('#table-contact').find('.danger').removeClass();
        $(this).parent().parent().addClass('danger');

        $('#modal-delete-contact').modal('toggle');

    });

    // Confirmation delete contact
    $(document).on('submit', '#form-delete-contact', function (event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/resume/contacts/delete-contact',
            data: {
                skill_uid: $('#table-contact').find('.danger').children().eq(0).text(),
                resume_uid: $('#table-contact').find('.danger').children().eq(1).text(),
            },
            success: function () {
                $('#modal-delete-contact').modal('toggle');
                renderContact();
            }
        });

    });


    //Start Eduction
    //Save education
    $(document).on('submit', '#form-save-education', function (event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/resume/educations/save-education',
            data: {
                resume_uid: $('#resume_uid').val(),
                major: $('#save-major').val(),
                school: $('#save-school').val(),
                start_date: $('#save-start-date-education').val(),
                end_date: $('#save-end-date-education').val()
            },
            success: function () {
                $('#modal-save-education').modal('toggle');
                renderEducation();
            }
        });
    });

    // Edit education
    $(document).on('click', '#btn-edit-education', function (event) {
        event.preventDefault();

        $('#table-education').find('.success').removeClass();
        $('#table-education').find('.danger').removeClass();
        $(this).parent().parent().addClass('success');

        $.ajax({
            type: 'GET',
            url: '/resume/educations/edit-education',
            data: {
                education_uid: $(this).parent().parent().children().eq(0).text(),
                resume_uid: $(this).parent().parent().children().eq(1).text()
            },
            success: function (education) {
                $('#modal-edit-education').modal('toggle');
                $('#update-major').val(education.data[0].major);
                $('#update-school').val(education.data[0].school);
                $('#update-start-date-education').val(education.data[0].start_date);
                $('#update-end-date-education').val(education.data[0].end_date);
            }
        })
    });


    // Update education
    $(document).on('submit', '#form-update-education', function(event){
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/resume/educations/update-education',
            data: {
                education_uid: $('#table-education').find('.success').children().eq(0).text(),
                resume_uid: $('#table-education').find('.success').children().eq(1).text(),
                major: $('#update-major').val(),
                school: $('#update-school').val(),
                start_date: $('#update-start-date-education').val(),
                end_date: $('#update-end-date-education').val()
            },
            success:function(){
                $('#modal-edit-education').modal('toggle');
                renderEducation();
            }
        });
    });

    // Click delete education
    $(document).on('click', '#btn-delete-education', function (event) {
        event.preventDefault();

        $('#table-education').find('.success').removeClass();
        $('#table-education').find('.danger').removeClass();
        $(this).parent().parent().addClass('danger');

        $('#modal-delete-education').modal('toggle');

    });
    // Confirmation delete skill
    $(document).on('submit', '#form-delete-education', function (event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/resume/educations/delete-education',
            data: {
                education_uid: $('#table-education').find('.danger').children().eq(0).text(),
                resume_uid: $('#table-education').find('.danger').children().eq(1).text(),
            },
            success: function () {
                $('#modal-delete-education').modal('toggle');
                $('#form-save-education')[0].reset();
                renderEducation();
            }
        });

    });

    // Start language
    // Save language
    $(document).on('submit', '#form-save-language', function (event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/resume/languages/save-language',
            data: {
                resume_uid: $('#resume_uid').val(),
                name: $('#save-language').val(),
                degree: $('#save-degree').val()
            },
            success: function () {
                $('#modal-save-language').modal('toggle');
                $('#form-save-language')[0].reset();
                renderLanguage();
            }
        });
    });

    // Edit language
    $(document).on('click', '#btn-edit-language', function (event) {
        event.preventDefault();

        $('#table-language').find('.success').removeClass();
        $('#table-language').find('.danger').removeClass();
        $(this).parent().parent().addClass('success');

        $.ajax({
            type: 'GET',
            url: '/resume/languages/edit-language',
            data: {
                language_uid: $(this).parent().parent().children().eq(0).text(),
                resume_uid: $(this).parent().parent().children().eq(1).text()
            },
            success: function (language) {
                $('#modal-edit-language').modal('toggle');
                $('#update-language').val(language.data[0].name);
                $('#update-degree').val(language.data[0].degree);
            }
        })
    });

    // Update language
    $(document).on('submit', '#form-update-language', function(event){
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/resume/languages/update-language',
            data: {
                language_uid: $('#table-language').find('.success').children().eq(0).text(),
                resume_uid: $('#table-language').find('.success').children().eq(1).text(),
                name: $('#update-language').val(),
                degree: $('#update-degree').val()
            },
            success:function(){
                $('#modal-edit-language').modal('toggle');
                renderLanguage();
            }
        });
    });

    // Click delete language
    $(document).on('click', '#btn-delete-language', function (event) {
        event.preventDefault();

        $('#table-language').find('.success').removeClass();
        $('#table-language').find('.danger').removeClass();
        $(this).parent().parent().addClass('danger');

        $('#modal-delete-language').modal('toggle');

    });

    // Confirmation delete language
    $(document).on('submit', '#form-delete-language', function (event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/resume/languages/delete-language',
            data: {
                language_uid: $('#table-language').find('.danger').children().eq(0).text(),
                resume_uid: $('#table-language').find('.danger').children().eq(1).text(),
            },
            success: function () {
                $('#modal-delete-language').modal('toggle');
                $('#form-save-language')[0].reset();
                renderLanguage();
            }
        });

    });

    //Start interest
    $(document).on('submit', '#form-save-interest', function (event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/resume/interests/save-interest',
            data: {
                resume_uid: $('#resume_uid').val(),
                name: $('#save-interest').val()
            },
            success: function () {
                $('#modal-save-interest').modal('toggle');
                $('#form-save-interest')[0].reset();
                renderInterest();
            }
        });
    });

    // Edit interest
    $(document).on('click', '#btn-edit-interest', function (event) {
        event.preventDefault();

        $('#table-interest').find('.success').removeClass();
        $('#table-interest').find('.danger').removeClass();
        $(this).parent().parent().addClass('success');

        $.ajax({
            type: 'GET',
            url: '/resume/interests/edit-interest',
            data: {
                interest_uid: $(this).parent().parent().children().eq(0).text(),
                resume_uid: $(this).parent().parent().children().eq(1).text()
            },
            success: function (interest) {
                $('#modal-edit-interest').modal('toggle');
                $('#update-interest').val(interest.data[0].name);
            }
        })
    });

    // Update interest
    $(document).on('submit', '#form-update-interest', function(event){
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/resume/interests/update-interest',
            data: {
                interest_uid: $('#table-interest').find('.success').children().eq(0).text(),
                resume_uid: $('#table-interest').find('.success').children().eq(1).text(),
                name: $('#update-interest').val()
            },
            success:function(){
                $('#modal-edit-interest').modal('toggle');
                renderInterest();
            }
        });
    });

    // Click delete interest
    $(document).on('click', '#btn-delete-interest', function (event) {
        event.preventDefault();

        $('#table-interest').find('.success').removeClass();
        $('#table-interest').find('.danger').removeClass();
        $(this).parent().parent().addClass('danger');

        $('#modal-delete-interest').modal('toggle');

    });

    // Confirmation delete language
    $(document).on('submit', '#form-delete-interest', function (event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/resume/interests/delete-interest',
            data: {
                interest_uid: $('#table-interest').find('.danger').children().eq(0).text(),
                resume_uid: $('#table-interest').find('.danger').children().eq(1).text(),
            },
            success: function () {
                $('#modal-delete-interest').modal('toggle');
                $('#form-save-interest')[0].reset();
                renderInterest();
            }
        });

    });

    $('#experience').on('click', function (event) {
        event.preventDefault();
        var resume_id = $(this).attr('resume_id');
        renderExperiences(resume_id);
    });

    renderCareerProfile();

    renderProject();

    renderSkill();

    renderContact();

    renderEducation();

    renderLanguage();

    renderInterest();

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

function renderCareerProfile() {
    $.ajax({
        type: 'GET',
        url: '/resume/career-profile',
        data: {
            resume_uid: $('#resume_uid').val()
        },
        success: function (resume) {
            var html = '';
            html += '<tr>'
            html += '<td class="hidden">' + resume.data[0].id + '</td>'
            html += '<td>' + resume.data[0].career_profile.substring(0, 120) + '</td>'
            html += '<td><button class="btn btn-info btn-xs" id="edit-career-profile"><i class="fa fa-edit"></i></button>'
            html += '</tr>';
            $('#listCareerProfile').html(html);
        }
    });

}

function renderProject() {
    $.ajax({
        type: 'GET',
        url: '/resume/projects',
        data: {resume_uid: $('#resume_uid').val()},
        success: function (projects) {
            var html = '';
            $.each(projects.data, function (key, val) {
                html += '<tr>'
                html += '<td class="hidden">' + val.id + '</td>'
                html += '<td class="hidden">' + val.resume_uid + '</td>'
                html += '<td>' + val.name + '</td>'
                html += '<td>' + val.description.substring(0, 45) + '</td>'
                html += '<td>'
                html += '<button class="btn btn-info btn-xs" id="btn-edit-project"><i class="fa fa-edit"></i></button>'
                html += ' <button class="btn btn-danger btn-xs" id="btn-delete-project"><i class="fa fa-trash"></i></button>'
                html += '</td>'
                html += '</tr>';
            });
            $('#listProjects').html(html);
        }
    });
}


function renderSkill(){
    $.ajax({
        type: 'GET',
        url: '/resume/skills',
        data: {resume_uid: $('#resume_uid').val()},
        success: function (skills) {
            var html = '';
            $.each(skills.data, function (key, val) {
                html += '<tr>'
                html += '<td class="hidden">' + val.id + '</td>'
                html += '<td class="hidden">' + val.resume_uid + '</td>'
                html += '<td>' + val.name + '</td>'
                html += '<td>'
                html += '<button class="btn btn-info btn-xs" id="btn-edit-skill"><i class="fa fa-edit"></i></button>'
                html += ' <button class="btn btn-danger btn-xs" id="btn-delete-skill"><i class="fa fa-trash"></i></button>'
                html += '</td>'
                html += '</tr>';
            });
            $('#listSkills').html(html);
        }
    });
}

function renderContact(){
    $.ajax({
        type: 'GET',
        url: '/resume/contacts',
        data: {resume_uid: $('#resume_uid').val()},
        success: function (contacts) {
            var html = '';
            $.each(contacts.data, function (key, val) {
                html += '<tr>'
                html += '<td class="hidden">' + val.id + '</td>'
                html += '<td class="hidden">' + val.resume_uid + '</td>'
                html += '<td>' + val.description + '</td>'
                html += '<td>'
                html += '<button class="btn btn-info btn-xs" id="btn-edit-contact"><i class="fa fa-edit"></i></button>'
                html += ' <button class="btn btn-danger btn-xs" id="btn-delete-contact"><i class="fa fa-trash"></i></button>'
                html += '</td>'
                html += '</tr>';
            });
            $('#listContact').html(html);
        }
    });
}

function renderEducation(){
    $.ajax({
        type: 'GET',
        url: '/resume/educations',
        data: {resume_uid: $('#resume_uid').val()},
        success: function (educations) {
            var html = '';
            $.each(educations.data, function (key, val) {
                html += '<tr>'
                html += '<td class="hidden">' + val.id + '</td>'
                html += '<td class="hidden">' + val.resume_uid + '</td>'
                html += '<td>' + val.major + '</td>'
                html += '<td>' + val.school + '</td>'
                html += '<td>' + val.start_date + '</td>'
                html += '<td>' + val.end_date+ '</td>'
                html += '<td>'
                html += '<button class="btn btn-info btn-xs" id="btn-edit-education"><i class="fa fa-edit"></i></button>'
                html += ' <button class="btn btn-danger btn-xs" id="btn-delete-education"><i class="fa fa-trash"></i></button>'
                html += '</td>'
                html += '</tr>';
            });
            $('#listEducations').html(html);
        }
    });
}

function renderLanguage(){
    $.ajax({
        type: 'GET',
        url: '/resume/languages',
        data: {resume_uid: $('#resume_uid').val()},
        success: function (languages) {
            var html = '';
            $.each(languages.data, function (key, val) {
                html += '<tr>'
                html += '<td class="hidden">' + val.id + '</td>'
                html += '<td class="hidden">' + val.resume_uid + '</td>'
                html += '<td>' + val.name + '</td>'
                html += '<td>' + val.degree + '</td>'
                html += '<td>'
                html += '<button class="btn btn-info btn-xs" id="btn-edit-language"><i class="fa fa-edit"></i></button>'
                html += ' <button class="btn btn-danger btn-xs" id="btn-delete-language"><i class="fa fa-trash"></i></button>'
                html += '</td>'
                html += '</tr>';
            });
            $('#listLanguages').html(html);
        }
    });
}

function renderInterest(){
    $.ajax({
        type: 'GET',
        url: '/resume/interests',
        data: {resume_uid: $('#resume_uid').val()},
        success: function (interests) {
            var html = '';
            $.each(interests.data, function (key, val) {
                html += '<tr>'
                html += '<td class="hidden">' + val.id + '</td>'
                html += '<td class="hidden">' + val.resume_uid + '</td>'
                html += '<td>' + val.name + '</td>'
                html += '<td>'
                html += '<button class="btn btn-info btn-xs" id="btn-edit-interest"><i class="fa fa-edit"></i></button>'
                html += ' <button class="btn btn-danger btn-xs" id="btn-delete-interest"><i class="fa fa-trash"></i></button>'
                html += '</td>'
                html += '</tr>';
            });
            $('#listInterests').html(html);
        }
    });
}